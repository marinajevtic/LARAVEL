<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planer extends Model
{
    use HasFactory;

    protected $table = 'planovi';

    protected $fillable = ['opis', 'doba', 'cena', 'destinacija_id'];
}
