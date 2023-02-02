<?php

namespace App\Providers;

use App\Models\Hall;
use App\Models\Room;
use App\Models\Settings;
use App\Models\Wellness;
use App\Models\Restaurent;
use App\Models\Website\Page;
use Spatie\Permission\Models\Role;
use App\Models\Website\NavigationMenu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Settings::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $menuItems = NavigationMenu::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $footerItems = Page::where('footer_item','1')->where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $rooms = Room::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $restaurents = Restaurent::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $halls = Hall::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $wellnesses = Wellness::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->get();
        $roles = Role::where('is_active', 1)->where('is_delete', 1)->orderBy('id','ASC')->get();
        view()->share(compact('settings', 'menuItems', 'footerItems', 'rooms', 'restaurents', 'halls', 'wellnesses', 'roles'));
    }
}
