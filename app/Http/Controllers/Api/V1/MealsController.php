<?php

namespace App\Http\Controllers\Api\V1;

use App\Meal;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMealsRequest;
use App\Http\Requests\Admin\UpdateMealsRequest;

use Unlu\Laravel\Api\QueryBuilder;
use App\Http\Controllers\Api\V1\TagQueryBuilder;


class MealsController extends Controller
{ 

    public function index(Request $request)
    {
        //return Meal::all();
        //return response()->json(Meal::with('tag')->with('ingredient')->with('category')->get());


        if (isset($request['tag'])) { 
            //return response()->json(Meal::with('tag')->with('ingredient')->with('category')->get());

            $queryBuilder = new TagQueryBuilder(new \App\Tag, $request);
            
            return response()->json([
              'data' => $queryBuilder->build()->paginate()
            ]); 

        } 

        $queryBuilder = new QueryBuilder(new Meal, $request);

        return response()->json([
           'data' => $queryBuilder->build()->paginate()
        ]); 

        return response()->json([
          'data' => $queryBuilder->build()->paginate()
        ]);
    }
 
 

    public function show($id)
    {
        return Meal::findOrFail($id);
    }

    public function update(UpdateMealsRequest $request, $id)
    {
        $meal = Meal::findOrFail($id);
        $meal->update($request->all());
        

        return $meal;
    }

    public function store(StoreMealsRequest $request)
    {
        $meal = Meal::create($request->all());
        

        return $meal;
    }

    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->delete();
        return '';
    }
}
