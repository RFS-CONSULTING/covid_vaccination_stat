<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitesVaccination extends Model
{
    use HasFactory;
    protected $table = 'sites_vaccinations';
    public $timestamps = false;
    protected $fillable = ['nom','adresse','horaire','contact','provinces_ogc_fid'];
}
