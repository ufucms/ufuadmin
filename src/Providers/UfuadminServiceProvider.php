<?php

/*
 * This file is part of the ufucms/ufuadmin.
 *
 * (c) ufucms <ufucms@ufucms.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ufucms\Ufuadmin\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Ufucms\Ufuadmin\Http\Middleware\Bootstrap;
use Ufucms\Ufuadmin\Support\Facades\Ufuadmin;

class UfuadminServiceProvider extends ServiceProvider
{
    /**
     * The middleware aliases.
     *
     * @var array
     */
    protected $middlewareAliases = [
        'admin.bootstrap' => Bootstrap::class,
    ];

    /**
     * The middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            'admin.bootstrap',
        ],
    ];

    public function register()
    {
        $this->setupConfig();

        if ($this->app->runningInConsole()) {
            $this->publishes([dirname(__DIR__, 2).'/resources/assets' => public_path('vendor/ufuadmin')], 'ufuadmin-assets');
            $this->publishes([dirname(__DIR__, 2).'/samples' => public_path('admin')], 'ufuadmin-samples');

            $this->publishes([
                dirname(__DIR__, 2).'/config/ufuadmin.php' => config_path('ufuadmin.php'),
                dirname(__DIR__, 2).'/resources/config' => resource_path('config'),
            ], 'ufuadmin-config');

            $this->publishes([
                dirname(__DIR__, 2).'/resources/views/' => resource_path('views/vendor/ufuadmin'),
            ], 'ufuadmin-blades');

            $this->publishes([
                dirname(__DIR__, 2).'/routes/web.php' => base_path('routes/admin/web.php'),
                dirname(__DIR__, 2).'/routes/api.php' => base_path('routes/admin/api.php'),
            ], 'ufuadmin-routes');
        }
    }

    public function boot()
    {
        $this->loadViewsFrom(dirname(__DIR__, 2).'/resources/views', 'ufuadmin');

        $this->aliasMiddleware();
        $this->registerRoutes();
        $this->ensureHttps();
    }

    /**
     * Register admin routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => config('ufuadmin.routes.web.prefix'),
            'middleware' => config('ufuadmin.routes.web.middleware'),
        ], function () {
            $this->loadRoutesFrom(dirname(__DIR__, 2).'/routes/web.php');
            if (file_exists($webRoutes = base_path('routes/admin/web.php'))) {
                $this->loadRoutesFrom($webRoutes);
            }
        });

        Route::group([
            'prefix' => config('ufuadmin.routes.api.prefix'),
            'middleware' => config('ufuadmin.routes.api.middleware'),
        ], function () {
            $this->loadRoutesFrom(dirname(__DIR__, 2).'/routes/api.php');
            if (file_exists($apiRoutes = base_path('routes/admin/api.php'))) {
                $this->loadRoutesFrom($apiRoutes);
            }
        });
    }

    /**
     * Setup admin config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/ufuadmin.php', 'ufuadmin');

        config(Arr::dot(config('ufuadmin.auth', []), 'auth.'));
    }

    /**
     * Force setting https scheme if https enabled.
     *
     * @return void
     */
    protected function ensureHttps(): void
    {
        if (config('ufuadmin.https') && Ufuadmin::isAdminRoute(request()->path())) {
            URL::forceScheme('https');
            request()->server->set('HTTPS', true);
        }
    }

    /**
     * Alias the middleware.
     *
     * @return void
     */
    protected function aliasMiddleware()
    {
        foreach ($this->middlewareAliases as $alias => $middleware) {
            $this->app['router']->aliasMiddleware($alias, $middleware);
        }

        foreach ($this->middlewareGroups as $group => $middleware) {
            $this->app['router']->middlewareGroup($group, $middleware);
        }
    }
}
