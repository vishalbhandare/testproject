<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionary';
    protected $fillable = ['textword', 'description'];
}
