<?php

namespace App\Providers;

use App\Models\Website;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('websites', function ($app) {
            return new Website();
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('setting', Website::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole() && count(Schema::getColumnListing('websites'))) {
            $columns =  Schema::getColumnListing('websites');
            $settings = Website::latest()->first();
            foreach ($columns as $key => $setting) {
                Config::set('websites.' . $setting, $settings[$setting]);
            }
        }
    }
}
