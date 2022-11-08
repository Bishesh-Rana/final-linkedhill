<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\Property;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Policies\AdminPolicy;
use App\Policies\AdvertisementPolicy;
use App\Policies\BlogPolicy;
use App\Policies\FaqPolicy;
use App\Policies\MenuPolicy;
use App\Policies\PropertyPolicy;
use App\Policies\SliderPolicy;
use App\Policies\TestimonialPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Property::class => PropertyPolicy::class,
        // Admin::class => AdminPolicy::class,
        // Blog::class => BlogPolicy::class,
        // Faq::class => FaqPolicy::class,
        // Slider::class => SliderPolicy::class,
        // Menu::class => MenuPolicy::class,
        // Testimonial::class => TestimonialPolicy::class,
        // Advertisement::class => AdvertisementPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

    }
}
