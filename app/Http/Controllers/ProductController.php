<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        /* Para Categoria Random */
        $productsR = DB::table('products') 
        ->whereIn('status', ['1'])
        ->inRandomOrder()
        ->get();
        /* Para Categoria No publicados */
        $productsNP = DB::table('products') 
        ->whereIn('status', ['0'])
        ->get();

        return view('product.index', compact('products'))
            ->with(compact('productsR'))
            ->with(compact('productsNP'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Product::$rules);
        
        /* $product = Product::create($request->all()); */
        
        /* Code added */
        $product = $request->all();

        if($imagen = $request->file('image')) {
            $rutaGuardarImg = 'image/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $product['image'] = $imagenProducto;             
        }
        Product::create($product);
        /* End Code added */
        
        return redirect()->route('products.index')
            ->with('success', 'Genial, haz agregado un nuevo producto.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        //$product->update($request->all());
        $product1= $request->all();
        /* Code added */
        if($imagen = $request->file('image')){
            $rutaGuardarImg = 'image/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $product1['image'] = "$imagenProducto";
         }else{
            unset($product1['image']);
         }
         /* Product::update($product); */
         $product->update($product1);
        /* End Code added */

        return redirect()->route('products.index')
            ->with('success', 'Bien hecho, el producto se actualizó.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Haz eliminado un producto.');
    }
}
