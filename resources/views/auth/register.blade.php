@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')

    <div  class="md:flex md:justify-center md:gap-4 md:items-center p-5">
        <div  class="md:w-4/12 ">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Imagen registro de usuario"/>
        </div>
        <div  class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg text-xs  @error('name') border-red-500 @enderror " value="{{ old('name')}}"
                    />
                    @error('name') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Nombre de usuario
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg text-xs @error('username') border-red-500 @enderror " value="{{ old('username')}}"  
                    />
                    @error('username') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu email"
                        class="border p-3 w-full rounded-lg text-xs @error('email') border-red-500 @enderror " value="{{ old('email')}}"  
                    />
                    @error('email') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror  
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Tu password"
                        class="border p-3 w-full rounded-lg text-xs @error('password') border-red-500 @enderror " 
                    />
                    @error('password') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror  
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold text-xs" >
                        Repetir password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu password"
                        class="border p-3 w-full rounded-lg text-xs @error('password_confirmation') border-red-500 @enderror "  
                    />
                    @error('password_confirmation') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>   @enderror  
                </div>
                
                <input type="submit"
                        value="Crear cuenta"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "/>

            </form>
        </div>

    </div>
    
@endsection