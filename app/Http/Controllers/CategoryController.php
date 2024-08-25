<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', ['items' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
            DB::transaction(function () use ($request) {
                Category::create([
                    'name' => $request->all()['nome'],
                    'icon' => $request->all()['icone'],
                    'description' => $request->all()['descricao'],
                ]);
            });

            return to_route('categories.index')->with('success', 'O categoria foi salva com sucesso!');
        } catch (Throwable $e) {
            logger()->alert(
                sprintf('[Categorias]: Erro ao salvar a categoria: %s', $e->getMessage()),
                $e->getTrace(),
            );

            return to_route('categories.index')->with('error', 'Ocorreu um erro ao salvar a categoria!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.view',['item' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',['item' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
            DB::transaction(function () use ($request, $category) {
                $category->updateOrFail([
                    'name' => $request->all()['nome'],
                    'icon' => $request->all()['icone'],
                    'description' => $request->all()['descricao'],
                ]);
            });

            return to_route('categories.index')->with('success', 'O categoria foi alterado com sucesso!');
        } catch (Throwable $e) {
            logger()->alert(
                sprintf('[Categorias]: Erro ao alterar a categoria: %s', $e->getMessage()),
                $e->getTrace(),
            );

            return to_route('categories.index')->with('error', 'Ocorreu um erro ao alterar a categoria!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->deleteOrFail();

        return to_route('categories.index')->with('success', 'O categoria foi removida com sucesso!');
    }
}
