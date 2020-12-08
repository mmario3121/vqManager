<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function list() {
        return $this->belongsTo(Lists::class, 'list_id');
    }
}
