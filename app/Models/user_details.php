<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_details extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_user',
        'nume',
        'prenume',
        'varsta',
        'nr_tel',
        'studii_curente',
        'an',
        'last_job',
        'end_date',
        'start_date',
        'skills',
        'description'
    ];

    protected $hidden = [
        'id_user_details',
        'id_user'
    ];
}
