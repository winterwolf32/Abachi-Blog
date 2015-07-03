<?php

namespace Laasri\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Post\PostRepositoryInterface::class, Post\FilePostRepository::class);
    }
}