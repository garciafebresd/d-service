<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \App\Models\ServiceType serviceType
 * @property \Illuminate\Database\Eloquent\Collection CalendarService
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection RelServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property boolean status
 * @property string name
 * @property string descripcion
 * @property float price
 * @property string json_info
 * @property integer service_type_id
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'service';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'name',
        'descripcion',
        'price',
        'json_info',
        'service_type_id'
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
        'descripcion' => 'string',
        'price' => 'float',
        'json_info' => 'string',
        'service_type_id' => 'integer'
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
    public function serviceType()
    {
        return $this->belongsTo(\App\Models\ServiceType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function calendarServices()
    {
        return $this->hasMany(\App\Models\CalendarService::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function relServiceEmployees()
    {
        return $this->hasMany(\App\Models\RelServiceEmployee::class);
    }
}
