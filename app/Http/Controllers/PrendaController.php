<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prenda;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Imagenes;


class PrendaController extends Controller
{
    // Mostrar formulario de creación
    public function create()
    {
        $categorias = Categoria::where('estado', 'A')->get();
        $subcategorias = Subcategoria::where('estado', 'A')->get();

        return view('product.addproduct', compact('categorias', 'subcategorias'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:150',
        'descripcion' => 'nullable|string|max:250',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categoria,id',
        'id_subcategoria' => 'required|exists:subcategoria,id',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Subir imagen
    $imagenPath = null;
    if ($request->hasFile('imagen')) {
        // Generar un nombre único para la imagen
        $imagenName = time() . '_' . $request->file('imagen')->getClientOriginalName();
        
        // Mover la imagen al directorio public/img/product
        $imagenPath = $request->file('imagen')->move(public_path('img/product'), $imagenName);

        // Crear el registro de la imagen en la base de datos
        $imagen = Imagenes::create([
            'imagen' => 'img/product/' . $imagenName, // Guardar el path relativo
            'descripcion' => $request->input('descripcion', ''),
            'estado' => 'A',
        ]);
    }

    // Crear la prenda
    Prenda::create([
        'nombre' => $request->input('nombre'),
        'descripcion' => $request->input('descripcion'),
        'precio' => $request->input('precio'),
        'estado' => 'A',
        'stock' => $request->input('stock'),
        'id_categoria' => $request->input('id_categoria'),
        'id_subcategoria' => $request->input('id_subcategoria'),
        'id_imagen' => $imagen->id,
        'id_descuento' => null, // Por ahora se pasa como null
    ]);

    return redirect()->route('prenda.create')->with('success', 'Prenda creada exitosamente');
}


public function getProducts()
{
    $productos = Prenda::with('imagen')->where('estado', 'A')->take(6)->get();

    // Ajusta los datos del producto
    $productos = $productos->map(function ($producto) {
        return [
            'id' => $producto->id, // ID de la prenda
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'stock' => $producto->stock,
            'imagen_id' => $producto->imagen->id, // ID de la imagen
            'imagen_url' => asset($producto->imagen->imagen), // URL completa de la imagen
        ];
    });

    return response()->json($productos);
}

/* public function getProducts(Request $request)
{
    $perPage = 6;

    // Obtener los productos con paginación
    $productos = Prenda::with('imagen')
        ->where('estado', 'A')
        ->paginate($perPage);

    // Mapear los productos a un formato deseado
    $productos->data = $productos->map(function ($producto) {
        return [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'stock' => $producto->stock,
            'imagen_id' => $producto->imagen->id ?? null,
            'imagen_url' => $producto->imagen ? asset($producto->imagen->imagen) : null,
        ];
    });

    return response()->json($productos);
} */



public function destroy($id)
{
    $prenda = Prenda::findOrFail($id);

    // Eliminar la imagen asociada
    if ($prenda->imagen) {
        $imagenPath = public_path($prenda->imagen->imagen);
        if (file_exists($imagenPath)) {
            unlink($imagenPath); // Elimina el archivo del servidor
        }
        $prenda->imagen->delete(); // Elimina el registro en la tabla de imágenes
    }

    // Eliminar la prenda
    $prenda->delete();

    return response()->json(['message' => 'Prenda eliminada correctamente.']);
}

public function edit($id)
{
    $prenda = Prenda::with(['imagen', 'categoria', 'subcategoria'])->findOrFail($id);
    $categorias = Categoria::where('estado', 'A')->get();
    $subcategorias = Subcategoria::where('estado', 'A')->get();

    return view('product.prendaedit', compact('prenda', 'categorias', 'subcategorias'));
}

public function update(Request $request, $id)
{
    // Validar los datos recibidos
    $request->validate([
        'nombre' => 'required|string|max:150',
        'descripcion' => 'nullable|string|max:250',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categoria,id',
        'id_subcategoria' => 'required|exists:subcategoria,id',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Encontrar la prenda a editar
    $prenda = Prenda::findOrFail($id);

    // Actualizar los campos básicos
    $prenda->nombre = $request->input('nombre');
    $prenda->descripcion = $request->input('descripcion');
    $prenda->precio = $request->input('precio');
    $prenda->stock = $request->input('stock');
    $prenda->id_categoria = $request->input('id_categoria');
    $prenda->id_subcategoria = $request->input('id_subcategoria');

    // Manejo de la imagen
    if ($request->hasFile('imagen')) {
        // Eliminar la imagen anterior si existe
        if ($prenda->imagen && file_exists(public_path($prenda->imagen->imagen))) {
            unlink(public_path($prenda->imagen->imagen));
        }

        // Guardar la nueva imagen con un nombre único
        $imagen = $request->file('imagen');
        $imagenName = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagenPath = $imagen->move(public_path('img/product'), $imagenName);

        // Actualizar el path de la imagen en la base de datos
        $prenda->imagen->update([
            'imagen' => 'img/product/' . $imagenName,
        ]);
    }

    // Guardar los cambios en la base de datos
    $prenda->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('prenda.edit', $id)->with('success', 'Prenda actualizada exitosamente.');
}



}
