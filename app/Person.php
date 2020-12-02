<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    public function education()
    {
        return $this->hasOne('App\Education', 'id', 'education_id');
    }

    public function job()
    {
        return $this->hasOne('App\Job', 'id', 'job_id');
    }

    public function economic()
    {
        return $this->hasOne('App\Economic', 'id', 'economic_conditions_id');
    }

    public function status()
    {
        return $this->hasOne('App\StatusCitizen', 'id', 'citizens_status_id');
    }

    public function eviden()
    {
        return $this->hasOne('App\Eviden', 'id', 'evidens_id');
    }
}