<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {
    protected $table = "tbl_users";
    protected $primaryKey = "user_id";
    protected $fillable = ["user_name", "user_email", "user_password", "user_phone", "gender", "date_of_birth"];
}
