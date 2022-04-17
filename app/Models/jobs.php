<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class jobs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_company';
    protected $fillable = [
        'payment_level',
        'requested_skills',
        'optional_skills',
        'job_level',
        'description',
        'id_job'
    ];

    protected $hidden = [
        'id_company'
    ];
}
