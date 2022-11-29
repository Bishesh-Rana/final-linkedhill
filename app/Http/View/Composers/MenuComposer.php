<?php

namespace App\Http\View\Composers;

use App\Models\Website;
use App\Models\Menu;
use App\Models\Page;
use App\Models\City;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class MenuComposer
{
    public function compose(View $view)
    {
        $website =  Website::select('*')->orderBy('created_at', 'desc')->first();

        $menus =  Menu::select('*')
            ->where('active', '1')
            ->with([
                'child_menu' => function ($qr) {
                    return $qr->select('*');
                },
            ])
            ->orderBy('order', 'ASC')
            ->where('parent_id', null)
            ->get();
        $header_menus =  $menus->filter(function ($menu) {
            return in_array('header', $menu->show) || in_array('both', $menu->show);
        });




        $footer_menus =   $menus->filter(function ($menu) {
            return in_array('footer', $menu->show) || in_array('both', $menu->show);
        });
        $pages = Page::get();
        $cities = City::take(10)->get();
        $view->with([
            'menus' => $menus,
            'website' => $website,
            'cities' => $cities,
            'pages' => $pages,
            'header_menus' => $header_menus,
            'footer_menus' => $footer_menus,
        ]);
    }
}
