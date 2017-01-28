<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'role', 'name', 'cv_path', 'county', 'categories'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function userType(){
        return $this->role;
    }

    /**
     * A user may create many jobs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    /**
     * Get the active jobs, if the user has any
     *
     * @return mixed
     */
    public function activeJobs()
    {
        return $this->jobs()->where('latest_application_date', '>=', Carbon::today()->toDateString());
    }

    /**
     *
     * Check if user has an uploaded CV already.
     *
     * @return bool
     */
    public function hasCV()
    {
        return $this->cv_path ? true : false;
    }
}
