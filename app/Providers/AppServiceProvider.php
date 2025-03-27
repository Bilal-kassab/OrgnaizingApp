<?php

namespace App\Providers;

use App\Interfaces\TaskDetailRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskDetailRepository;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class,TaskRepository::class);
        $this->app->bind(TaskDetailRepositoryInterface::class, TaskDetailRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
