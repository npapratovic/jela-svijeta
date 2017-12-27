<?php

namespace App\Http\Controllers\Api\V1;

use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIngredientsRequest;
use App\Http\Requests\Admin\UpdateIngredientsRequest;

use Unlu\Laravel\Api\QueryBuilder;


class IngredientsController extends Controller
{
    public function index()
    {
        return Ingredient::all();
    }

    public function show($id)
    {
        return Ingredient::findOrFail($id);
    }

    public function update(UpdateIngredientsRequest $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());
        

        return $ingredient;
    }

    public function store(StoreIngredientsRequest $request)
    {
        $ingredient = Ingredient::create($request->all());
        

        return $ingredient;
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return '';
    }
}
