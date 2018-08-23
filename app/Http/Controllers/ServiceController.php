<?php

namespace App\Http\Controllers;

use App\Service;
use App\Mecanic;
use App\Beneficiar;
use Illuminate\Http\Request;
use DB;
use App\Parent_Service;
use Auth;
use App\DeletedService;
use App\DeletedParent;
use App\DeletedReglarea;
use App\DeletedVulcanizare;
use App\Reglarea_unghiului;
use App\Vulcanizare;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();     
        $mecanic = Mecanic::all();
        $beneficiar = Beneficiar::all();

        $service->load('Beneficiar');
        $service->load('Mecanic');
        $parents = Parent_Service::all();
        $parents->load('Service');

        return view('service.parent', compact('service', 'mecanic', 'beneficiar', 'parents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mecanic = Mecanic::all();
        $beneficiar = Beneficiar::all();
        return view('service.service', compact('mecanic', 'beneficiar'));
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

        $parent = Parent_Service::create($request->all());
        
        $total = 0;
        for($i=0; $i < count($request->piese); $i++)
        {

            $data = [];
            $data['piese'] = $request->piese[$i] ?? '';
            $data['cantitate'] = $request->cantitate[$i] ?? '';
            $data['pret'] = $request->pret[$i] ?? '';
            $data['suma'] = $request->suma[$i] ?? '';
            $data['pret_lucru'] = $request->pret_lucru[$i] ?? '';
            $data['suma_totala'] = $request->suma_totala[$i] ?? '';
            $data['mecanic_id'] = $request->mecanic_id ?? '';
            $data['beneficiar_id'] = $request->beneficiar_id ?? '';
            $data['parent_id'] = $parent->id;

            // $total = $request->suma_totala; 
            // $rep = array_sum($total);

          $serviciu = Service::create($data);
          
        }

        // $parent->suma = $rep;
        // $parent->update();

        $lastId = DB::table('parent__services')->orderBy('id', 'desc')->first()->id;

        return redirect('/service/show/'.$lastId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parents = Parent_Service::find($id);
        $parents->load('Service');
        $parents->load('Beneficiar');
        // $service->load('Mecanic');
        return view('service.showw', compact('parents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Parent_Service $parent)
    {
        $mecanic = Mecanic::all();
        $parent = Parent_Service::find($parent->id);
        $parent->load('Service');

        return view('service.edit', compact('parent','mecanic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parent_Service $parent, $beneficiarId)
    {
        $service = Service::where('parent_id', '=', $parent->id)->get();
        
        $beneficiar = Beneficiar::find($beneficiarId);

        
        $beneficiar->update($request->only(['nume', 'category', 'telefon', 'model', 'nr_masina', 'km']));

        for($i=0; $i < count($request->piese); $i++)
        {

            $data = [];
            $data['piese'] = $request->piese[$i] ?? '';
            $data['cantitate'] = $request->cantitate[$i] ?? '';
            $data['pret'] = $request->pret[$i] ?? '';
            $data['suma'] = $request->suma[$i] ?? '';
            $data['pret_lucru'] = $request->pret_lucru[$i] ?? '';
            $data['suma_totala'] = $request->suma_totala[$i] ?? '';
            $data['mecanic_id'] = $request->mecanic_id ?? '';
            $data['beneficiar_id'] = $request->beneficiar_id ?? '';
            $data['parent_id'] = $parent->id;


          $serviciu = Service::create($data);
          
        }
        
        return redirect('/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parent_Service $parent)
    {
        $allService = Service::where('parent_id', '=', $parent->id)->get();
        $beneficiar = Beneficiar::where('id', '=', $parent->beneficiar_id)->first();

        DeletedParent::create([
            'beneficiar_id'     => $parent->beneficiar_id,
            'mecanic_id'        => $parent->mecanic_id,
            'user_id'           => Auth::user()->name,
            'old_parent_id'     => $parent->id,
            'nr_masina'         => $beneficiar->nr_masina
        ]);

        foreach ($allService as $oneService) {
            DeletedService::create([
                'mecanic_id'            => $oneService->mecanic_id,
                'beneficiar_id'         => $oneService->beneficiar_id,
                'parent_id'             => $parent->id,
                'piese'                 => $oneService->piese,
                'cantitate'             => $oneService->cantitate,
                'pret'                  => $oneService->pret,
                'suma'                  => $oneService->suma,
                'pret_lucru'            => $oneService->pret_lucru,
                'suma_totala'           => $oneService->suma_totala,
                'user_id'               => Auth::user()->name,
                'parent_id'             => DB::table('deleted_parents')->orderBy('id', 'desc')->first()->id
            ]);
        }

        


        $service = Service::where('parent_id', '=', $parent->id)->delete();
        $parent->delete();

        return redirect('/service');
    }

    public function raportZilnicRequest(Request $request)
    {
        $data = explode(' - ', $request->daterange);
        $extract = explode(' ', $data[0]);
        $extract2 = explode(' ', $data[1]);
        $from = $extract[0] . ' 00:00:01';
        $to = $extract2[0]. ' 23:59:59';

        $date = $from;

        $raport = Parent_Service::where('created_at','<', $to)->where('created_at', '>', $from)->get();

        return view('service.zilnic', compact('raport'));

    }

    public function deleted()
    {
        $service = DeletedParent::all();

        $reglarea = DeletedReglarea::all();

        $vulcanizare = DeletedVulcanizare::all();

        return view('deleted.deleted', compact('reglarea', 'vulcanizare', 'service'));
    }

    public function compareDeletedService(DeletedParent $deletedParent)
    {
        $deletedParents = DeletedParent::select('deleted_parents.*',
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
        ->where('id', '=', $deletedParent->id)->first();


        $parentServices = Parent_Service::select('parent__services.*',
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as time'))
        ->where('nr_masina', $deletedParents->nr_masina)
        ->where(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"), '=', $deletedParents->date)
        ->first();

        if($parentServices){
            return view('deleted.compare-deleted-service', compact('deletedParents', 'parentServices'));
        }else{
            $parentServices = '';
            return view('deleted.compare-deleted-service', compact('deletedParents', 'parentServices'));
        }
    }

    public function compareDeletedReglarea(DeletedReglarea $deletedReglarea)
    {
        $deletedReglarea = DeletedReglarea::select('deleted_reglareas.*',
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
        ->where('id', '=', $deletedReglarea->id)
        ->first();


        $reglarea = Reglarea_unghiului::select('reglarea_unghiuluis.*',
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
        ->where('nr_masina', '=', $deletedReglarea->nr_masina)
        ->where(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"), '=', $deletedReglarea->date)
        ->first();

        if($deletedReglarea){
            return view('deleted.compare-deleted-reglarea', compact('deletedReglarea', 'reglarea'));
        }else{
            $deletedReglarea = '';
            return view('deleted.compare-deleted-reglarea', compact('deletedReglarea', 'reglarea'));
        }
    }

    public function compareDeletedVulcanizare(DeletedVulcanizare $deletedVulcanizare)
    {
        $deletedVulcanizare = DeletedVulcanizare::select('deleted_vulcanizares.*',
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
        ->where('id', '=', $deletedVulcanizare->id)
        ->first();

        $vulcanizare = Vulcanizare::select('vulcanizares.*',
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
        ->where('nr_masina', '=', $deletedVulcanizare->nr_masina)
        ->where(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"), '=', $deletedVulcanizare->date)
        ->first();

        if($deletedVulcanizare){
            return view('deleted.compare-deleted-vulcanizare', compact('deletedVulcanizare', 'vulcanizare'));
        }else{
            $deletedVulcanizare = '';
            return view('deleted.compare-deleted-vulcanizare', compact('deletedVulcanizare', 'vulcanizare'));
        }
    }
}
