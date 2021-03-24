<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;

class PizzaController extends Controller
{
    /*public function __construck(){
        $this->middleware('aut');
    }*/

    public function index(){
        
        //$pizzas=Pizza::all();
        //$pizzas = Pizza::orderBy('name')->get();
        //$pizzas = Pizza::where('type', 'Hawaiin')->get();
        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [
            'pizzas' => $pizzas
            ]);
    }

    public function show($id){

        $pizza=Pizza::findOrFail($id);

        return view( 'pizzas.show', ['pizza'=> $pizza]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){
        
        $pizza = New Pizza();

        $pizza->name= request('name');
        $pizza->type= request('type');
        $pizza->base= request('base');
        $pizza->topings= request('topings');

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }

    public function destroy($id){
        $pizza=Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}