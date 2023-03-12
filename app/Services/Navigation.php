<?php

namespace App\Services;

use App\Models\Feedback;
use Talanoff\ImpressionAdmin\Helpers\NavItem;

class Navigation
{
    public function frontend()
    {
        //
    }

    public function backend()
    {
        return [
            new NavItem([
                'name' => 'Blog',
                'route' => 'articles',
                'icon' => 'i-newspaper',
            ]),
//            new NavItem([
//                'name' => 'Categories',
//                'route' => 'categories',
//                'icon' => 'i-bullet-list',
//            ]),
            new NavItem([
                'name' => 'Services',
                'route' => 'services',
                'icon' => 'i-grid-2',
            ]),
//            new NavItem([
//                'name' => 'Portfolio',
//                'route' => 'portfolios',
//                'icon' => 'i-portfolio',
//            ]),
            new NavItem([
                'name' => 'Advantages',
                'route' => 'advantages',
                'icon' => 'i-laptop',
            ]),
            new NavItem([
                'name' => 'Feedback',
                'route' => 'feedback',
                'icon' => 'i-phone',
                'unread' => Feedback::where('status', 'processing')->count(),
            ]),
            new NavItem([
                'name' =>'Pages',
                'route'=> 'pages',
                'icon' => 'i-folder',
            ]),
            /*new NavItem([
               'name' => 'Banners',
               'route' => 'banners',
               'icon' => 'i-monitor',
            ]),*/
            new NavItem([
               'name' => 'Reviews',
               'route' => 'reviews',
               'icon' => 'i-monitor',
            ]),
            new NavItem([
                'name' => 'Setting',
                'route' => 'settings',
                'icon' => 'i-settings',
            ])
        ];
    }
}
