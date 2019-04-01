<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
    	'person_id',
    	'user_id',
    	'voucher_type',
    	'voucher_series',
    	'voucher_number',
    	'date_time',
    	'tax',
    	'total_sale',
    	'status',
    ]

    protected $guarded = [
    	
    ]

    public function PersonFk()
    {
        return $this->belongsTo('App\Person', 'id');
    }

    public function UserFk()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
