<?php

use Illuminate\Database\Eloquent\Model;

function updateStatus(Model $model, $id)
{
    $dt = $model::find($id);

    if ($dt->is_active == 1) {
        $dt->is_active = 0;
        $dt->save();
    } else {
        $dt->is_active = 1;
        $dt->save();
    }
}
