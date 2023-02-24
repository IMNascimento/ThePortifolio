@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
 
<x-dashboard.navbar/>
@php
    $x = "list";
@endphp    

@if ($x == "teste")
  <p>rodou</p>
@elseif ($x == "list")
    <x-dashboard.liste/> 
@else
@endif

<x-dashboard.about-modal/>
<x-dashboard.service-modal/>  
<x-dashboard.testimonials-modal/>
<x-dashboard.signature-modal/>
<x-dashboard.portfolio-modal/>





@endsection