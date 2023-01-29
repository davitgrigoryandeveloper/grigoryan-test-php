<?php

namespace App\States\Post;

class Pending extends PostState
{
    protected static string $name = 'pending';

    public function color(): string
    {
        return 'yellow';
    }
}
