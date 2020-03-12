<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Todo extends Eloquent
{
    protected $guarded = [];

    public $timestamps = false;
}