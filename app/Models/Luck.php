<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Luck extends Model
{
    protected $table = "lucks";
    protected $fillable = ['code', "status", "user_id"];
}
