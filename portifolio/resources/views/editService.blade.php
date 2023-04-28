@extends('layouts.layout')
@section('title', 'Editar Service')
@section('content')
 
<x-dashboard.navbar/>
   

  <div class="card w-75" >
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{Storage::url($list->icon)}}" alt="about" width="200px" height="200px">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Service</h5>
          <form action="{{url('service/'.$list->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="form-control" value="{{$list->title}}">
          <textarea name="description" id="" class="form-control" cols="25" rows="4">{{$list->description}}</textarea>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="hidden" name="patch" value="{{$list->icon}}">
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