<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Services\Mailchimp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('IsPost', function () {
            return Post::firstWhere("slug", request('post'));
        });
        Gate::define('OwnerOnly', function () {
            return Post::firstWhere('slug', request('post'))->auther->id === auth()->user()->id;
        });
        Gate::define('IsAdmin', function (User $u, ?string $s = null) {
            return $u->username === $s;
        });
    }
}
