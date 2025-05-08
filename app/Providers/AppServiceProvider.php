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
        /**
         * Directive @activeclass('pattern', 'classname')
         * - pattern: string atau array pattern untuk Request::is()
         * - classname: kelas CSS yang akan dipakai saat inactive (default: 'collapsed')
         * 
         * Contoh pemanggilan: @activeclass('jurusan*')
         * atau @activeclass(['jurusan*', 'casis*'], 'hidden')
         */
        Blade::directive('activeclass', function ($expression) {
            // Parse expression, bisa 1 atau 2 argumen
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
