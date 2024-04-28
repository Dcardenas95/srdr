<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OperatorController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::user()->role == 'admin') {

            $operators = Operator::query()
                ->when($request->search, function ($query, $value) {
                    $query->where('cedula', 'like', "%$value%");
                })
                ->orderBy('cedula')
                ->paginate(20)->withQueryString();

            return view(
                'operator.index',
                [
                    'operators' => $operators
                ]
            );
        }

        if (Auth::user()->role != 'admin') {
            $email = Auth::user()->email;

            $operator = Operator::where('email', $email)->first();
            $operatorDatas = $operator->operatorDatas()->paginate(20);

            return view('operatorData.index', [
                'operator' => $operator,
                'operatorDatas' =>  $operatorDatas
            ]);
        }
    }


    public function create()
    {
        return view('operator.create');
    }


    public function store(Request $request)
    {

        $operator = new Operator();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'cedula' => ['unique:' . Operator::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);

        event(new Registered($user));

        $operator->create($request->all());


        // Guardar mensaje en la sesión
        session()->flash('success', 'Registro Creado!');
        return redirect()->route('operators.index')->with('success', session('success'));
    }


    public function edit(Operator $operator)
    {
        return view(
            'operator.edit',
            [
                'operator' => $operator
            ]
        );
    }


    public function update(Request $request, Operator $operator)
    {
        $operator->update($request->all());

        return redirect(route('operators.index'));
    }


    public function destroy(Operator $operator)
    {
        // Guardar mensaje en la sesión
        session()->flash('error', 'Registro Creado!');

        $operator->delete();
        return redirect(route('operators.index'))->with('error', session('error'));
    }
}
