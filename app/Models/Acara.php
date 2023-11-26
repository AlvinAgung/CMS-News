<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acara extends Model
{
    use HasFactory;
    protected $table = 'acara';
    protected $fillable = [
        "title","time","content"
    ];

}
