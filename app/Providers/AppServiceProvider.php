<?php

namespace App\Providers;

use App\Models\brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap(); // For Bootstrap 5

        $categories = Category::all();

        $contact = Contact::find(1);

        View::share('contact',$contact);

        View::share('categories',$categories);
        View::share('brands',brand::all());
        View::share('sliders',Slider::all());
    }
}
