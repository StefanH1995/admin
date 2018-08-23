<?php

namespace App\Http\Controllers;

use App\Service;
use App\Reglarea_mecanic;
use App\Mecanic;
use App\Vulcanizator;
use App\Rapoarte;
use App\Vulcanizare;
use App\Reglarea_unghiului;
use App\Parent_Service;
use Illuminate\Http\Request;

class RapoarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents =  Parent_Service::all();
        $mecanics = Mecanic::all();
        $mecanics->load('Parent_Service');
        $services = Service::all();
        $reglareas = Reglarea_unghiului::all();
        $vulcanizares = Vulcanizare::all();
        $reglarea_mecanics = Reglarea_mecanic::all();
        $vulcanizators = Vulcanizator::all();
        return view('raport/index', compact('services', 'mecanics', 'reglarea_mecanics', 'vulcanizators', 'vulcanizares', 'reglareas', 'parents'));
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
     * @param  \App\Rapoarte  $rapoarte
     * @return \Illuminate\Http\Response
     */
    public function show(Rapoarte $rapoarte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rapoarte  $rapoarte
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapoarte $rapoarte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rapoarte  $rapoarte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapoarte $rapoarte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rapoarte  $rapoarte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapoarte $rapoarte)
    {
        //
    }

    public function raportZilnicRequest(Request $request)
    {
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;
        
        $parents =  Parent_Service::where('created_at','<', $to)->where('created_at', '>', $from)->get();
        $mecanics = Mecanic::all();
        $services = Service::where('created_at','<', $to)->where('created_at', '>', $from)->get();
        $reglareas = Reglarea_unghiului::where('created_at','<', $to)->where('created_at', '>', $from)->get();
        $vulcanizares = Vulcanizare::where('created_at','<', $to)->where('created_at', '>', $from)->get();
        $reglarea_mecanics = Reglarea_mecanic::all();
        $vulcanizators = Vulcanizator::all();
        return view('raport/zilnic', compact('services', 'mecanics', 'reglarea_mecanics', 'vulcanizators', 'vulcanizares', 'reglareas', 'parents', 'to', 'from'));
    }
}
