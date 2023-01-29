<?php

namespace App\States\Post;

class Published extends PostState
{
    protected static string $name = 'published';

    public function color(): string
    {
        return 'green';
    }
}
