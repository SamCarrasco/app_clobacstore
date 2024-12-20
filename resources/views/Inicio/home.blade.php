@extends('layouts.app')
@section('title','Home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/script.js')}}"></script>
@endsection
@section('content')
<section class="banner1">
    <div class="banner-content">
        <img src="{{ asset('img/best-british-fashion-brands-1.jpg')}}" alt="">
        <div class="overlay">
            <h1>Tu estilo en las mejores manos</h1>
            <button>Comprar</button>
        </div>
    </div>
</section>

<section class="products-section container mt-5">
    <h2>Nuevos Lanzamientos</h2>
    <div class="row">
        <!-- Producto 1 -->
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-overlay">
                    <button class="btn btn-dark btn-buy">
                        <i class="bi bi-bag"></i>
                    </button>
                </div>
                <img src="{{ asset('img/product/product-3.jpg')}}" class="card-img-top" alt="Producto 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Producto 1</h5>
                    <p class="card-text">Bs.100.00</p>
                </div>
            </div>
        </div>
        <!-- Producto 2 -->
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-overlay">
                    <button class="btn btn-dark btn-buy">
                        <i class="bi bi-bag"></i>
                    </button>
                </div>
                <img src="{{ asset('img/product/product-2.jpg')}}" class="card-img-top" alt="Producto 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Producto 2</h5>
                    <p class="card-text">Bs.150.00</p>
                </div>
            </div>
        </div>
        <!-- Producto 3 -->
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-overlay">
                    <button class="btn btn-dark btn-buy">
                        <i class="bi bi-bag"></i>
                    </button>
                </div>
                <img src="{{ asset('img/product/product-4.jpg')}}" class="card-img-top" alt="Producto 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Producto 3</h5>
                    <p class="card-text">Bs.250.00</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="banner2">
    <div class="banner-content">
        <img src="{{ asset('img/banner-1.jpg')}}" alt="">
        <div class="overlay">
            <h1>Aprovecha las Ofertas de Verano</h1>
            <button>Comprar</button>
        </div>
    </div>
</section>
@endsection