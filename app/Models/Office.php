<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use SoftDeletes;


    /**
     * The attributes that aren't mass assignable.
     * Štiti od slanje dolje navedenih polja u tablice u bazi
     *
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * Save a new office
     *
     * @param array $data
     * @return Office
     *
     * */

     public function saveOffice($data)
     {
         return  $this->create($data);
     }

     /**
     * Update office
     *
     * @param array $data
     * @return void
     *
     * */

    public function updateOffice($data)
    {
        $this->update($data);
    }

    /**
     * Delete office
     *
     *
     * @return void
     *
     * */

    public function deleteOffice()
    {
        if($this->trashed()){
            $this->forceDelete();
            return;
        }

        $this->delete();

    }

}
