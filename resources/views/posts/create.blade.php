@extends('layouts.app')

@section('titulo')
    
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')




    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" 
                    class="dropzone border-dasher border-2 w-full h-96 rounded flex flex-col justify-center items-center">
              
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
           
            <form action="{{ route('post.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Título
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Titulo de la publicación"
                        class="border p-3 w-full rounded-lg text-xs  @error('titulo') border-red-500 @enderror " value="{{ old('titulo')}}"
                    />
                    @error('titulo') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg text-xs  @error('descripcion') border-red-500 @enderror ">{{ old('descripcion')}}</textarea>
                    @error('descripcion') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror
                </div>

                <div class="mb-5" >
                    <input name="imagen"
                            type="hidden"
                            value="{{ old('imagen')}}"
                            />
                    
                    @error('imagen') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror
                </div>

                <input type="submit"
                        value="Publicar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "/>
            </form>
        </div>


    </div>
    
@endsection

