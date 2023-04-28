@extends('layouts.layout')
@section('title', 'Igor')
@section('content')



<x-system.navbar/>
<x-system.header/>
<x-system.about :dat="$about" />
<x-system.service :dat="$service"/>
<x-system.portfolio :dat="$portfolio"/>
<x-system.pricing :dat="$signature"/>
<x-system.contact :dat="$contact" />
<x-system.testimonial :dat="$testimonial"/>
<x-system.footer/>
   
@endsection