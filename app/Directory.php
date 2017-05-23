<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = 'directories';

    protected $fillable = ['name',
        'batch_and_dept',
        'campus',
        'present_address',
        'job_designation',
        'company_name',
        'company_address',
        'mobile',
        'email',
        'fb_id',
        'blood_group',
        'alt_mob_of_relative',
        'remarks',
        'directory_query',
        'avatar'];
}
