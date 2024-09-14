<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table  = 'pictures';

    protected $guarded = [];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
