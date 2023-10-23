<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscribe extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function offre(){
        return $this->belongsTo(Offre::class);
    }
}
