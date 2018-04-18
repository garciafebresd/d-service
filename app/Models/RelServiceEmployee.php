<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RelServiceEmployee
 * @package App\Models
 * @version April 1, 2018, 5:00 am UTC
 *
 * @property \App\Models\Employee employee
 * @property \App\Models\Service service
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property integer service_id
 * @property integer employee_id
 * @property boolean status
 */
class RelServiceEmployee extends Model
{
    use SoftDeletes;

    public $table = 'rel_service_employee';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'service_id',
        'employee_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'employee_id' => 'integer',
        'status' => 'boolean'
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
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }
}
