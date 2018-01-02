<?php


namespace App\Http\Responses\API;


use Illuminate\Http\Resources\Json\Resource;

class MealAPI extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */

    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->deleted_at > 0 ? 'deleted' : 'created',
            'category' => [
                'id' => $this->category->id,
                'title' => $this->category->title,
                'slug' => $this->category->slug
            ],

            'tags' => [
                $this->tags
            ],

            'ingredients' => [
                $this->ingredients
            ]
        ];

    }
}
