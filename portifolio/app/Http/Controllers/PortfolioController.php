<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{
    
    static public function getPort(){
        return Portfolio::all();
    }
    public function index()
    {
        return view('dashboard',['x'=>'list','port'=>self::getPort(), 'type'=>'portfolio', 'list'=>Portfolio::all()]);
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

        $d = new Portfolio;
        $d->title = $request->title;
        $d->description = $request->description;
        $d->patch = 'senai/' . $nameStore;
        $d->url = $request->url;
        $d->type = $request->type;
        $d->save();

        return $this->show("portifolio cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show($msg)
    {
        return view('dashboard',['x'=>'list','port'=>self::getPort(), 'type'=>'portfolio', 'list'=>Portfolio::all(), 'msg'=>$msg]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('editPortfolio', ['list'=>Portfolio::find($id)]);
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

        $x= Portfolio::find($id); 
        $x->title = $request->title;
        $x->description = $request->description;
        $x->patch = $nameStore;
        $x->url = $request->url;
        $x->type = $request->type;
        $x->save();
        return $this->show("Item atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fg = Portfolio::find($id);
        $fg->delete();
        return $this->show("Item deletado com sucesso!");
    }
    public function searchPortfolio(Request $request){
        $xc = Portfolio::where('title', 'LIKE', '%'.$request->search.'%')->get();
        return view('dashboard', ['x'=>'list','port'=>self::getPort(), 'type'=>'portfolio', 'list'=> $xc]);
    }

    static function dinamicData()
    {
        return Portfolio::all();
    }

}
