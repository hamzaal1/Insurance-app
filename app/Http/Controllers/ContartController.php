<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Offer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContartController extends Controller
{
    public function  create(){
        $userid=User::all();
        $useroffer=Offer::all();
        return view('contart',compact('userid','useroffer'));
    }
    public function store(Request $request){
        $request->validate([
            "userid"=>'required',
            "useroffer"=>'required'

        ]);
        Contract::create([
            'userid'=>$request->input('userid'),
            'useroffer'=>$request->input('useroffer'),
            "start_date"=>Carbon::now()
        ]);
        return redirect()->route('admin')->with('message',"create contarct susfully");
    }
     public function checkpayment($id){
        $dureecontact=Contract::where('user-id',$id)->value('start_date');
        $idcontact=Contract::where('user-id',$id)->value('id');
        $offerid=$idcontact->offer->id;
        $offerdate=Offer::where('id',$offerid)->value('duration');
        $duree=$dureecontact-$offerdate;
        return ('hh');
     }}
