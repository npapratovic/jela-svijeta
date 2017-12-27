<?php

namespace App\Http\Controllers\Admin;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIngredientsRequest;
use App\Http\Requests\Admin\UpdateIngredientsRequest;

class IngredientsController extends Controller
{
    /**
     * Display a listing of Ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ingredient_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('ingredient_delete')) {
                return abort(401);
            }
            $ingredients = Ingredient::onlyTrashed()->get();
        } else {
            $ingredients = Ingredient::all();
        }

        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating new Ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ingredient_create')) {
            return abort(401);
        }
        
        $languages = \App\Language::get()->pluck('iso_label', 'id')->prepend(trans('blue_factory.qa_please_select'), '');

        return view('admin.ingredients.create', compact('languages'));
    }

    /**
     * Store a newly created Ingredient in storage.
     *
     * @param  \App\Http\Requests\StoreIngredientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredientsRequest $request)
    {
        if (! Gate::allows('ingredient_create')) {
            return abort(401);
        }
        $ingredient = Ingredient::create($request->all());



        return redirect()->route('admin.ingredients.index');
    }


    /**
     * Show the form for editing Ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ingredient_edit')) {
            return abort(401);
        }
        
        $languages = \App\Language::get()->pluck('iso_label', 'id')->prepend(trans('blue_factory.qa_please_select'), '');

        $ingredient = Ingredient::findOrFail($id);

        return view('admin.ingredients.edit', compact('ingredient', 'languages'));
    }

    /**
     * Update Ingredient in storage.
     *
     * @param  \App\Http\Requests\UpdateIngredientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngredientsRequest $request, $id)
    {
        if (! Gate::allows('ingredient_edit')) {
            return abort(401);
        }
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());



        return redirect()->route('admin.ingredients.index');
    }


    /**
     * Display Ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ingredient_view')) {
            return abort(401);
        }
        $ingredient = Ingredient::findOrFail($id);

        return view('admin.ingredients.show', compact('ingredient'));
    }


    /**
     * Remove Ingredient from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ingredient_delete')) {
            return abort(401);
        }
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index');
    }

    /**
     * Delete all selected Ingredient at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ingredient_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ingredient::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Ingredient from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ingredient_delete')) {
            return abort(401);
        }
        $ingredient = Ingredient::onlyTrashed()->findOrFail($id);
        $ingredient->restore();

        return redirect()->route('admin.ingredients.index');
    }

    /**
     * Permanently delete Ingredient from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ingredient_delete')) {
            return abort(401);
        }
        $ingredient = Ingredient::onlyTrashed()->findOrFail($id);
        $ingredient->forceDelete();

        return redirect()->route('admin.ingredients.index');
    }
}
