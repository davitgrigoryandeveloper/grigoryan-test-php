<?php

namespace App\Repositories;


use App\Models\Article;
use App\Repositories\Interfaces\SearchRepositoryInterface;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Http\Promise\Promise;
use Illuminate\Database\Eloquent\Collection;
use Elastic\Elasticsearch\Client;
use Illuminate\Support\Arr;

class ElasticsearchRepository implements SearchRepositoryInterface
{
    /** @var Client */
    private Client $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    public function search(string|null $query = null): Collection
    {
        $items = $this->searchOnElasticsearch($query);
        return $this->buildCollection($items);
    }

    private function searchOnElasticsearch(string|null $query = null): Elasticsearch|Promise
    {
        $query = $query ?? '';
        $model = new Article;

        return $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title^5', 'body', 'tags'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);
    }

    private function buildCollection(Elasticsearch|Promise $items): Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');
        return Article::findMany($ids)
            ->sortBy(function ($article) use ($ids) {
                return array_search($article->getKey(), $ids);
            });
    }
}
