<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users=User::all();
       $payment=Payment::all();
       return view('admin',compact('users','payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required|integer',
            "email"=>'required|unique',
            "password"=>'required',
            'confirmpassword'=>'required'



        ]

        );
        User::create([$request->all()]);
        return redirect()->route('createuser')->with('message',"toy create suscfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=User::findOrFail($id);
        return view('usersedit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required|integer',
            "email"=>'required|unique',
            "password"=>'required',
            'confirmpassword'=>'required'



        ]

        );

        User::where('id',$id)->update([$request->all()]);
        return  redirect()->route('admin')->with('message','your users update sucssufly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin')->with('message','user deleted susccfuly');
}
}
