<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Controllers\PortfolioController;

class ServiceController extends Controller
{
    // id titulo descrição icone   modo lista 
    public function create(Request $request)
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

        return view('dashboard',['x'=>"",'port'=>PortfolioController::getPort(), 'msg'=>"Serviço cadastrado com sucesso !"]);
    }

    public function getServiceAll()
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>"service", 'list'=> Service::all()]);
    }

    public function getService(Request $request)
    {
        return view('editService', [ 'list'=> Service::find($request->id)]);
    }

    public function updateService(Request $request)
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


        $db = Service::find($request->id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = $nameStore;
        $db->save();
        return $this->getServiceAll();
    }

    public function deleteService(Request $request)
    {
        $db = Service::find($request->id);
        $db->delete(); 
        return $this->getServiceAll();
    }

    public function searchService(Request $request)
    {
        $db = Service::where('title', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(),'type'=>'service','list'=> $db]);
    }

}
