<?php
namespace Hell0x\Shorten\Providers;

use Illuminate\Support\ServiceProvider;
use Hell0x\Shorten\Contracts\ShortUrl;
use Hell0x\Shorten\Generation\DefaultShortChains;

class ShortChainsProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShortUrl::class, function ($app) {
            return new DefaultShortChains($app['config']);
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [ShortUrl::class];
    }
}