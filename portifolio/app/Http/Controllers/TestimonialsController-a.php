<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Http\Controllers\PortfolioController;

class TestimonialsController extends Controller
{
  public function create(Request $request)
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

        return view('dashboard',['x'=>"",'port'=> PortfolioController::getPort(), 'msg'=>"Item cadastrado com sucesso !"]);
    }

    public function getTestimonialsAll()
    {
        return view('dashboard',['x'=>"list",'type'=>"testimonials", 'list'=> Testimonials::all(), 'port'=> PortfolioController::getPort()]);
    }

    public function getTestimonials(Request $request)
    {
        return view('editTestimonials', ['portfolio'=>PortfolioController::getPort(), 'list'=> Testimonials::find($request->id)]);
    }

    public function updateTestimonials(Request $request)
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


        $db = Testimonials::find($request->id);
        $db->report = $request->report;
        $db->name = $request->name;
        $db->portfolios_id = $request->portfolio;
        $db->patch = 'senai/'.$nameStore;
        $db->save();
        return $this->getTestimonialsAll();
    }

    public function deleteTestimonials(Request $request)
    {
        $db = Testimonials::find($request->id);
        $db->delete(); 
        return $this->getTestimonialsAll();
    }

    public function searchTestimonials(Request $request)
    {
        $db = Testimonials::where('description', 'LIKE', '%'.$request->search.'%')
               ->get();
        return view('dashboard',['x'=>"list",'type'=>'testimonials','list'=> $db]);
    }

}
