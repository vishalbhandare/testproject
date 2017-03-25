<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionary';
    protected $fillable = ['textword', 'description'];
    
     /**
     * Get the comments for the blog post.
     */
    public function roles()
    {
        return $this->belongsToMany('Kodeine\Acl\Models\Eloquent\Role','dictionary_state_role');
    }
}
