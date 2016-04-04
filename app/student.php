<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class student extends Model {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $primaryKey = "studentId";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstName','studentId','lastName','campus', 'confirmation_code','password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function requests()
    {
        return $this->hasMany('App\requestsModel', 'studentId');
    }

    //relationship between user and post table
    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }

}
