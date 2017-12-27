<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLanguagesRequest;
use App\Http\Requests\Admin\UpdateLanguagesRequest;

class LanguagesController extends Controller
{
    /**
     * Display a listing of Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('language_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('language_delete')) {
                return abort(401);
            }
            $languages = Language::onlyTrashed()->get();
        } else {
            $languages = Language::all();
        }

        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating new Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('language_create')) {
            return abort(401);
        }
        return view('admin.languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param  \App\Http\Requests\StoreLanguagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguagesRequest $request)
    {
        if (! Gate::allows('language_create')) {
            return abort(401);
        }
        $language = Language::create($request->all());



        return redirect()->route('admin.languages.index');
    }


    /**
     * Show the form for editing Language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('language_edit')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);

        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update Language in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguagesRequest $request, $id)
    {
        if (! Gate::allows('language_edit')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);
        $language->update($request->all());



        return redirect()->route('admin.languages.index');
    }


    /**
     * Display Language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('language_view')) {
            return abort(401);
        }
        $categories = \App\Category::where('language_id', $id)->get();$tags = \App\Tag::where('language_id', $id)->get();$ingredients = \App\Ingredient::where('language_id', $id)->get();$meals = \App\Meal::where('language_id', $id)->get();

        $language = Language::findOrFail($id);

        return view('admin.languages.show', compact('language', 'categories', 'tags', 'ingredients', 'meals'));
    }


    /**
     * Remove Language from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('language_delete')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('admin.languages.index');
    }

    /**
     * Delete all selected Language at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('language_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Language::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Language from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('language_delete')) {
            return abort(401);
        }
        $language = Language::onlyTrashed()->findOrFail($id);
        $language->restore();

        return redirect()->route('admin.languages.index');
    }

    /**
     * Permanently delete Language from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('language_delete')) {
            return abort(401);
        }
        $language = Language::onlyTrashed()->findOrFail($id);
        $language->forceDelete();

        return redirect()->route('admin.languages.index');
    }
}
