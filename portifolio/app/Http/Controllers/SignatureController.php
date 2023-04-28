<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>"signature", 'list'=> Signature::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

        $db = new Signature;
        $db->type = $request->type;
        $db->price = $request->price;
        $db->payament_type = $request->payament_type;
        $db->description = $request->description;
        $db->icon = 'senai/icon/'.$nameStore;
        $db->save();

        return $this->show("Assinatura cadastrada com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show($msg)
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>"signature", 'list'=> Signature::all(),'msg'=> $msg]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('editSignature', [ 'list'=> Signature::find($id)]);
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
        $db = Signature::find($id);
        $db->type = $request->type;
        $db->price = $request->price;
        $db->payament_type = $request->payament_type;
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
        $db = Signature::find($id);
        $db->delete(); 
        return $this->show("Item deletado com sucesso!");
    }

    public function searchSignature(Request $request)
    {
        $db = Signature::where('title', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(),'type'=>'signature','list'=> $db]);
    }
    static function dinamicData()
    {
        return Signature::all();
    }
}
