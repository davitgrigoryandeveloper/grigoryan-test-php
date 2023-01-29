<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;
use App\States\Post\PostState;

class Post extends Model
{
    use HasFactory;
    use HasStates;

    protected $casts = [
        'state' => PostState::class,
    ];
    protected $fillable = [
        'name', 'detail'
    ];
}
