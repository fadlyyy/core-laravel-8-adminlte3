<?php

namespace App\Traits;

trait MasterData
{
    public static function pesan_gagal($e)
    {
        return "File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage();
    }

    public static function list_pagings()
    {
        return [
            '1' => 1,
            '10' => 10,
            '25' => 25,
            '50' => 50,
            '100' => 100,
            '250' => 250,
            '500' => 500,
            '1000' => 1000
        ];
    }
}
