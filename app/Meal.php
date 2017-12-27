<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Meal
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $category
 * @property string $language
*/
class Meal extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'category_id', 'language_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLanguageIdAttribute($input)
    {
        $this->attributes['language_id'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'meal_tag')->withTrashed();
    }
    
    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredient')->withTrashed();
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id')->withTrashed();
    }
    
}
