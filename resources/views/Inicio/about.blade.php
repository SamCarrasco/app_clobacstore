@extends('layouts.app')
@section('title','About Us')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/styleabout.css')}}">
    <script src="{{ asset('js/script.js')}}"></script>
@endsection
@section('content')
<section class="banner1">
    <div class="banner-content">
        <!-- Imagen 1 -->
        <div class="banner-image-left">
            <img src="{{ asset('img/best-british-fashion-brands-1.jpg') }}" alt="imagen banner 1">
        </div>

        <!-- Imagen 2 -->
        <div class="banner-image-right">
            <img src="{{ asset('img/category-1.jpg') }}" alt="imagen banner 1">
        </div>

        <!-- Cuadro con texto en el centro -->
        <div class="overlay">
            <h1>Hacemos posible el estilo que estabas buscando</h1>
            <button>Comprar</button>
        </div>
    </div>
</section>
<section class="info text-center py-5" style="background-color: #f4f4f4; color: #333;">
    <div class="container">
        <h2 class="mb-4">Generamos innovación en el comercio fuera del retail.</h2>
        <p class="mb-4">
            Nos aseguramos de que nuestros clientes se beneficien de nuestros productos. Nos esforzamos para ofrecer una amplia gama de ropa de marca premium a un precio inferior al costo de fabricación, y así nació <strong>www.clobacstore.com</strong>. Con frecuencia, la cantidad y calidad de las compras no justifican el costo y esfuerzo de viajar para comprar. Pero ahora, desde la comodidad de tu hogar o tienda, puedes comprar tus marcas favoritas y recibirlas en la puerta de tu casa en poco tiempo. Con nuevas llegadas todos los días, ofrecemos una experiencia única de "Búsqueda del Tesoro" para los clientes, lo que hace que vuelvan una y otra vez.
            <br><br>
            Cada visita a la tienda es una experiencia, con las últimas colecciones esperando ser descubiertas.
            <br><br>
            Contamos con una sala de exposición en vivo que muestra todos los artículos disponibles en <strong>www.clobacstore.com</strong>. Te invitamos a visitarnos todos los días de 10 a.m. a 8 p.m. Ten en cuenta que los artículos y sus precios serán los mismos que ves en la página web.
        </p>
        <a href="#" class="btn btn-dark px-4 py-2">Comprar</a>
    </div>
</section>    
@endsection