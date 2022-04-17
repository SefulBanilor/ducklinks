<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_details extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_company';
    protected $fillable = [
        'tehnologii',
        'company_name',
        'an_start',
        'nr_angajati'
    ];

    protected $hidden = [
        'id_company_details',
        'id_company'

    ];
}
