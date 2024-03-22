<?php

namespace App\Repositories;


use App\Models\Article;
use App\Repositories\Interfaces\SearchRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentSearchRepository implements SearchRepositoryInterface
{
    public function search(string|null $query = null): Collection
    {
        return Article::query()
            ->where('body', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}
