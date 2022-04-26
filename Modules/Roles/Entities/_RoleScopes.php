<?php

namespace Modules\Roles\Entities;

trait _RoleScopes
{
    public function scopeActive($e)
    {
        return $e->where('is_active', 1);
    }
}
