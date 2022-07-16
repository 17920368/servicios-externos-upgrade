<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\AgreementType;
use App\Models\Indicator;
use App\Models\Instance;
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
        $indicators = Indicator::pluck('name', 'id');
        $instances = Instance::pluck('name', 'id');
        $status = ["Vigente", "Finalizado", "Cancelado"];
        return view('agreement.create', compact('agreements_types', 'indicators', 'status', 'instances'));
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
        $agreement->user_id = $user_id;
        $agreement->save();
        return redirect()->route('convenio.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $agreements_types = AgreementType::pluck('name', 'id');
        $indicators = Indicator::pluck('name', 'id');
        $instances = Instance::pluck('name', 'id');
        $status = ["Vigente", "Finalizado", "Cancelado"];
        $agreement = Agreement::find($id);
        if ($agreement != null) {
            return view('agreement.edit', compact('agreement', 'agreements_types', 'indicators', 'status', 'instances'));
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
            $agreement->user_id = $user_id;
            $agreement->save();
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
}
