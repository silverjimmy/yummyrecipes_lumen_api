<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'created_by', 'deleted'
    ];

    public function user() {
        return $this->belongsTo('App/User', 'id', 'created_by');
    }

}
