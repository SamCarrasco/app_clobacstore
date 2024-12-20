<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrendaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Inicio/home',[InicioController::class,'home'])->name('inicio.home');
Route::get('Inicio/contact',[InicioController::class,'contact'])->name('inicio.contact');
Route::get('Inicio/about',[InicioController::class,'about'])->name('inicio.about');
Route::get('Inicio/carrito',[InicioController::class,'carrito'])->name('inicio.carrito');
Route::get('Inicio/login',[InicioController::class,'login'])->name('inicio.login')->middleware('guest');
Route::get('Inicio/compra',[InicioController::class,'compra'])->name('inicio.compra');


/* Route::post('Inicio/login', function () {
    $credenciales = request()->only('email', 'password');
    $usuario = Usuario::authenticate($credenciales['email'], $credenciales['password']);

    if ($usuario) {
        return redirect('Inicio/home');
    }

    return redirect('Inicio/login');
});
 */

Route::post('Inicio/login', function () {
    $credenciales = request()->only('login', 'password'); 
    /* dd(request()->all()); */
    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();

        return redirect('Inicio/home');
    }

    return redirect('Inicio/login');
});
Route::get('Inicio/logout', function () {
    // Cerrar sesión
    Auth::logout(); // Elimina al usuario de la sesión
    
    // Invalidar la sesión
    request()->session()->invalidate(); // Borra la sesión actual

    // Regenerar el token CSRF (evita sesion fija)
    request()->session()->regenerateToken(); 

    // Redirige al usuario a la página de login u otra página
    return redirect('Inicio/login')->with('success', 'Has cerrado sesión');
});



//Contacto
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Ruta para mostrar el formulario de creación de prendas
Route::get('/prendas/create', [PrendaController::class, 'create'])->name('prenda.create');

// Ruta para guardar una nueva prenda
Route::post('/prendas', [PrendaController::class, 'store'])->name('prenda.store');


//obtener productos
Route::get('/productos', [PrendaController::class, 'getProducts'])->name('productos.get');

//editar productos
Route::get('/product/prendaedit/{id}', [PrendaController::class, 'edit'])->name('prenda.edit');
//confirmar edicion
Route::put('/product/update/{id}', [PrendaController::class, 'update'])->name('prenda.update');


//eliminar
Route::delete('/product/delete/{id}', [PrendaController::class, 'destroy'])->name('prenda.delete');
