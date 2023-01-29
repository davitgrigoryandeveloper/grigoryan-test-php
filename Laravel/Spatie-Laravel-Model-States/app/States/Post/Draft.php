<?php

namespace App\States\Post;

class Draft extends PostState
{
    protected static string $name = 'draft';

    public function color(): string
    {
        return 'grey';
    }
}
