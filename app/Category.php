<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property string $language
*/
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'language_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLanguageIdAttribute($input)
    {
        $this->attributes['language_id'] = $input ? $input : null;
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id')->withTrashed();
    }
    
}
