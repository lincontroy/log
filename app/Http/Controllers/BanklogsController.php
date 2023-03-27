<?php

namespace App\Http\Controllers;

use App\Models\Banklogs;
use Illuminate\Http\Request;

class BanklogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
