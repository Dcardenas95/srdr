<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\OperatorData;
use Illuminate\Http\Request;

class OperatorDataController extends Controller
{
    public function index(Operator $operator)
    {
        $operatorDatas = $operator->operatorDatas()->paginate(20);


        return view('operatorData.index', [
            'operator' => $operator,
            'operatorDatas' =>  $operatorDatas
        ]);
    }

    public function create(Operator $operator)
    {
        return view('operatorData.create', [
            'operator' => $operator
        ]);
    }

    public function store(Request $request)
    {
        $operatorId = $request->operator_id;
        $operator_ = Operator::find($operatorId);
        $operator = new OperatorData();

        $operator->create([
            'operator_id' => $request->operator_id,
            'fruit_type' => $request->fruit_type,
            'fruit_weight' => $request->fruit_weight,
            'hours_worked' => $request->hours_worked,
            'date_collection' => $request->date_collection,
            'observation' => $request->observation
        ]);

        return redirect()->route('operatordatas.index', [
            'operator' => $operator_
        ]);
    }


    public function edit(OperatorData $operatorData)
    {
        $operator = Operator::find($operatorData->id);

        return view(
            'operatorData.edit',
            [
                'operator' => $operator,
                'operatorData' => $operatorData
            ]
        );
    }

    public function update(Request $request, OperatorData $operatorData)
    {
        $operator = Operator::find($request->operator_id);
        $operatorData->update($request->all());

        return redirect()->route(
            'operatordatas.index',
            [
                'operator' => $operator,
                'operatorDatas' => $operatorData
            ]
        );
    }


    public function destroy(OperatorData $operatorData)
    {
        // Guardar mensaje en la sesión
        session()->flash('error', 'registro Creado!');
        $operator = Operator::find($operatorData->operator_id);

        $operatorData->delete();

        return redirect(route('operatordatas.index', [
            'operator' => $operator
        ]))->with('error', session('error'));;
    }
}
