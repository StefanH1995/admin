<?php

namespace App\Http\Controllers;

use App\Reglarea_mecanic;
use Illuminate\Http\Request;
use App\Reglarea_unghiului;

class ReglareaMecanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reglareaMecanic = Reglarea_mecanic::all();

        return view('reglarea_mecanic.index', compact('reglareaMecanic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reglarea_mecanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglareaMecanic = Reglarea_mecanic::create($request->all());
        return redirect('/reglarea-mecanic');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reglarea_mecanic  $reglarea_mecanic
     * @return \Illuminate\Http\Response
     */
    public function show(Reglarea_mecanic $reglarea_mecanic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reglarea_mecanic  $reglarea_mecanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglarea_mecanic $reglarea_mecanic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reglarea_mecanic  $reglarea_mecanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglarea_mecanic $reglarea_mecanic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reglarea_mecanic  $reglarea_mecanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglarea_mecanic $reglarea_mecanic)
    {
        //
    }

    public function raportZilnic($id)
    {
        $reglareaMecanic = Reglarea_mecanic::find($id);

        return view('reglarea_mecanic.zilnic', compact('reglareaMecanic'));
    }

    public function raportZilnicRequest(Request $request, $id)
    {
        $mecanic = Reglarea_mecanic::find($id);
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;

        $raport = Reglarea_unghiului::where('created_at','<', $to)->where('created_at', '>', $from)->get();

        return view('reglarea_mecanic.zilnic-request', compact('raport','mecanic'));

    }
}
