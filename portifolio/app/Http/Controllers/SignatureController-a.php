<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signature;
use App\Http\Controllers\PortfolioController;

class SignatureController extends Controller
{
    //
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

        $db = new Signature;
        $db->type = $request->type;
        $db->price = $request->price;
        $db->payament_type = $request->payament_type;
        $db->description = $request->description;
        $db->icon = 'senai/icon/'.$nameStore;
        $db->save();

        return view('dashboard',['x'=>"",'port'=>PortfolioController::getPort(), 'msg'=>"Assinatura cadastrada com sucesso !"]);
    }

    public function getSignatureAll()
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>"signature", 'list'=> Signature::all()]);
    }

    public function getSignature(Request $request)
    {
        return view('editSignature', [ 'list'=> Signature::find($request->id)]);
    }

    public function updateSignature(Request $request)
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


        $db = Signature::find($request->id);
        $db->type = $request->type;
        $db->price = $request->price;
        $db->payament_type = $request->payament_type;
        $db->description = $request->description;
        $db->icon = $nameStore;
        $db->save();
        return $this->getSignatureAll();
    }

    public function deleteSignature(Request $request)
    {
        $db = Signature::find($request->id);
        $db->delete(); 
        return $this->getSignatureAll();
    }

    public function searchSignature(Request $request)
    {
        $db = Signature::where('title', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(),'type'=>'signature','list'=> $db]);
    }

}
