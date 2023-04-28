<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard',['x'=>"list",'type'=>"testimonials", 'list'=> Testimonials::all(), 'port'=> PortfolioController::getPort()]);
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
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore = "noImagem.png";
        }

        $db = new Testimonials;
        $db->report = $request->report;
        $db->name = $request->name;
        $db->portfolios_id = $request->portfolio;
        $db->patch = 'senai/'.$nameStore;
        $db->save();

        return $this->show("Item cadastrado com sucesso !");
    }

    /**
     * Display the specified resource.
     */
    public function show($msg)
    {
        return view('dashboard',['x'=>"list",'type'=>"testimonials", 'list'=> Testimonials::all(), 'port'=> PortfolioController::getPort(),'msg'=>$msg]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('editTestimonials', ['portfolio'=>PortfolioController::getPort(), 'list'=> Testimonials::find($id)]);
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
        $db = Testimonials::find($id);
        $db->report = $request->report;
        $db->name = $request->name;
        $db->portfolios_id = $request->portfolio;
        $db->patch = 'senai/'.$nameStore;
        $db->save();
        return $this->show("Item atualizado com sucesso !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $db = Testimonials::find($id);
        $db->delete(); 
        return $this->show("Item deletado com sucesso !");
    }
    public function searchTestimonials(Request $request)
    {
        $db = Testimonials::where('description', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'type'=>'testimonials','list'=> $db]);
    }
}
