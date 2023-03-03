@extends('layouts.layout')
@section('title', 'Editar About')
@section('content')
 
<x-dashboard.navbar/>
   

  <div class="card w-75" >
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{Storage::url($list->patch)}}" alt="about" width="200px" height="200px">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Testimonials</h5>
          <form action="/update/testimonials" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$list->id}}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nome</label>
                <input type="text" name="name" value="{{$list->name}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Portifolio</label>
                <select class="form-control" name="portfolio" id="exampleFormControlSelect1">
                    <option value="{{$list->portfolios_id}}">{{$list->portfolios_id}}</option>
                  @foreach ($portfolio as $k)
                  <option value="{{$k->id}}">{{$k->title}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Relato</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="report" rows="3">{{$list->report}}</textarea>
              </div>
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="hidden" name="patch" value="{{$list->patch}}">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Editar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  @endsection