<?php

namespace App\Models;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'masyarakat';
    protected $guarded =[];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);

    }

}
