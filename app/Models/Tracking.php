<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = "trackings";
    protected $fillable = ['id', 'positif', 'sembuh', 'meninggal', 'tanggal', 'id_rw'];
    public $timestamps = true;

    public function rw()
    {
        return $this->belongsTo('App\Models\Rw', 'id_rw');
    }

    public function tracking()
    {
        return $this->hasMany('App\Models\Tracking', 'id_tracking');
    }

}
