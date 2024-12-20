<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /* Devolver las paginas de inicio */
    public function home(){
        return view('Inicio.home');
    }
    public function contact(){
        return view('Inicio.contact');
    }
    public function about(){
        return view('Inicio.about');
    }
    public function carrito(){
        return view('Inicio.carrito');
    }
    public function login(){
        return view('Inicio.login');
    }
    public function compra(){
        return view('Inicio.compra');
    }
}
