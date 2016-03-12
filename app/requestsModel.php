<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class requestsModel extends Model {
    protected $fillable =
        [
          'postId',
            'studentId',
            'requestStatuss'
        ];
    protected $table = 'requests';
}
