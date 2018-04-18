<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SystemLog
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property integer status
 * @property string description
 * @property integer log_type_id
 * @property integer employee_id
 * @property integer client_id
 * @property integer user_id
 * @property string json_info
 * @property string ip_address
 * @property string uuid
 * @property string imei
 * @property decimal latitude
 * @property decimal longitude
 */
class SystemLog extends Model
{
    use SoftDeletes;

    public $table = 'system_log';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'description',
        'log_type_id',
        'employee_id',
        'client_id',
        'user_id',
        'json_info',
        'ip_address',
        'uuid',
        'imei',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'description' => 'string',
        'log_type_id' => 'integer',
        'employee_id' => 'integer',
        'client_id' => 'integer',
        'user_id' => 'integer',
        'json_info' => 'string',
        'ip_address' => 'string',
        'uuid' => 'string',
        'imei' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
