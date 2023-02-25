<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //
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

        $db = new About;
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->save();

        return view('dashboard',['msg'=>"Item cadastrado com sucesso !"]);
    }

    public function getAboutAll()
    {
        return About::all();
    }

    public function getAbout(Request $request)
    {
        return About::find($request->id);
    }

    public function updateAbout(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName."_". time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        }else {
            $nameStore = $request->patch;
        }


        $db = About::find($request->id);
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->save();
    }

    public function deleteAbout(Request $request)
    {
        $db = About::find($request->id);
        $db->delete();  
    }

    public function search(Request $request)
    {
        About::where('description', 'LIKE', '%'.$request->search.'%')
               ->get();
    }


}
