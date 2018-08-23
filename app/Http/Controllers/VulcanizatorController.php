<?php

namespace App\Http\Controllers;

use App\Vulcanizator;
use Illuminate\Http\Request;
use App\Vulcanizare;

class VulcanizatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vulcanizator = Vulcanizator::all();

        return view('vulcanizator.index', compact('vulcanizator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vulcanizator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vulcanizator = Vulcanizator::create($request->all());
        return redirect('/vulcanizator');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vulcanizator  $vulcanizator
     * @return \Illuminate\Http\Response
     */
    public function show(Vulcanizator $vulcanizator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vulcanizator  $vulcanizator
     * @return \Illuminate\Http\Response
     */
    public function edit(Vulcanizator $vulcanizator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vulcanizator  $vulcanizator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vulcanizator $vulcanizator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vulcanizator  $vulcanizator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vulcanizator $vulcanizator)
    {
        //
    }


    public function raportZilnic($id)
    {
        $vulcanizator = Vulcanizator::find($id);

        return view('vulcanizator.zilnic', compact('vulcanizator'));
    }

    public function raportZilnicRequest(Request $request, $id)
    {
        $mecanic = Vulcanizator::find($id);
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;

        $raport = Vulcanizare::where('created_at','<', $to)->where('created_at', '>', $from)->get();

        return view('vulcanizator.zilnic-request', compact('raport','mecanic'));

    }
}
