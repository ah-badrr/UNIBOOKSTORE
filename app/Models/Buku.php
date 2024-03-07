<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Penerbit;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";

    public $timestamps = false;

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }
}
