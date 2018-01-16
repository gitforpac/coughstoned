<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $table = 'packages';

    protected $dates = ['deleted_at'];

    public function schedules()
	{
	    return $this->hasMany('App\Schedule')->orderBy('date');
	}

	public function includeds()
	{
	    return $this->hasMany('App\Includeds');
	}

	public function contents()
    {
        return $this->hasMany('App\Content');
    }

    public function videos()
    {
    	return $this->hasMany('App\PackageVideos');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking')->orderBy('schedule_id','desc');
    }


}


