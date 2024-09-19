<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
