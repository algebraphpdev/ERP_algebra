<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
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
     * Save a new blog post
     *
     * @param array $data
     * @return Posts
     *
     * */

     public function savePost($data)
     {
         return  $this->create($data);
     }

     /**
     * Update blog post
     *
     * @param array $data
     * @return void
     *
     * */

    public function updatePost($data)
    {
        $this->update($data);
    }

    /**
     * Delete blog post
     *
     *
     * @return void
     *
     * */

    public function deletePost()
    {
        if($this->trashed()){
            $this->forceDelete();
            return;
        }

        $this->delete();

    }



}
