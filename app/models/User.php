<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $guarded = [];

    public $timestamps = false;

    public static function auth()
    {

    }
}