<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buycard(Request $request){


        $id=$request->id;

        $carddetails=Cards::where('type',$id)->get('price');

        $price=$carddetails[0]['price'];

        //check this users balance

        $wallet=User::where('id',Auth::user()->id)->get('wallet');

        $balance=$wallet[0]['wallet'];
        
        if($balance>=$price){


            //deduct the money from his wallet and send him the details to his wallet

            $newbalance=intval($balance)-intval($price);

            $update=User::where('id',Auth::user()->id)->update(['wallet'=>$balance]);


            if($update){

                toastr()->success('Purchase was successful check your secure email for details!');

            
            return redirect()->back();
            }else{

                toastr()->error('Purchase was not successful!');

            
            return redirect()->back();
            }


        }

    }

    public function cards(Request $request){

        //card number

        $cardtype=$request->id;

        $cards=Cards::where('brand',$cardtype)->get();

        return view('cards')->with(compact('cards'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function show(Cards $cards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function edit(Cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cards $cards)
    {
        //
    }
}
