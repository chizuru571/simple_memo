<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'memo' => 'required|max:100',
    );
}
