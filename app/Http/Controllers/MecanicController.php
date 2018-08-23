<?php

namespace App\Http\Controllers;

use App\Mecanic;
use Illuminate\Http\Request;
use App\Service;
use Carbon\Carbon;
use App\Parent_Service;

class MecanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mecanic = Mecanic::all();

        return view('mecanic.index', compact('mecanic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mecanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mecanic = Mecanic::create($request->all());
        return redirect('/mecanic');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mecanic  $mecanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mecanic $mecanic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mecanic  $mecanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mecanic $mecanic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mecanic  $mecanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mecanic $mecanic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mecanic  $mecanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mecanic $mecanic)
    {
        //
    }

    public function raportZilnic($id)
    {
        $mecanic = Mecanic::find($id);
        $from = Carbon::now()->startOfMonth()->toDateString();
        $to = Carbon::now()->endOfMonth()->toDateString();
        $raport = Parent_Service::where('created_at','<', $to)->where('created_at', '>', $from)->get();


        return view('mecanic.zilnic', compact('mecanic', 'raport'));
    }

    public function raportZilnicRequest(Request $request, $id)
    {
        $mecanic = Mecanic::find($id);
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;

        $raport = Parent_Service::where('created_at','<', $to)->where('created_at', '>', $from)->get();

        return view('mecanic.zilnic-request', compact('raport','mecanic'));

    }
}
