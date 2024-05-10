<?php

namespace App\Providers;

use App\Services\Mailchimp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(Mailchimp::class, function () {
            $clinet = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us22'
            ]);
            return new Mailchimp($clinet);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Model::unguard();
        // DB::listen(fn ($q) => logger($q->sql, $q->bindings));
        Paginator::useBootstrap();
    }
}
