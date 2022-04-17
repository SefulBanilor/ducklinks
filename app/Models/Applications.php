<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_job',
        'id_user',
        'status',
        'like'
    ];

    protected $hidden = [
        'id_application'
    ];
}
