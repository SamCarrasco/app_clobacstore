@extends('layouts.app')
@section('title','Home')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylelogin.css')}}">

@endsection
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100 contenedorlogin">
    <div class="col-md-6">
        <div class="card p-4 shadow-lg espaciolog">
            <h2 class="text-center mb-4 textcolor">Login</h2>
            <form method="POST" >
                @csrf
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label textcolor">Email</label>
                    <input name="login" type="email" class="form-control" id="email" placeholder="Introduce tu email" required>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label textcolor">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Introduce tu contraseña" required>
                </div>
                <!-- Remember Me -->
                {{-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input textcolor" id="rememberMe">
                    <label class="form-check-label textcolor" for="rememberMe" >Recuérdame</label>
                </div> --}}
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom textcolor btn-primary">Iniciar Sesión</button>
                </div>
            </form>
            <p class="text-center mt-3">
                <a href="#" class="text-decoration-none text-white">¿Olvidaste tu contraseña?</a>
            </p>
        </div>
    </div>
</div>
@endsection
    

