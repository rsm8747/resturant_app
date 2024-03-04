<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestoController extends Controller
{
    //
    function index()
    {
        return view('home');
    }
    function welcome()
    {
        return view('welcome');
    }
    function list()
    {
        $data = Restaurant::all();
        
        return view('list', ["data" => $data]);
    }
    function add(Request $req)
    {
        $resto = new Restaurant();
        $resto->name = $req->input('name');
        $resto->email = $req->input('email');
        $resto->address = $req->input('address');
        $resto->save();
        $req->session()->flash('success', 'Restaurant Is  Added Successfully.');
        return redirect('list');
    }
    function delete(Request $req, $id)
    {
        Restaurant::find($id)->delete();
        $req->session()->flash('success', 'Restaurant has been deleted successfully.');
        return redirect('list');
    }

        public function edit(Request $req, $id)
    {
        $data = Restaurant::find($id);
        return view('edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->name = $req->input('name');
        $restaurant->email = $req->input('email');
        $restaurant->address = $req->input('address');
        $restaurant->save();

        $req->session()->flash('success', 'Restaurant has been updated successfully.');
        return redirect('list');
    }
    // function show()
    // {
    //     $data=Restaurant::paginate(5);
    //     return view('list',["data" => $data]);
    // }
    function show(Request $request)
{
    $search = $request->input('search');
    if ($search) {
        $data = Restaurant::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->paginate(5);
    } else {
        $data = Restaurant::paginate(5);
    }
    return view('list', ["data" => $data]);
}

    
    
}
