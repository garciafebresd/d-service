<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoutePoints
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \App\Models\CalendarService calendarService
 * @property \App\Models\Employee employee
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property string|\Carbon\Carbon date_route
 * @property integer calendar_service_id
 * @property integer employee_id
 * @property string gps_data
 * @property string gps_status
 */
class RoutePoints extends Model
{
    use SoftDeletes;

    public $table = 'route_points';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'date_route',
        'calendar_service_id',
        'employee_id',
        'gps_data',
        'gps_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'calendar_service_id' => 'integer',
        'employee_id' => 'integer',
        'gps_data' => 'string',
        'gps_status' => 'string'
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
    public function calendarService()
    {
        return $this->belongsTo(\App\Models\CalendarService::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }
}
