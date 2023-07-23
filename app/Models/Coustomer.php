<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coustomer extends Model
{
    use HasFactory;
    protected $fillable =['cous_name','cous_phone','cous_email'];
}
