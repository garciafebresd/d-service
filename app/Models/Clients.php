<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clients
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \App\Models\ClientType clientType
 * @property \Illuminate\Database\Eloquent\Collection CalendarService
 * @property \Illuminate\Database\Eloquent\Collection Chat
 * @property \Illuminate\Database\Eloquent\Collection RelClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection ServiceRating
 * @property boolean status
 * @property string dni
 * @property string name
 * @property string last_name
 * @property string legal_name
 * @property string phone_number
 * @property string email_address
 * @property string address
 * @property integer client_type_id
 */
class Clients extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'dni',
        'name',
        'last_name',
        'legal_name',
        'phone_number',
        'email_address',
        'address',
        'client_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'dni' => 'string',
        'name' => 'string',
        'last_name' => 'string',
        'legal_name' => 'string',
        'phone_number' => 'string',
        'email_address' => 'string',
        'address' => 'string',
        'client_type_id' => 'integer'
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
    public function clientType()
    {
        return $this->belongsTo(\App\Models\ClientType::class);
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
    public function relClientPaymentMethods()
    {
        return $this->hasMany(\App\Models\RelClientPaymentMethod::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function serviceRatings()
    {
        return $this->hasMany(\App\Models\ServiceRating::class);
    }
}
