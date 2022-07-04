<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'data',
        'tipo',
        'user_id'
    ];
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}

