<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashBoard extends Model
{
    use HasFactory;
    protected $table = 'dashboards' ;
    protected $fillable = ['fullname','email','phonenumbers','file'];
}