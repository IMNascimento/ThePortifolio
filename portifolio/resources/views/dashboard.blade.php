@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
 
<x-dashboard.navbar/>
@if (isset($msg))
<div class="alert alert-success" role="alert">
  {{$msg}}
</div>
@else

@endif
@if ($x == "list")
    <x-dashboard.liste :result="$list" :service="$type"/>  
@else
@endif

<x-dashboard.about-modal/>
<x-dashboard.service-modal/>  
<x-dashboard.testimonials-modal :portfolio="$port"/>
<x-dashboard.signature-modal/>
<x-dashboard.portfolio-modal/>





@endsection