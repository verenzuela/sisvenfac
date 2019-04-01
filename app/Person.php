<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'person_type',
    	'name',
    	'document_type',
    	'document_number',
    	'address',
    	'phone_number',
    	'email',
    ]

    protected $guarded = [
    	
    ]
}
