<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function reporting()
    {
        return $this->belongsTo(Employee::class,'reportsTo','employeeNumber');
    }
    public function office()
    {
        return $this->belongsTo(Office::class,'officeCode','officeCode');
    }
}
