<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=['description','name'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

}
