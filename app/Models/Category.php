<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
   
    protected $fillable=[
        'name',
       
    ];
    public function article():HasMany{
        return $this->hasMany(Article::class);
    }
}