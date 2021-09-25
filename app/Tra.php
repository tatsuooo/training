<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tra extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'menu' => 'required',
        'set' => 'required',
        'times' => 'required',
        'weight' => 'required',
        'body' => 'required',
    );
}
