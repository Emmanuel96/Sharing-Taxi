<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class requestsModel extends Model {
    protected $table = 'requests';

    protected $fillable =
        [
          'postId',
            'studentId',
            'requestStatus',
            'destination'
        ];
}
