@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
 
<x-dashboard.navbar/>
   
@if ($x == "list")
    <x-dashboard.liste :result="$list" :service="$type"/>  
@else
@endif


@if (isset($msg))
  <div class="alert alert-success" role="alert">
    {{$msg}}
  </div>
@else
  
@endif
<x-dashboard.about-modal/>
<x-dashboard.service-modal/>  
<x-dashboard.testimonials-modal/>
<x-dashboard.signature-modal/>
<x-dashboard.portfolio-modal/>





@endsection