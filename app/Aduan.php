<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    # Tetapkan nama table yang perlu dihubungi
    protected $table = 'aduan';

    # Tetapkan data data yang dibenarkan masuk ke table aduan (mass assignment)
    protected $fillable = [
      'user_id',
      'masalah',
      'jawapan',
      'modul',
      'status',
      'tarikh_report',
      'tarikh_close'
    ];


    // Relationship one-to-one kepada table modul
    public function tableModul()
    {
      # Perhubungan SAH ini berlaku diantara column modul dalam table aduan
      # dengan column ID dalam table modul
      return $this->belongsTo(Modul::class, 'modul', 'id');
    }


}
