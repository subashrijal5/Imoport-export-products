<?php

namespace App\Providers;

use App\Helpers\FunctionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\ViewServiceProvider as BaseViewServiceProvider;

class ViewServiceProvider extends BaseViewServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['clients.create'],
            'App\Http\View\Composers\ClientComposer'
        );
    }
}
