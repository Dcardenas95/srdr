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

     

        return view('operatorData.index' , [
            'operator' => $operator ,
            'operatorDatas' =>  $operatorDatas
        ]);
    }

    public function create(Operator $operator)
    {
        return view('operatorData.create' ,[
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
            'fruit_type'=> $request->fruit_type,
            'fruit_weight'=> $request->fruit_weight,
            'hours_worked'=> $request->hours_worked,
            'date_collection' => $request->date_collection,
            'observation'=> $request->observation
        ]);

        return redirect()->route('operatordatas.index' , [
            'operator' => $operator_
        ]);

    }
}
