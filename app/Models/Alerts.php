<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alerts
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \App\Models\AlertType alertType
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property boolean status
 * @property float latitude
 * @property float longitude
 * @property integer alert_type_id
 * @property string json_info
 */
class Alerts extends Model
{
    use SoftDeletes;

    public $table = 'alerts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'latitude',
        'longitude',
        'alert_type_id',
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
        'latitude' => 'float',
        'longitude' => 'float',
        'alert_type_id' => 'integer',
        'json_info' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alertType()
    {
        return $this->belongsTo(\App\Models\AlertType::class);
    }
}
