<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsRole extends Model
{
    public function users()
    {
        return $this->belongsToMany(CmsUser::class, 'cms_role_user', 'cms_role_id', 'cms_user_id');
    }
}
