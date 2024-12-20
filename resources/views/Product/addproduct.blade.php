@extends('layouts.app')
@section('title','Home')
@section('css')
<link rel="stylesheet" href="{{ asset('css/styleaddproduct.css')}}" type="text/css">
@endsection
@section('content')
<div class="container mt-5 addproduct">
    <h1 class="text-center">Agregar Prenda</h1>
    <form action="{{ route('prenda.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Prenda</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>

        <!-- Stock -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                <option value="" selected disabled>Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Subcategoría -->
        <div class="mb-3">
            <label for="id_subcategoria" class="form-label">Subcategoría</label>
            <select class="form-select" id="id_subcategoria" name="id_subcategoria" required>
                <option value="" selected disabled>Seleccione una subcategoría</option>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
        </div>

        <!-- Botón de Enviar -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Agregar Prenda</button>
        </div>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    </form>
</div>
@endsection