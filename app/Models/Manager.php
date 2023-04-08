<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function founder()
    {
        return $this->belongsTo(Founder::class);
    }

    public function managerLines()
    {
        return $this->hasMany(ManagerLine::class);
    }

}
