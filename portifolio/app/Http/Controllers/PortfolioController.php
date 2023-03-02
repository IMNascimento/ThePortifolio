<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    //
    public function create(Request $request){
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

        return view('dashboard', ['x'=>'','msg'=>"portifolio cadastrado com sucesso!"]);
    }

    public function getPortfolioAll(){
        $x = Portfolio::all();
        return view('dashboard',['x'=>'list', 'type'=>'portfolio', 'list'=>$x]);
    }

    public function getPortfolio(Request $request){
        $z = Portfolio::find($request->id);
        return view('editPortfolio', ['list'=>$z]);
    }

    public function updatePortfolio(Request $request){
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

        $x= Portfolio::find($request->id); 
        $x->title = $request->title;
        $x->description = $request->description;
        $x->patch = $nameStore;
        $x->url = $request->url;
        $x->type = $request->type;
        $x->save();
        return $this->getPortfolioAll();

    }

    public function deletePortfolio(Request $request){
        $fg = Portfolio::find($request->id);
        $fg->delete();
        return $this->getPortfolioAll();
    }

    public function searchPortfolio(Request $request){
        $xc = Portfolio::where('title', 'LIKE', '%'.$request->search.'%')->get();
        return view('dashboard', ['x'=>'list', 'type'=>'portfolio', 'list'=> $xc]);
    }
}
