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
                'name' => 'Блог',
                'route' => 'articles',
                'icon' => 'i-newspaper',
            ]),
            new NavItem([
                'name' => 'Категории',
                'route' => 'categories',
                'icon' => 'i-bullet-list',
            ]),
            new NavItem([
                'name' => 'Услуги',
                'route' => 'services',
                'icon' => 'i-grid-2',
            ]),
            new NavItem([
                'name' => 'Портфолио',
                'route' => 'portfolios',
                'icon' => 'i-portfolio',
            ]),
            new NavItem([
                'name' => 'Преимущества',
                'route' => 'advantages',
                'icon' => 'i-laptop',
            ]),
            new NavItem([
                'name' => 'Обратная связь',
                'route' => 'feedback',
                'icon' => 'i-phone',
                'unread' => Feedback::where('status', 'processing')->count(),
            ]),
            new NavItem([
                'name' =>'Страницы',
                'route'=> 'pages',
                'icon' => 'i-folder',
            ]),
            new NavItem([
               'name' => 'Баннеры',
               'route' => 'banners',
               'icon' => 'i-monitor',
            ]),
            new NavItem([
                'name' => 'Настройки',
                'route' => 'settings',
                'icon' => 'i-settings',
            ])
        ];
    }
}
