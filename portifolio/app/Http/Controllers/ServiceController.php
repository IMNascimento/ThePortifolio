<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>"service", 'list'=> Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai/icon/', $nameStore);
        }else {
            $nameStore = "noImagem.png";
        }

        $db = new Service;
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = 'senai/icon/'.$nameStore;
        $db->save();
        return $this->show("Serviço cadastrado com sucesso !");
    }

    /**
     * Display the specified resource.
     */
    public function show($msg)
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>"service", 'list'=> Service::all(), 'msg'=>$msg]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('editService', [ 'list'=> Service::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai/icon/', $nameStore);
            $nameStore = 'senai/icon/'. $nameStore;
        }else {
            $nameStore = $request->patch;
        }
        $db = Service::find($id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = $nameStore;
        $db->save();
        return $this->show("Item atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $db = Service::find($id);
        $db->delete(); 
        return $this->show("Item deletado com sucesso!");
    }

    public function searchService(Request $request)
    {
        $db = Service::where('title', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(),'type'=>'service','list'=> $db]);
    }
    static function dinamicData()
    {
        return Service::all();
    }
}
