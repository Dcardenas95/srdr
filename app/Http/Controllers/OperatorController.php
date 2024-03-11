<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    
    public function index(Request $request)
    {
        
        $operators = Operator::query()
        ->when($request->search, function ($query, $value) {
            $query->where('cedula', 'like' ,"%$value%" );
        })
        ->orderBy('cedula')
        ->paginate(20)->withQueryString();

        return view('operator.index',
        [
            'operators' => $operators 
        ]);
    }

  
    public function create()
    {
        return view('operator.create');
    }

  
    public function store(Request $request)
    {
       
        $operator = new Operator();
        $operator->create($request->all());

        return redirect()->route('operators.index');
    }

   
    public function edit(Operator $operator)
    {
        return view('operator.edit', 
        [
            'operator' => $operator
        ]);
    }

   
    public function update(Request $request, Operator $operator)
    {
        $operator->update($request->all());

        return redirect(route('operators.index'));
        
    }

   
    public function destroy(Operator $operator)
    {
        $operator->delete();
        return redirect(route('operators.index'));
    }
}
