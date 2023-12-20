<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    public function sewa()
    {
        return $this->belongsTo(Sewa::class, 'sewa_id', 'id');
    }
}
