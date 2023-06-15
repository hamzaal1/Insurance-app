<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function create(){

    }
    public function store(UserRequest $req){
        $req->validated();
        User::create([$req->all()]);
        return back()->with('msg',"User created successfully");

    }
}
