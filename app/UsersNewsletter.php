<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersNewsletter extends Model
{
    public $table = 'users_newsletter';
    public $timestamps = false;
    public $guarded = [];
}
