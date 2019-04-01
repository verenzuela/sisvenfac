<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'category_id',
    	'code',
    	'name',
    	'stock',
    	'description',
    	'image',
    	'status',
    ]

    protected $guarded = [
    	
    ]

    public function CategoryFk()
    {
        return $this->belongsTo('App\Category', 'id');
    }
}
