<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', ['items' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.new', ['categories' => Category::all()->sortBy('name')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try{
            DB::transaction(function () use ($request) {
                Product::create([
                    'name' => $request->all()['nome'],
                    'photo' => $request->all()['foto'],
                    'category' => $request->all()['categoria'],
                    'price' => $request->all()['valor'],
                    'quantity' => $request->all()['quantidade'],
                ]);
            });

            return to_route('products.index')->with('success', 'O produto foi salvo com sucesso!');
        } catch (Throwable $e) {
            logger()->alert(
                sprintf('[Produtos]: Erro ao cadastrar o novo produto: %s', $e->getMessage()),
                $e->getTrace(),
            );

            return to_route('products.index')->with('error', 'Ocorreu um erro ao salvar o produto!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.view', ['item' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', ['item' => $product, 'categories' => Category::all()->sortBy('name')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try{
            DB::transaction(function () use ($request, $product) {
                $product->updateOrFail([
                    'name' => $request->all()['nome'],
                    'photo' => $request->all()['foto'],
                    'category' => $request->all()['categoria'],
                    'price' => $request->all()['valor'],
                    'quantity' => $request->all()['quantidade'],
                ]);
            });

            return to_route('products.index')->with('success', 'O produto foi alterado com sucesso!');
        } catch (Throwable $e) {
            logger()->alert(
                sprintf('[Produtos]: Erro ao alterar o produto: %s', $e->getMessage()),
                $e->getTrace(),
            );

            return to_route('products.index')->with('error', 'Ocorreu um erro ao alterar o produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->deleteOrFail();

        return to_route('products.index')->with('success', 'O produto foi removido com sucesso!');
    }
}
