<?php

namespace App\Http\Controllers;

use App\Vulcanizare;
use Illuminate\Http\Request;
use App\Vulcanizator;
use App\Beneficiar;
use App\DeletedVulcanizare;
use User;
use Auth;

class VulcanizareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vulcanizare = Vulcanizare::all();
        $vulcanizator = Vulcanizator::all();
        $beneficiar = Beneficiar::all();

        $vulcanizare->load('Beneficiar');
        $vulcanizare->load('Vulcanizator');

        // dd($vulcanizare);
        return view('vulcanizare.index', compact('vulcanizare', 'vulcanizator', 'beneficiar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $beneficiar = Beneficiar::all();
        $vulcanizator = Vulcanizator::all();
        return view('vulcanizare.create', compact('vulcanizator', 'beneficiar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beneficiar = Beneficiar::create($request->only(['nume', 'category', 'model', 'nr_masina']));
        $vulcanizare = Vulcanizare::create($request->only(['vulcanizator_id','suma', 'beneficiar_id', 'nr_masina']));
        
        return redirect('/vulcanizare');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vulcanizare  $vulcanizare
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $vulcanizare = Vulcanizare::find($id);
        $vulcanizare->load('Beneficiar');
        $vulcanizare->load('Vulcanizator');
        return view('vulcanizare.show', compact('vulcanizare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vulcanizare  $vulcanizare
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vulcanizator = Vulcanizator::all();
        $vulcanizare = Vulcanizare::find($id);
        $vulcanizare->load('Beneficiar');
        $vulcanizare->load('Vulcanizator');
        return view('vulcanizare.edit', compact('vulcanizare','vulcanizator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vulcanizare  $vulcanizare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vulcanizareId, $beneficiarId)
    {
        $vulcanizare = Vulcanizare::find($vulcanizareId);
        $beneficiar = Beneficiar::find($beneficiarId);

        $beneficiar->update($request->only(['nume', 'category', 'model', 'nr_masina']));
        $vulcanizare->update($request->only(['vulcanizator_id','suma', 'beneficiar_id']));
        
        return redirect('/vulcanizare');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vulcanizare  $vulcanizare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vulcanizare $vulcanizare)
    {
        DeletedVulcanizare::create([
            'vulcanizator_id'       => $vulcanizare->vulcanizator_id,
            'beneficiar_id'         => $vulcanizare->beneficiar_id,
            'suma'                  => $vulcanizare->suma,
            'user_id'               => Auth::user()->name
       ]);

        $vulcanizare->delete();
        
        return redirect('/vulcanizare');
    }


    public function raportZilnicRequest(Request $request)
    {
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;

        $raport = Vulcanizare::where('created_at','<', $to)->where('created_at', '>', $from)->get();

        return view('vulcanizare.zilnic', compact('raport'));

    }
}
