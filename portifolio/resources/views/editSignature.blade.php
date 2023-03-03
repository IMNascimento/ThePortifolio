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
          <h5 class="card-title">Signature</h5>
          <form action="/update/signature" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$list->id}}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Preço</label>
                <input type="text" name="price" value="{{$list->price}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo</label>
                <select class="form-control" name="payament_type" id="exampleFormControlSelect1">
                    <option value="{{$list->payament_type}}">
                        @if ($list->payament_type == 'esp')
                            Especie
                        @elseif($list->payament_type == 'car')
                            Cartão
                        @elseif ($list->payament_type == 'pix')
                            Pix
                        @elseif ($list->payament_type == 'bol')
                            Boleto
                        @endif
                    </option>
                  <option value="bol">Boleto</option>
                  <option value="car">Cartão</option>
                  <option value="pix">Pix</option>
                  <option value="esp">Especie</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo</label>
                <select class="form-control" name="type" id="exampleFormControlSelect1">
                    <option value="{{$list->type}}">{{$list->type}}</option>
                  <option value="Premium">Premium</option>
                  <option value="Basic">Basic</option>
                  <option value="Turbo">Turbo</option>
                  <option value="Full">Full</option>
                </select>
              </div>
          <textarea name="description"  class="form-control" id="" cols="25" rows="4">{{$list->description}}</textarea>
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