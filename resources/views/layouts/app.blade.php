<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @yield('css')
    <script src="{{ asset('js/script.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body>
    <header>
        	<div></div>
            <div>
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('inicio.home') }}">Clobac</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('inicio.home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('inicio.compra') }}">Comprar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('inicio.about') }}">Sobre Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('inicio.contact') }}">Contactanos</a>
                                </li>
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('prenda.create') }}">Agregar Prenda</a>
                                </li>   
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="">Bienvenido: {{ Auth::user()->login}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('Inicio/logout') }}">LogOut</a>
                                </li> 
                                @else
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('inicio.login') }}">Login</a>
                                </li>  
                                @endauth
                            </ul>
                            {{-- <form class="d-flex me-3">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form> --}}
                            <!-- Botón del carrito -->
                            {{-- <a href="{{ route('inicio.carrito') }}" class="btn btn-outline-light position-relative">
                                <i class="bi bi-bag"></i>
                            </a> --}}
                        </div>
                    </div>
                </nav>
                
            </div>
    </header>
    <main>
        @yield('content')
        @yield('js')
    </main>
    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Columna 1: About -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer__about">
                        <div class="footer__logo mb-3">
                            <a href="{{ route('inicio.home') }}">
                                <img id="logof" src="{{ asset('img/logo.png')}}" alt="Logo" class="img-fluid">
                            </a>
                        </div>
                        <p>Tu estilo en las mejores manos</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a href="#"><img src="{{ asset('img/payment/payment-1.png')}}" alt="Payment 1" class="img-fluid"></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-2.png')}}" alt="Payment 2" class="img-fluid"></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-3.png')}}" alt="Payment 3" class="img-fluid"></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-4.png')}}" alt="Payment 4" class="img-fluid"></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-5.png')}}" alt="Payment 5" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
                <!-- Columna 2: Quick Links -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div>
                        <h6>Páginas</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('inicio.about') }}" class="text-white">Sobre Nosotros</a></li>
                            <li><a href="{{ route('inicio.contact') }}" class="text-white">Contacto</a></li>
                            <li><a href="" class="text-white">Comprar</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Columna 4: Newsletter -->
                <div class="col-lg-4 col-md-6">
                    <div>
                        <h6>NEWSLETTER</h6>
                        <form action="#" class="d-flex flex-column flex-sm-row gap-2 mt-3">
                            <input type="email" class="form-control" placeholder="Email">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                        <div class="d-flex gap-3 mt-3">
                            <a href="#" class="text-white"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="mb-0">Copyright &copy; <script>document.write(new Date().getFullYear());</script> 
                        All rights reserved by Samuelito</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>


