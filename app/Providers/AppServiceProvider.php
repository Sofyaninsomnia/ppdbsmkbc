<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ImageManager::class, function () {
            return new ImageManager(new Driver());
        });
    }

    public function boot()
    {
        Blade::directive('activeclass', function ($expression) {

            return "<?php
                \$__args = array_map('trim', explode(',', {$expression}, 2));
                \$__pattern = trim(\$__args[0], \" '\\\"\");
                \$__class = isset(\$__args[1])
                    ? trim(\$__args[1], \" '\\\"\")
                    : 'collapsed';
                echo Request::is(\$__pattern) ? '' : \$__class;
            ?>";
        });
    }
}
