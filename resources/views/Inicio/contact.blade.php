@extends('layouts.app')
@section('title','Home')
@section('css')
     <!-- Css Styles -->
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/elegant-icons.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/slicknav.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{ asset('css/stylecontact.css')}}" type="text/css">

     <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    @section('js')
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/jquery.countdown.min.jsv')}}"></script>
    <script src="{{ asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    @endsection

@endsection
@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="container py-5">
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="mb-4">
            <h5>Contactactanos</h5>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <h6><i class="fa fa-map-marker"></i> Dirección</h6>
                    <p>Entre 2do y 3er Anillo, Av. Alemana, Calle S Lairana</p>
                </li>
                <li class="mb-3">
                    <h6><i class="fa fa-phone"></i> Telefono</h6>
                    <p><span>76543218</span> - <span>(3)343356</span></p>
                </li>
                <li class="mb-3">
                    <h6><i class="fa fa-headphones"></i> Soporte</h6>
                    <p>Support.clobacclothes@gmail.com</p>
                </li>
            </ul>
        </div>

        <div>
            <h5>SEND MESSAGE</h5>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Correo" required>
                </div>
                <div class="mb-3">
                    <input name="numero" type="text" class="form-control" placeholder="Celular" required>
                </div>
                <div class="mb-3">
                    <textarea name="mensaje" class="form-control" placeholder="Mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Contáctame</button>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="mb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.6964455931925!2d-63.164806788962856!3d-17.758936574321137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e73616c17dfb%3A0x94a7d85aea92f29b!2sCLOBAC!5e0!3m2!1sen!2sbo!4v1733462500232!5m2!1sen!2sbo" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
</section>
<!-- Contact Section End -->


<!-- Instagram Begin -->
<div class="instagram">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-4 p-0">
            <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-1.jpg')}}">
                <div class="instagram__text">
                    <i class="fa fa-instagram"></i>
                    <a href="https://www.instagram.com/clobac.oficial/">@ clobac.oficial</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 p-0">
            <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-2.jpg')}}">
                <div class="instagram__text">
                    <i class="fa fa-instagram"></i>
                    <a href="https://www.instagram.com/clobac.oficial/">@ clobac.oficial</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 p-0">
            <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-3.jpg')}}">
                <div class="instagram__text">
                    <i class="fa fa-instagram"></i>
                    <a href="https://www.instagram.com/clobac.oficial/">@ clobac.oficial</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 p-0">
            <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-4.jpg')}}">
                <div class="instagram__text">
                    <i class="fa fa-instagram"></i>
                    <a href="https://www.instagram.com/clobac.oficial/">@ clobac.oficial</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 p-0">
            <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-5.jpg')}}">
                <div class="instagram__text">
                    <i class="fa fa-instagram"></i>
                    <a href="https://www.instagram.com/clobac.oficial/">@ clobac.oficial</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 p-0">
            <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-6.jpg')}}">
                <div class="instagram__text">
                    <i class="fa fa-instagram"></i>
                    <a href="https://www.instagram.com/clobac.oficial/">@ clobac.oficial</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection