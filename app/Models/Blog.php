<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";
    protected $primaryKey = "blog_id";

    public function user ():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }
}
