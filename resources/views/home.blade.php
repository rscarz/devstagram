@extends('layouts.app')

@section('titulo')
    Página principal 2
@endsection


@section('contenido')
    Contenido pagina principal

    <x-listar-post :posts="$posts"/>
 




    {{-- @forelse ($posts as $p)
        <h1> {{$p->titulo}} asdasd</h1>
    @empty
        <p>No hay posts</p>
    @endforelse --}}

@endsection