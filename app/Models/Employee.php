<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;


    /**
     * The attributes that aren't mass assignable.
     * Štiti od slanje dolje navedenih polja u tablice u bazi
     *
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

/*Relacije */


    public function reportsTo()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }


    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

}
