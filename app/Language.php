<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property string $iso_label
*/
class Language extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'iso_label'];
    
    
    
}
