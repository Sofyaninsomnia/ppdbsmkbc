<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
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
