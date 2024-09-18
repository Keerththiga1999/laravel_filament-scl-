<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }
    public function students()
    {
        return $this->belongsToMany(Subject::class);
    }
}
