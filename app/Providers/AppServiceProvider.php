<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Visitor;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

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
    // Lempar data statistik ke file layout frontend Anda
    View::composer('layouts.frontend', function ($view) {
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $view->with('todayVisitors', Visitor::whereDate('visit_date', $today)->count());
        
        $view->with('monthVisitors', Visitor::whereMonth('visit_date', $currentMonth)
                                            ->whereYear('visit_date', $currentYear)
                                            ->count());
        
        $view->with('totalVisitors', Visitor::count());
    });
}
}