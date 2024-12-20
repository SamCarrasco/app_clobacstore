@extends('layouts.app')
@section('title','Home')
@section('css')
<link rel="stylesheet" href="{{ asset('css/styleshop.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Barra lateral de categorías -->
        <aside class="col-12 col-md-3 mb-4">
            <div class="list-group">
                <h5 class="mb-3 text-center">Categorías</h5>

                <!-- Categorías con submenús -->
                <div class="accordion" id="categoriesAccordion">
                    <!-- Categoría Mujer -->
                    <div class="accordion-item">
                        <h6 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoryWomen" aria-expanded="false">
                                Mujer
                            </button>
                        </h6>
                        <div id="categoryWomen" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#">Poleras</a></li>
                                <li class="list-group-item"><a href="#">Vestidos</a></li>
                                <li class="list-group-item"><a href="#">Shorts</a></li>
                                <li class="list-group-item"><a href="#">Pantalones</a></li>
                                <li class="list-group-item"><a href="#">Blusas</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Categoría Hombre -->
                    <div class="accordion-item">
                        <h6 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoryMen" aria-expanded="false">
                                Hombre
                            </button>
                        </h6>
                        <div id="categoryMen" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#">Poleras</a></li>
                                <li class="list-group-item"><a href="#">Shorts</a></li>
                                <li class="list-group-item"><a href="#">Pantalones</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Categoría Niño -->
                    <div class="accordion-item">
                        <h6 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoryKids" aria-expanded="false">
                                Niño
                            </button>
                        </h6>
                        <div id="categoryKids" class="accordion-collapse collapse" data-bs-parent="#categoriesAccordion">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#">Poleras</a></li>
                                <li class="list-group-item"><a href="#">Shorts</a></li>
                                <li class="list-group-item"><a href="#">Pantalones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Filtro de precios -->
                <div class="mt-4">
                    <h6 class="mb-2">Ordenar por</h6>
                    <select class="form-select">
                        <option value="lowToHigh">Precio: Menor a Mayor</option>
                        <option value="discount">En Descuento</option>
                    </select>
                </div>
            </div>
        </aside>

        <!-- Sección de productos -->
        <section class="col-12 col-md-9">
            <h2 class="mb-4 text-center">Nuevos Lanzamientos</h2>
            <div id="product-container" class="row">
                <!-- Aquí se cargarán los productos dinámicamente -->
            </div>
        </section>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function loadProducts() {
            fetch("{{ route('productos.get') }}")
                .then(response => response.json())
                .then(data => {
                    const productContainer = document.getElementById('product-container');
                    productContainer.innerHTML = '';
    
                    data.forEach(product => {
                        const isAuthenticated = @json(auth()->check());
    
                        const buttons = isAuthenticated
                            ? `
                                <button class="btn btn-warning btn-edit" data-id="${product.id}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-danger btn-delete" data-id="${product.id}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            `
                            : `
                                <button class="btn btn-dark btn-buy">
                                    <i class="bi bi-bag"></i>
                                </button>
                            `;
    
                        const productHTML = `
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="card product-card">
                                    <div class="product-overlay">
                                        ${buttons}
                                    </div>
                                    <img src="${product.imagen_url}" class="card-img-top" alt="${product.nombre}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">${product.nombre}</h5>
                                        <p class="card-text">Bs.${product.precio}</p>
                                    </div>
                                </div>
                            </div>`;
                        productContainer.insertAdjacentHTML('beforeend', productHTML);
                    });
    
                    attachEventListeners();
                })
                .catch(error => console.error('Error al cargar los productos:', error));
        }
    
        function attachEventListeners() {
            // Botones de editar
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    window.location.href = `/product/prendaedit/${productId}`;
                });
            });
    
            // Botones de eliminar
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "No podrás revertir esta acción.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteProduct(productId);
                        }
                    });
                });
            });
        }
    
        function deleteProduct(productId) {
            fetch(`/product/delete/${productId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        Swal.fire('Eliminado', data.message, 'success');
                        loadProducts();
                    }
                })
                .catch(error => console.error('Error al eliminar el producto:', error));
        }
    
        loadProducts();
    });
    </script>
    
@endsection