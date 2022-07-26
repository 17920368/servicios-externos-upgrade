<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\AgreementType;
use App\Models\Indicator;
use App\Models\Instance;
use App\Models\Specialty;
use App\Models\SysadIndicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public function index(Request $request)
    {
        $agreements = Agreement::paginate(10);
        $specialties = Specialty::pluck('name', 'id');
        $status = ["Vigente", "Finalizado", "Cancelado"];
        if ($request->search) {
            $agreements = Agreement::where('invoice', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('agreement.index', compact('agreements', 'status', 'specialties'));
    }

    public function create()
    {
        $agreements_types = AgreementType::pluck('name', 'id');
        $indicators = Indicator::pluck('description', 'id');
        $sysadIndicators = SysadIndicator::pluck('description', 'id');
        $specialties = Specialty::all();
        $instances = Instance::pluck('name', 'id');
        $status = ["Vigente", "Finalizado", "Cancelado"];
        return view('agreement.create', compact('agreements_types', 'indicators', 'sysadIndicators', 'specialties', 'status', 'instances'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'invoice' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'status_id' => ['required', 'integer'],
            'agreement_type_id' => ['required', 'integer'],
            'instance_id' => ['required', 'integer'],
            'indicator_id' => ['required', 'integer'],
            'sysad_indicator_id' => ['required', 'integer'],
            'specialties_id' => 'required|min:1',

        ]);
        $user = Auth::user();
        $user_id = $user->id;
        $agreement = new Agreement();
        $agreement->invoice = $request->invoice;
        $agreement->start_date = $request->start_date;
        $agreement->end_date = $request->end_date;
        $agreement->status = $request->status_id;
        $agreement->agreement_type_id = $request->agreement_type_id;
        $agreement->instance_id = $request->instance_id;
        $agreement->indicator_id = $request->indicator_id;
        $agreement->sysad_id = $request->sysad_indicator_id;
        $agreement->user_id = $user_id;
        $agreement->save();
        $agreement->agreement_specialty()->attach($request->specialties_id);
        return redirect()->route('convenio.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $agreements_types = AgreementType::pluck('name', 'id');
        $indicators = Indicator::pluck('description', 'id');
        $sysadIndicators = SysadIndicator::pluck('description', 'id');
        $specialties = Specialty::all();
        $instances = Instance::pluck('name', 'id');
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $agreement = Agreement::find($id);
        if ($agreement != null) {
            return view('agreement.edit', compact('agreement', 'agreements_types', 'sysadIndicators', 'specialties', 'indicators', 'status', 'instances'));
        }
    }
    public function update(Request $request, $id)
    {
        $agreement = Agreement::find($id);
        if ($agreement != null) {
            $request->validate([
                'invoice' => ['required', 'string'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
                'status_id' => ['required', 'integer'],
                'agreement_type_id' => ['required', 'integer'],
                'instance_id' => ['required', 'integer'],
                'indicator_id' => ['required', 'integer'],
                'sysad_indicator_id' => ['required', 'integer'],
                'specialties_id' => 'required|min:1',

            ]);
            $user = Auth::user();
            $user_id = $user->id;
            $agreement =  Agreement::find($id);
            $agreement->invoice = $request->invoice;
            $agreement->start_date = $request->start_date;
            $agreement->end_date = $request->end_date;
            $agreement->status = $request->status_id;
            $agreement->agreement_type_id = $request->agreement_type_id;
            $agreement->instance_id = $request->instance_id;
            $agreement->indicator_id = $request->indicator_id;
            $agreement->sysad_id = $request->sysad_indicator_id;
            $agreement->user_id = $user_id;
            $agreement->save();
            $agreement->agreement_specialty()->sync($request->specialties_id);
            return redirect()->route('convenio.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $agreement = Agreement::find($id);
        if ($agreement != null) {
            $agreement->delete();
        }
        return redirect()->route('convenio.index')->with('success', 'Éxito al eliminar.');
    }
    public function currentAgreements()
    {
        $agreements = Agreement::where('status', '=', 0)->paginate(10);
        $status = ["vigentes", "finalizados", "cancelados"];
        $index = 0;
        return view('agreement.agreement_report', compact('agreements', 'status', 'index'));
    }
    public function currentMarcoAgreements()
    {
        $agreements = Agreement::where('agreement_type_id', '=', 1)->paginate(10);
        $status = ["vigentes", "finalizados", "cancelados"];
        $index = 0;
        $title = "Marco de colaboración académica, científica y tecnológica";
        return view('agreement.agreement_report', compact('agreements', 'status', 'index', 'title'));
    }
    public function finalizedAgreements()
    {
        $agreements = Agreement::where('status', '=', 1)->paginate(10);
        $status = ["vigentes", "finalizados", "cancelados"];
        $index = 1;
        return view('agreement.agreement_report', compact('agreements', 'status', 'index'));
    }
    public function canceledAgreements()
    {
        $agreements = Agreement::where('status', '=', 2)->paginate(10);
        $status = ["vigentes", "finalizados", "cancelados"];
        $index = 2;
        return view('agreement.agreement_report', compact('agreements', 'status', 'index'));
    }
    /* -------------------------------------------------------------------------- */
    /*                         Sysad Indicator Agreements                         */
    /* -------------------------------------------------------------------------- */
    public function sysadIndicatorAgreements(Request $request)
    {
        /* -------------------------------------------------------------------------- */
        /*                                Validate data                               */
        /* -------------------------------------------------------------------------- */
        $year = $request->year;
        $dates = null;
        $agreements = [];
        $data_request = [null, null, null];
        /* -------------------------------------------------------------------------- */
        /*                                  Set data                                  */
        /* -------------------------------------------------------------------------- */
        $sysadIndicators = SysadIndicator::pluck('description', 'id');
        $trimesters = [1, 2, 3, 4];
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $years = $this->currentYear();
        $agreements_types = AgreementType::all();
        $instances = Instance::all();

        /* -------------------------------------------------------------------------- */
        /*                                   Response                                 */
        /* -------------------------------------------------------------------------- */
        if ($year != null) {
            $dates = $this->yearToDates($years, $year, $request->trimester);
            $agreements = $this->getAgreements($request->sysad_indicator_id, $dates);
            $data_request = [$request->sysad_indicator_id, $request->trimester, $year];
        }
        return view('agreement.indicator_agreement_report', compact('instances', 'agreements_types', 'sysadIndicators', 'agreements', 'status', 'trimesters', 'years', 'data_request'));
    }
    public function currentYear()
    {
        $current_year = date("Y");
        $years = [];
        for ($i = 2017; $i <= $current_year; $i++) {
            array_push($years, $i);
        }
        return $years;
    }
    public function yearToDates($years, $year, $trimester)
    {
        $start_date = "";
        $end_date = "";
        switch ($trimester) {
            case 0:
                $start_date = "-01-01";
                $end_date = "-03-31";
                break;
            case 1:
                $start_date = "-04-01";
                $end_date = "-06-31";
                break;
            case 2:
                $start_date = "-07-01";
                $end_date = "-09-31";
                break;
            case 3:
                $start_date = "-10-01";
                $end_date = "-12-31";
                break;
            default:
                $start_date = "";
                $end_date = "";
                break;
        }
        $dates = [$years[$year] . $start_date, $years[$year] . $end_date];
        return $dates;
    }
    public function getAgreements($sysad_id, $dates)
    {
        $agreements = DB::table('agreements')
            ->where('sysad_id', '=', $sysad_id)
            ->where('status', '=', 0)
            ->whereBetween('start_date', [$dates[0], $dates[1]])->paginate(10);
        return $agreements;
    }
    public function getCurrentAgreementsByDate(Request $request)
    {
        $instances = Instance::all();
        $agreements_types = AgreementType::all();
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $date = $request->date;
        $agreements = DB::select(
            'select * from agreements where (start_date <= ? OR end_date <= ? ) AND status = "0"',
            [$date, $date]
        );
        return view('agreement.current_agreement_by_date_report', compact('instances', 'agreements_types', 'agreements', 'status', 'date'));
    }
    public function getAgreementsBySpecialties($idSpecialty)
    {
        $specialty = Specialty::find($idSpecialty);
        $agreements = $specialty->agreement_specialty;
        $specialties = Specialty::pluck('name', 'id');
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $validate = 1;
        return view('agreement.index', compact('agreements', 'status', 'specialties', 'validate'));
    }
}
