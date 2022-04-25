<?php

namespace App\Models;

trait _UserScopes
{
    public function scopeFilter($e, $q)
    {
        return $e->when($q, function ($ee, $q) {
            return $ee->where('name', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%");
        });
    }
}
