<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Villageofficer extends Model
{
    use HasFactory;
    protected $table = 'village_officer';
    protected $fillable = [
        "nip","name","address","gender","email","telp","jabatan_id","photo"
    ];

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'village_officer_id', 'id');
    }


}
