<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SurveyContact
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property integer survey_id
 * @property string contact_info
 * @property string|\Carbon\Carbon update_at
 * @property string json_info
 */
class SurveyContact extends Model
{
    use SoftDeletes;

    public $table = 'survey_contact';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'survey_id',
        'contact_info',
        'update_at',
        'json_info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'survey_id' => 'integer',
        'contact_info' => 'string',
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
