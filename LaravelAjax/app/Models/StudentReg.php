<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReg extends Model
{
    use HasFactory;
    protected $table='student_regs';
    protected $fillable=[
        'name',
        'email',
    ];
}
