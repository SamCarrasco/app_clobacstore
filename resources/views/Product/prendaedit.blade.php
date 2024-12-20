@extends('layouts.app')
@section('title', 'Editar Prenda')
@section('css')
<link rel="stylesheet" href="{{ asset('css/styleaddproduct.css') }}" type="text/css">
@endsection
@section('content')
<div class="container mt-5 addproduct">
    <h1 class="text-center">Editar Prenda</h1>
    <form id="editProductForm" action="{{ route('prenda.update', $prenda->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Prenda</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $prenda->nombre }}" required>
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $prenda->descripcion }}</textarea>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ $prenda->precio }}" required>
        </div>

        <!-- Stock -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $prenda->stock }}" required>
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                <option value="" disabled>Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $prenda->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Subcategoría -->
        <div class="mb-3">
            <label for="id_subcategoria" class="form-label">Subcategoría</label>
            <select class="form-select" id="id_subcategoria" name="id_subcategoria" required>
                <option value="" disabled>Seleccione una subcategoría</option>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}" {{ $subcategoria->id == $prenda->id_subcategoria ? 'selected' : '' }}>
                        {{ $subcategoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Imagen actual -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            <p class="mt-2">Imagen actual:</p>
            <img src="{{ asset($prenda->imagen->imagen) }}" alt="Imagen actual" class="img-fluid" style="max-width: 200px;">
        </div>


        <!-- Botón de Enviar -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>

        <!-- Mensajes de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('editProductForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevenir envío del formulario inmediato

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los cambios serán guardados y no se podrán revertir.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, guardar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Enviar el formulario si confirma
            }
        });
    });
</script>
@endsection
