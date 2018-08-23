<?php

namespace App\Http\Controllers;

use App\Reglarea_unghiului;
use Illuminate\Http\Request;
use App\Reglarea_mecanic;
use App\Beneficiar;
use App\DeletedReglarea;
use Auth;

class ReglareaUnghiuluiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reglarea = Reglarea_unghiului::all();
        $reglareaMecanic = Reglarea_mecanic::all();
        $beneficiar = Beneficiar::all();

        $reglarea->load('Beneficiar');
        $reglarea->load('Reglarea_mecanic');

        return view('reglarea.index', compact('reglarea', 'reglareaMecanic', 'beneficiar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reglareaMecanic = Reglarea_mecanic::all();
        $persoaneJuridice = Beneficiar::all()->where('category',1);
        $beneficiar = Beneficiar::all();
        return view('reglarea.create', compact('reglareaMecanic', 'persoaneJuridice', 'beneficiar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beneficiar = Beneficiar::create($request->only(['nume', 'category', 'telefon', 'model', 'nr_masina', 'km']));
        $reglarea = Reglarea_unghiului::create($request->only(['mecanic_id','pret_lucru', 'beneficiar_id', 'nr_masina']));
        return redirect('/reglarea');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reglarea_unghiului  $reglarea_unghiului
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reglarea = Reglarea_Unghiului::find($id);
        $reglarea->load('Beneficiar');
        $reglarea->load('Reglarea_mecanic');
        return view('reglarea.show', compact('reglarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reglarea_unghiului  $reglarea_unghiului
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reglareaMecanic = Reglarea_mecanic::all();
        $reglarea = Reglarea_Unghiului::find($id);
        $reglarea->load('Beneficiar');
        $reglarea->load('Reglarea_mecanic');

        return view('reglarea.edit', compact('reglarea','reglareaMecanic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reglarea_unghiului  $reglarea_unghiului
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reglareaId, $beneficiarId)
    {
        $reglarea = Reglarea_unghiului::find($reglareaId);
        $beneficiar = Beneficiar::find($beneficiarId);

        $beneficiar->update($request->only(['nume', 'category', 'telefon', 'model', 'nr_masina', 'km']));
        $reglarea->update($request->only(['mecanic_id','pret_lucru', 'beneficiar_id']));

        return redirect('/reglarea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reglarea_unghiului  $reglarea_unghiului
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglarea_unghiului $reglarea_unghiului)
    {
       DeletedReglarea::create([
            'mecanic_id'            => $reglarea_unghiului->mecanic_id,
            'beneficiar_id'         => $reglarea_unghiului->beneficiar_id,
            'pret_lucru'            => $reglarea_unghiului->pret_lucru,
            'user_id'               => Auth::user()->name,
            'old_parent_id'         => $reglarea_unghiului->id,
            'nr_masina'             => $reglarea_unghiului->Beneficiar->nr_masina
       ]);

        $reglarea_unghiului->delete();
        
        return redirect('/reglarea');
    }

    public function raportZilnicRequest(Request $request)
    {
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;

        $raport = Reglarea_unghiului::where('created_at','<', $to)->where('created_at', '>', $from)->get();

        return view('reglarea.zilnic', compact('raport'));

    }
}
