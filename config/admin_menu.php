<?php

use App\Models\EmptyObj;

return collect([
    (new EmptyObj)->setRawAttributes([
        'title' => 'Dashboard',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => 'dashboard',
        'params' => ['dashboard'],
        'permission' => null,
        'groups' => collect([]),
    ]),
    (new EmptyObj)->setRawAttributes([
        'title' => 'Signup Users',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => 'signupusers.index',
        'params' => [],
        'permission' => null,
        'groups' => collect([]),
    ]),
    (new EmptyObj)->setRawAttributes([
        'title' => 'Subscribers',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => 'subscribers.index',
        'params' => [],
        'permission' => null,
        'groups' => collect([
            // (new EmptyObj)->setRawAttributes([
            //     'title' => 'All Subscribers',
            //     'route_name' => 'subscribers.index',
            //     'params' => [],
            //     'permission' => null,
            //     'children' => collect([])
            // ]),
            // (new EmptyObj)->setRawAttributes([
            //     'title' => 'All Trial Subscribers',
            //     'route_name' => 'free_trial_subscribers.index',
            //     'params' => [],
            //     'permission' => null,
            //     'children' => collect([])
            // ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Paid Subscribers',
                'route_name' => null,
                'params' => [],
                'permission' => null,
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'All Paid Subscribers',
                        'route_name' => 'paid_subscribers.index',
                        'params' => [],
                        'permission' => null,
                        'children' => collect([])
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Current Paid Subscribers',
                        'route_name' => 'current_paid_subscribers.index',
                        'params' => [],
                        'permission' => null,
                        'children' => collect([])
                    ]),
                ])
            ]),
            // (new EmptyObj)->setRawAttributes([
            //     'title' => 'All Expired Subscribers',
            //     'route_name' => 'expired_subscribers.index',
            //     'params' => [],
            //     'permission' => null,
            //     'children' => collect([])
            // ]),
        ]),
    ]),

    (new EmptyObj)->setRawAttributes([
        'title' => 'Payments',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => null,
        'params' => [],
        'permission' => null,
        'groups' => collect([
            (new EmptyObj)->setRawAttributes([
                'title' => 'All Payments',
                'route_name' => ['payments.index'],
                'params' => [],
                'permission' => null,
                'children' => collect([])
            ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Add New Payment',
                'route_name' => ['payments.create'],
                'params' => [],
                'permission' => null,
                'children' => collect([])
            ]),
        ]),
    ]),

    (new EmptyObj)->setRawAttributes([
        'title' => 'Promotions',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => null,
        'params' => [],
        'permission' => null,
        'groups' => collect([
            (new EmptyObj)->setRawAttributes([
                'title' => 'All Promotions',
                'route_name' => ['promotion.index'],
                'params' => [],
                'permission' => null,
                'children' => collect([])
            ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Add New Promotion',
                'route_name' => ['promotion.create'],
                'params' => [],
                'permission' => null,
                'children' => collect([])
            ]),
        ]),
    ]),

    (new EmptyObj)->setRawAttributes([
        'title' => 'Contacts',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => 'contactStatus',
        'params' => [],
        'permission' => null,
        'groups' => collect([]),
    ]),

    (new EmptyObj)->setRawAttributes([
        'title' => 'Packages & Addons',
        'icon' => '<i class="fa fa-home"></i>',
        'route_name' => null,
        'params' => [],
        'permission' => null,
        'groups' => collect([
            (new EmptyObj)->setRawAttributes([
                'title' => 'Packages',
                'route_name' => null,
                'params' => [],
                'permission' => null,
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'All Packages',
                        'route_name' => 'package.index',
                        'params' => [],
                        'permission' => null,
                        'children' => collect([])
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Add New Package',
                        'route_name' => 'package.create',
                        'params' => [],
                        'permission' => null,
                        'children' => collect([])
                    ]),
                ]),
            ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Addons',
                'route_name' => null,
                'params' => [],
                'permission' => null,
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'All Addons',
                        'route_name' => 'addons.index',
                        'params' => [],
                        'permission' => null,
                        'children' => collect([])
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Add New Addon',
                        'route_name' => 'addons.create',
                        'params' => [],
                        'permission' => null,
                        'children' => collect([])
                    ]),
                ])
            ]),
        ]),
    ]),
    (new EmptyObj)->setRawAttributes([
        'title' => 'Configuration',
        'icon' => '<i class="fa fa-sitemap"></i>',
        'route_name' => null,
        'params' => null,
        'permission' => null,
        'groups' => collect([
            (new EmptyObj)->setRawAttributes([
                'title' => 'Site Settings',
                'route_name' => ['site_settings.edit'],
                'params' => [1],
                'permission' => 'SiteSettingsController@edit',
                'children' => collect([])
            ]),
        ]),
    ]),
    (new EmptyObj)->setRawAttributes([
        'title' => 'User and Permission',
        'icon' => '<i class="fa fa-book"></i>',
        'route_name' => null,
        'params' => null,
        'permission' => null,
        'groups' => collect([
            (new EmptyObj)->setRawAttributes([
                'title' => 'User Managements',
                'route_name' => ['users.edit'],
                'params' => [],
                'permission' => null,
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Add User',
                        'route_name' => 'register',
                        'params' => [],
                        'permission' => 'RegisterController@create',
                        'icon' => '',
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'User List',
                        'route_name' => 'users.index',
                        'params' => [],
                        'permission' => 'UserController@index',
                        'icon' => '',
                    ]),
                ]),
            ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Role Managements',
                'route_name' => ['roles.edit'],
                'params' => [],
                'permission' => null,
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Add Role',
                        'route_name' => 'roles.create',
                        'params' => [],
                        'permission' => 'RoleController@create',
                        'icon' => '',
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Role List',
                        'route_name' => 'roles.index',
                        'params' => [],
                        'permission' => 'RoleController@index',
                        'icon' => '',
                    ]),
                ]),
            ]),
        ])
    ]),
    (new EmptyObj)->setRawAttributes([
        'title' => 'Website Management',
        'icon' => '<i class="fa fa-files-o"></i>',
        'route_name' => null,
        'params' => null,
        'permission' => null,
        'groups' => collect([
            (new EmptyObj)->setRawAttributes([
                'title' => 'Page Content',
                'route_name' => ['web_content.index'],
                'params' => [],
                'permission' => 'WebContentController@index',
                'children' => collect([])
            ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Menu',
                'route_name' => ['menu.index'],
                'params' => [],
                'permission' => null,
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Menu List',
                        'route_name' => 'menu.index',
                        'params' => [],
                        'permission' => 'MenuController@index',
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Add Menu Location',
                        'route_name' => 'menu_map.index',
                        'params' => [],
                        'permission' => 'MenuLocationMappingController@index',
                        'children' => collect([])
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Menu Location List',
                        'route_name' => 'locationMap',
                        'params' => [],
                        'permission' => 'MenuLocationMappingController@getLocationMap',
                        'children' => collect([])
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Menu Mapping',
                        'route_name' => 'menuMapping',
                        'params' => [],
                        'permission' => 'MenuLocationMappingController@menuMapping',
                        'children' => collect([])
                    ]),
                ]),
            ]),
            (new EmptyObj)->setRawAttributes([
                'title' => 'Document Management',
                'route_name' => ['document_type.index', 'documents.index'],
                'params' => [],
                'permission' => 'DocumentsTypeController@index',
                'children' => collect([
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Document Type',
                        'route_name' => 'document_type.index',
                        'params' => [],
                        'permission' => 'DocumentsTypeController@index',
                        'children' => collect([])
                    ]),
                    (new EmptyObj)->setRawAttributes([
                        'title' => 'Documents',
                        'route_name' => 'documents.index',
                        'params' => [],
                        'permission' => 'DocumentsController@index',
                        'children' => collect([])
                    ]),
                ]),
            ]),
        ]),
    ]),
]);
