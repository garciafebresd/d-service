<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \App\Models\EmployeeType employeeType
 * @property \Illuminate\Database\Eloquent\Collection CalendarService
 * @property \Illuminate\Database\Eloquent\Collection Chat
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection RelServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection RoutePoint
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property boolean status
 * @property string name
 * @property string last_name
 * @property string password
 * @property string email
 * @property string json_permission
 * @property string dni_number
 * @property integer employee_type_id
 * @property integer company_id
 * @property string json_info
 */
class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employee';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'name',
        'last_name',
        'password',
        'email',
        'json_permission',
        'dni_number',
        'employee_type_id',
        'company_id',
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
        'name' => 'string',
        'last_name' => 'string',
        'password' => 'string',
        'email' => 'string',
        'json_permission' => 'string',
        'dni_number' => 'string',
        'employee_type_id' => 'integer',
        'company_id' => 'integer',
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
    public function employeeType()
    {
        return $this->belongsTo(\App\Models\EmployeeType::class);
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
    public function chats()
    {
        return $this->hasMany(\App\Models\Chat::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function relServiceEmployees()
    {
        return $this->hasMany(\App\Models\RelServiceEmployee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function routePoints()
    {
        return $this->hasMany(\App\Models\RoutePoint::class);
    }
}
