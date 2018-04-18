<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property boolean status
 * @property string type
 * @property string name
 * @property integer employee_id
 * @property integer client_id
 * @property string json_info
 */
class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notification';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'type',
        'name',
        'employee_id',
        'client_id',
        'json_info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'type' => 'string',
        'name' => 'string',
        'employee_id' => 'integer',
        'client_id' => 'integer',
        'json_info' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
