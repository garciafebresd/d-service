<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClientType
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Client
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property string name
 * @property string description
 * @property boolean status
 */
class ClientType extends Model
{
    use SoftDeletes;

    public $table = 'client_type';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clients()
    {
        return $this->hasMany(\App\Models\Client::class);
    }
}
