<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'person_id',
    	'voucher_type',
    	'voucher_series',
    	'voucher_number',
    	'date_time',
    	'tax',
    	'status',
    ]

    protected $guarded = [
    	
    ]

    public function PersonFk()
    {
        return $this->belongsTo('App\Person', 'id');
    }
}
