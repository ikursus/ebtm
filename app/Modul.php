<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    # Tetapkan nama table yang perlu dihubungi
    protected $table = 'modul';

    # Fillable data
    protected $fillable = ['nama'];

    # Relationship antara table modul dan table aduan
    public function tableAduan()
    {
      // Perhubungan terjadi diantaran column ID pada table modul
      // Dan column modul dalam table aduan
      return $this->hasMany(Aduan::class, 'modul', 'id');
    }

}
