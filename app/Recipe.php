<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'category_id', 'deleted'
    ];

    public function recipe() {
        return $this->belongsTo('App/Category', 'id', 'category_id');
    }

}
