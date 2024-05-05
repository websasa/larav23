<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
