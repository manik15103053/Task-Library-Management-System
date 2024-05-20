<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interface\BlogInterface',
            'App\Repositories\BlogRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\CategoryInterface',
            'App\Repositories\CategoryRepositories',
        );

    }
}
