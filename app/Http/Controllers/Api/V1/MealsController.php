<?php

namespace App\Http\Controllers\Api\V1;

use App\Meal;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMealsRequest;
use App\Http\Requests\Admin\UpdateMealsRequest;

use Unlu\Laravel\Api\QueryBuilder;
use App\Http\Controllers\Api\V1\TagQueryBuilder;
use Marcelgwerder\ApiHandler\Facades\ApiHandler;

use App\Http\Responses\API\MealAPI;


class MealsController extends Controller
{ 

    public function index(Request $request, Meal $meal)
    {


        $params = $request->all();
 
        $query = Meal::select();


        $language_id = isset($params['language_id']) ? $params['language_id'] : 2; 

        $meals = $query->where('language_id', $language_id); 

        // Search for a meal based on their id.
        if ($request->has('id')) {

            $meal->where('id', $request->input('id'));

            $queryBuilder = new QueryBuilder(new Meal, $request);

            return response()->json([
               'data' => $queryBuilder->build()->paginate()
            ]); 
        }

 

        if (isset($params['with'])) {
            $withParams = explode(',', $params['with']);
            $filter = array('tag', 'ingredient', 'category');

            foreach ($withParams as $param) {

                if (in_array($param, $filter, true)) {
                    $query->with($param);
                }
            }
        }

        if (isset($params['category'])) {
            if (is_numeric($params['category'])) {
                $query->where('category_id', $params['category']);
            } elseif ($params['category'] == 'NULL') {
                $query->whereNull('category_id');
            } elseif ($params['category'] == '!NULL') {
                $query->whereNotNull('category_id');
            }
        }

        if (isset($params['tag'])) {
            $tag = explode(',', $params['tag']);

            $query->join('meal_tag', 'meals.id', '=', 'meal_tag.meal_id');
            $query->whereIn('meal_tag.tag_id', $tag);

        }


        $limit = isset($params['limit']) ? $params['limit'] : 5;

        $meals = $query->paginate($limit);
    // Get the results and return them.

        return MealAPI::collection($meals);

            // return response()->json($meals);


 /*
        // return Meal::all();
      //  return response()->json(Meal::with('tag')->with('ingredient')->with('category')->get());
 
    $meal = $meal->newQuery();

    // Search for a meal based on their name.
    if ($request->has('title')) {
        $meal->where('title', $request->input('title'));
    }
 

    // Search for a meal based on their category.
    if ($request->has('category')) {
        $meal->where('category_id', $request->input('category'));
    }


    // Search for a meal based on their tag.
    if ($request->has('tag')) {
 
        $queryBuilder = Meal::with('tag')->get();    

        return response()->json([
               'data' => $queryBuilder
        ]);   
    }



    // Continue for all of the filters.


    $queryBuilder = new QueryBuilder(new Meal, $request);

    return response()->json([
       'data' => $queryBuilder->build()->paginate()
    ]); 

    // Get the results and return them.
    return $meal->get(); 


    */
 
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
