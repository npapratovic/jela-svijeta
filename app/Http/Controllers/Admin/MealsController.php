<?php

namespace App\Http\Controllers\Admin;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMealsRequest;
use App\Http\Requests\Admin\UpdateMealsRequest;

class MealsController extends Controller
{
    /**
     * Display a listing of Meal.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('meal_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('meal_delete')) {
                return abort(401);
            }
            $meals = Meal::onlyTrashed()->get();
        } else {
            $meals = Meal::all();
        }

        return view('admin.meals.index', compact('meals'));
    }

    /**
     * Show the form for creating new Meal.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('meal_create')) {
            return abort(401);
        }
        
        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('blue_factory.qa_please_select'), '');
        $tags = \App\Tag::get()->pluck('title', 'id');
        $ingredients = \App\Ingredient::get()->pluck('title', 'id');

        $languages = \App\Language::get()->pluck('iso_label', 'id')->prepend(trans('blue_factory.qa_please_select'), '');

        return view('admin.meals.create', compact('categories', 'tags', 'ingredients', 'languages'));
    }

    /**
     * Store a newly created Meal in storage.
     *
     * @param  \App\Http\Requests\StoreMealsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealsRequest $request)
    {
        if (! Gate::allows('meal_create')) {
            return abort(401);
        }
        $meal = Meal::create($request->all());
        $meal->tag()->sync(array_filter((array)$request->input('tag')));
        $meal->ingredient()->sync(array_filter((array)$request->input('ingredient')));



        return redirect()->route('admin.meals.index');
    }


    /**
     * Show the form for editing Meal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('meal_edit')) {
            return abort(401);
        }
        
        $categories = \App\Category::get()->pluck('title', 'id')->prepend(trans('blue_factory.qa_please_select'), '');
        $tags = \App\Tag::get()->pluck('title', 'id');
        $ingredients = \App\Ingredient::get()->pluck('title', 'id');

        $languages = \App\Language::get()->pluck('iso_label', 'id')->prepend(trans('blue_factory.qa_please_select'), '');

        $meal = Meal::findOrFail($id);

        return view('admin.meals.edit', compact('meal', 'categories', 'tags', 'ingredients', 'languages'));
    }

    /**
     * Update Meal in storage.
     *
     * @param  \App\Http\Requests\UpdateMealsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealsRequest $request, $id)
    {
        if (! Gate::allows('meal_edit')) {
            return abort(401);
        }
        $meal = Meal::findOrFail($id);
        $meal->update($request->all());
        $meal->tag()->sync(array_filter((array)$request->input('tag')));
        $meal->ingredient()->sync(array_filter((array)$request->input('ingredient')));



        return redirect()->route('admin.meals.index');
    }


    /**
     * Display Meal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('meal_view')) {
            return abort(401);
        }
        $meal = Meal::findOrFail($id);

        return view('admin.meals.show', compact('meal'));
    }


    /**
     * Remove Meal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('meal_delete')) {
            return abort(401);
        }
        $meal = Meal::findOrFail($id);
        $meal->delete();

        return redirect()->route('admin.meals.index');
    }

    /**
     * Delete all selected Meal at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('meal_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Meal::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Meal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('meal_delete')) {
            return abort(401);
        }
        $meal = Meal::onlyTrashed()->findOrFail($id);
        $meal->restore();

        return redirect()->route('admin.meals.index');
    }

    /**
     * Permanently delete Meal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('meal_delete')) {
            return abort(401);
        }
        $meal = Meal::onlyTrashed()->findOrFail($id);
        $meal->forceDelete();

        return redirect()->route('admin.meals.index');
    }
}
