<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasUlids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = ['id'];
    /*
     * Relasi tabel
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
