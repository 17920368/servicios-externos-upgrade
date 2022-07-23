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

class AgreementController extends Controller
{
    public function index(Request $request)
    {
        $agreements = Agreement::paginate(10);
        $status = ["Vigente", "Finalizado", "Cancelado"];
        // if ($request->search) {
        //     $agreements = Agreement::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        // }
        return view('agreement.index', compact('agreements', 'status'));
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
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $index = 0;
        return view('agreement.agreement_report', compact('agreements', 'status', 'index'));
    }
    public function finalizedAgreements()
    {
        $agreements = Agreement::where('status', '=', 1)->paginate(10);
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $index = 1;
        return view('agreement.agreement_report', compact('agreements', 'status', 'index'));
    }
    public function canceledAgreements()
    {
        $agreements = Agreement::where('status', '=', 2)->paginate(10);
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $index = 2;
        return view('agreement.agreement_report', compact('agreements', 'status', 'index'));
    }
}
