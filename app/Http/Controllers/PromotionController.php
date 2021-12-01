<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
 * Class PromotionController
 * @package App\Http\Controllers
 */
class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::paginate();
        /* Para Categoria Caballeros */
        $categoriaC = DB::table('promotions') 
        ->whereIn('cat', ['Caballeros'])
        ->whereIn('status', ['1'])
        ->orderBy('id', 'desc')
        ->get();
        /* Para Categoria Damas */
        $categoriaD = DB::table('promotions') 
        ->whereIn('cat', ['Damas'])
        ->whereIn('status', ['1'])
        ->orderBy('id', 'desc')
        ->get();
        /* Para productos no publicados */
        $categoriaNP = DB::table('promotions') 
        ->whereIn('status', ['0'])
        ->orderBy('id', 'desc')
        ->get();
        /* print_r($categorias); exit; */

        return view('promotion.index', compact('promotions'))
            ->with(compact('categoriaC'))
            ->with(compact('categoriaD'))
            ->with(compact('categoriaNP'))
            ->with('i', (request()->input('page', 1) - 1) * $promotions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotion = new Promotion();
        return view('promotion.create', compact('promotion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Promotion::$rules);

        //$promotion = Promotion::create($request->all());

        /* Code added */
        $product = $request->all();

        if($imagen = $request->file('image')) {
            $rutaGuardarImg = 'promo/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $product['image'] = $imagenProducto;             
        }
        Promotion::create($product);
        /* End Code added */

        return redirect()->route('promotions.index')
            ->with('success', 'Genial, haz agragado una nueva promoción.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);

        return view('promotion.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);

        return view('promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        request()->validate(Promotion::$rules);

        //$promotion->update($request->all());
        $promotion1 = $request->all();
        /* Code added */
        if($imagen = $request->file('image')){
            $rutaGuardarImg = 'promo/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $promotion1['image'] = "$imagenProducto";
         }else{
            unset($promotion1['image']);
         }
         /* Promotion::update($promotion); */
         $promotion->update($promotion1);
        /* End Code added */

        return redirect()->route('promotions.index')
            ->with('success', 'Bien hecho, haz actualizado la promoción');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id)->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Haz eliminado una promoción');
    }
}
