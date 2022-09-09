<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinacija extends Model
{
    use HasFactory;

    protected $table = 'destinacije';

    protected $fillable = ['destinacija' , 'zemlja'];
}
