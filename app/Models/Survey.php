<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Survey
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property string questions
 * @property boolean status
 * @property string description
 * @property integer employee_id
 * @property integer client_id
 * @property string json_info
 */
class Survey extends Model
{
    use SoftDeletes;

    public $table = 'survey';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'questions',
        'status',
        'description',
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
        'questions' => 'string',
        'status' => 'boolean',
        'description' => 'string',
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
