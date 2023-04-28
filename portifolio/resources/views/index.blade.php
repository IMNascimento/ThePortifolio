@extends('layouts.layout')
@section('title', 'Igor')
@section('content')


@if (empty($about[0]))
    <h1>Página Fora, cadastre os campos.</h1>
@else
<x-system.navbar/>
<x-system.header/>
<x-system.about :dat="$about" />
<x-system.service :dat="$service"/>
<x-system.portfolio :dat="$portfolio"/>
<x-system.pricing :dat="$signature"/>
<x-system.contact :dat="$contact" />
<x-system.testimonial :dat="$testimonial"/>
<x-system.footer/>
@endif 
@endsection