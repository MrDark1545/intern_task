<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useremail extends Model
{
    protected $table = 'usersemail';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
    ];
}
