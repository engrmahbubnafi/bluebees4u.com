<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
        @foreach($menu_settings as $data)
            @if($data->location_id !=1)
                @continue
            @endif
            @php
                $stringArray=parse_url($data->slug);
                if($data->slug=='/'){
                    $url=route('publicHome');
                }elseif($data->slug=='contact'){
                    $url=route('contactUs');
                }elseif(isset($stringArray['host'])){
                    $url=$data->slug;
                }else{
                    $url=route('contentGateway',$data->slug);
                }
            @endphp
            <li class="{{$data->children->count() ? "nav-item dropdown" : ""}}">
                <a href='{{$data->children->count() ? "javascript:void(0)" : $url}}'
                   @if($data->children->count()) class="nav-link dropdown-toggle" data-toggle="dropdown"
                   @else class="nav-link" @endif>{{$data->name}}</a>
                <!-- Dropdown Menu for All Packages -->
                @if($data->children->count())
                    <div class="dropdown-menu">
                        @foreach($data->children as $child1)
                            @php
                                $cStringArray=parse_url($child1->slug);
                                if(isset($cStringArray['host'])){
                                    $curl=$child1->slug;
                                }else{
                                    $curl=route('contentGateway',$child1->slug);
                                }
                            @endphp
                            <a id="{{ $child1->id }}" href="{{$curl}}" class="dropdown-item">{{$child1->name}}</a>
                        @endforeach
                    </div>
                @endif
            </li>
        @endforeach
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item mt-4 mb-4">
            <a class="link-outline" href="{{ route('signup') }}"><i
                    class="icon fas fa-sign-in-alt"></i>&nbsp;Sign Up</a>
            <!-- <a class="link-outline" href="login_page.html"><i class="icon fas fa-sign-in-alt"></i>&nbsp;Login</a> -->
        </li>
    </ul>
</div>
