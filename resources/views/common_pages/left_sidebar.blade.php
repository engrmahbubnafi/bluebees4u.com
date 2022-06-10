@php
    $menu_list=resolve('premitedMenuArr');
    $currentRouteName=Route::currentRouteName();
@endphp
<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs"
             data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">

        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->

                    @foreach (config('admin_menu') as $m_Key=>$module)
                        @if ($module->groups->count())
                            <x-menu-module :children="$module->groups" :title="$module->title" class="close-item"
                                           id="{{$m_Key}}">
                                @slot('icon')
                                    {!!$module->icon !!}
                                @endslot

                                @foreach ($module->groups as $g_key=>$group)
                                    @if ($group->children->count())
                                        <x-menu-group :children="$group->children" :title="$group->title"
                                                      class="close-item"
                                                      id="{{$m_Key}}_{{$g_key}}">
                                            @foreach ($group->children as $key=>$menu)
                                                @if ($menu->permission)
                                                    @if (Str::isMenuRender($menu->permission, $menu_list))
                                                        <li class="{{ Str::checkMenuActive($currentRouteName,[$menu->route_name,$menu->params]) }}"
                                                            id="{{$m_Key}}_{{$g_key}}_{{$key}}">
                                                            <a href="{{ route($menu->route_name,$menu->params) }}">
                                                                {{ $menu->title }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li class="{{ Str::checkMenuActive($currentRouteName,[$menu->route_name,$menu->params]) }}"
                                                        id="{{$m_Key}}_{{$g_key}}_{{$key}}">
                                                        <a href="{{ route($menu->route_name,$menu->params) }}">
                                                            {{ $menu->title }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </x-menu-group>
                                    @else
                                        @if ($group->permission)
                                            @if (Str::isMenuRender($group->permission, $menu_list))
                                                <li class="{{ Str::checkMenuActive($currentRouteName,[$group->route_name[0],$group->params]) }}"
                                                    id="{{$m_Key}}_{{$g_key}}">
                                                    <a href="{{ route($group->route_name[0],$group->params) }}">
                                                        <span>{{ $group->title }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="{{ Str::checkMenuActive($currentRouteName,[$group->route_name[0],$group->params]) }}"
                                                id="{{$m_Key}}_{{$g_key}}">
                                                <a href="{{ route($group->route_name[0],$group->params) }}">
                                                    <span>{{ $group->title }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </x-menu-module>
                        @else
                            @if ($module->permission)
                                @if (Str::isMenuRender($module->permission, $menu_list))
                                    <li class="{{ Str::checkMenuActive($currentRouteName,[$module->route_name,$module->params]) }}"
                                        id="{{$m_Key}}">
                                        <a href="{{ route($module->route_name,$module->params) }}">
                                            {!!$module->icon !!}
                                            <span>{{ $module->title }}</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="{{ Str::checkMenuActive($currentRouteName,[$module->route_name,$module->params]) }}"
                                    id="{{$m_Key}}">
                                    <a href="{{ route($module->route_name,$module->params) }}">
                                        {!!$module->icon !!}
                                        <span>{{ $module->title }}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach

                    {{-- @include('common_pages.template_menu') --}}
                </ul>
            </nav>
        </div>
    </div>
</div>

