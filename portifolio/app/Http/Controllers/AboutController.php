<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(),'type'=>"about", 'list'=> About::all()]);
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
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore = "noImagem.png";
        }
        $db = new About;
        $db->description = $request->description;
        $db->patch = 'senai/'.$nameStore;
        $db->save();
        return $this->show('Item cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     */
    public function show($msg)
    {
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(),'type'=>"about", 'list'=> About::all(),'msg'=> $msg ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('editAbout', ['list'=> About::find($id)]);
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
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
            $nameStore = 'senai/'. $nameStore;
        }else {
            $nameStore = $request->patch;
        }
        $db = About::find($id);
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->save();
        return $this->show('Foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $db = About::find($id);
        $db->delete(); 
        return $this->show('Foi deletado com sucesso!');
    }

    public function searchAbout(Request $request)
    {
        $db = About::where('description', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'port'=>PortfolioController::getPort(), 'type'=>'about','list'=> $db]);
    }
}
