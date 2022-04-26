<?php

namespace Modules\Roles\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Roles\Entities\_RoleScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use _RoleScopes;

    protected $guarded = ['id'];

    // protected static function newFactory()
    // {
    //     return \Modules\Roles\Database\factories\RoleFactory::new();
    // }
}
