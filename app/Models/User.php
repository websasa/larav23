<?php
namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model

{
    public function cmsUser()
    {
        return $this->hasOne(CmsUser::class);
    }
}