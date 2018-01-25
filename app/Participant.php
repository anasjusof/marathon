<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'reg_code', 
        'main_category',
        'competition_name',
        'first_name',
        'name_on_bib',
        'address1',
        'address2',
        'postcode',
        'city',
        'state',
        'country_name',
        'nationality_name',
        'email',
        'mobile_no',
        'nric_passport',
        'date_of_birth',
        'age_as_event_year',
        'apparel_size',
        'shirt_color',
        'emergency_name',
        'emergency_contact',
        'emergency_relation',
        'blood_type',
        'gender',
        'collection_status',
        'collection_name',
        'collection_ic',
        'collection_no'
    ];
}
