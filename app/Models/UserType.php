<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserType
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property boolean status
 * @property string name
 * @property string description
 */
class UserType extends Model
{
    use SoftDeletes;

    public $table = 'user_type';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
