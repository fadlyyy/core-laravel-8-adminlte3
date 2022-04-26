<?php

namespace App\Models;

use Modules\Roles\Entities\Role;

trait _UserRelations
{
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withDefault([
            'name' => null
        ]);
    }
}
