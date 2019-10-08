<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class UserModel extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'secure_user';

    public function findByEmail($email=null) {
        return DB::table($this->table)->where('email', $email)->first();
    }
}
