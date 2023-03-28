<?php

namespace App\Http\Controllers;

use App\Models\Banklogs;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class BanklogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buylogs(Request $request)
    {

        $id=$request->id;

        //in the database select the log that suits the $request->id
        $banklogs=Banklogs::where('type',$id)->get('price');

        $price=$banklogs[0]['price'];

        //check if the authenticated user has the amount in his wallet

        $wallet=Auth::user()->wallet;

        if($wallet>=$price){

            //deduct the amount from the user
            $newamount=$wallet-$price;

            $update=User::where('id',Auth::user()->id)->update(['wallet'=>$newamount]);

            //add the information to the orders table

            toastr()->success('Purchase was successful check your secure email for details!');

            
            return redirect()->back();

            //show the user succeess that the purchase was successful

        }else{

            toastr()->error('You have insufficent balance!');

            
            return redirect('/deposit');
            //tell the user that the purchase was not successful
        }


    }
    public function index(Request $request)
    {
        //

        $banklogs=Banklogs::where('id',$request->id)->get();

        // return $banklogs;





        return view('banklogs')->with(compact('banklogs'));


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
     * @param  \App\Models\Banklogs  $banklogs
     * @return \Illuminate\Http\Response
     */
    public function show(Banklogs $banklogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banklogs  $banklogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Banklogs $banklogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banklogs  $banklogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banklogs $banklogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banklogs  $banklogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banklogs $banklogs)
    {
        //
    }
}
