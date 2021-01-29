<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * GETTER des works du tag.
     */
    public function works() {
      return $this->belongsToMany('App\Models\Work', 'works_has_tags');
    }
}
