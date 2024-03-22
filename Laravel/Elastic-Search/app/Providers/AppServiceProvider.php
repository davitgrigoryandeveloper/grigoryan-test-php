<?php

namespace App\Providers;

use App\Repositories\ElasticsearchRepository;
use App\Repositories\EloquentSearchRepository;
use App\Repositories\Interfaces\SearchRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SearchRepositoryInterface::class, function ($app) {
            if (!config('services.search.enabled')) {
                return new EloquentSearchRepository();
            }
            return new ElasticsearchRepository(
                $app->make(Client::class)
            );
        });
        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
