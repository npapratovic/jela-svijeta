<?php 

namespace App\Http\Controllers\Api\V1;

use App\Tag;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTagsRequest;
use App\Http\Requests\Admin\UpdateTagsRequest;

use Unlu\Laravel\Api\QueryBuilder;

class TagQueryBuilder extends QueryBuilder 
{
	public function filterByTag($query, $tag)
	{
       
       return DB::table('meal_tag')
                ->where('tag_id', $tag)
                ->get();
	}
}
