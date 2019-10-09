<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    protected $table = 'secure_product';

    public function findByUserId($user_id=null) {
        return DB::table($this->table)->where('user_id', $user_id)->get();
    }

    public function findByIdAndUserId($id=null,$user_id=null) {
        return DB::table($this->table)->where([
            ['id', '=', $id],
            ['user_id', '=', $user_id]
        ])->first();
    }

    public function deleteByIdAndUserId($id=null,$user_id=null) {
        return DB::table($this->table)->where([
            ['id', '=', $id],
            ['user_id', '=', $user_id]
        ])->delete();
    }
}
