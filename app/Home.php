<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    protected $table = 'employees';
    protected $primaryKey = 'EmployeeID';
    public $timestamps  = false;

}
