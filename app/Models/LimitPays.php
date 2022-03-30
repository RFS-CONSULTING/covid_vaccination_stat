<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LimitPays extends Model
{
    use HasFactory;

    protected $table = 'limit_pays';
    protected $primaryKey = 'ogc_fid';
    public $timestamps = false;
    protected $fillable = ['nom','chef_lieu','pop_totale','pers_vacci','nbre_sites','nbre_jours','pop_adulte'];


    public static function allAsGeojson()
    {
        $limits = DB::select("SELECT row_to_json(fc)
        FROM (SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
        FROM (SELECT 'Feature' As type
           ,ST_AsGeoJSON(ST_Transform((lg.wkb_geometry),4326),6)::jsonb As geometry
           ,row_to_json((SELECT l FROM (SELECT ogc_fid, nom) As l)) As properties
        FROM rdc_layer As lg) As f)  As fc;");
        return $limits;
    }
}
