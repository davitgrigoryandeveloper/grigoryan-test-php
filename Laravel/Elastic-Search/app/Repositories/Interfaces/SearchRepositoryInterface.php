<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface SearchRepositoryInterface
{
    public function search(string|null $query = null): Collection;
}
