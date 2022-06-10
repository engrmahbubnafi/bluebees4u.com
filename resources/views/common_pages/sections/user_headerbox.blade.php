<div class="header-section" id="user-headerbox">
    <div class="user-header-wrap">
        <div class="user-photo">
            <img alt="profile photo" src="{{ asset("storage".Auth::user()->photo) }}"/>
        </div>
        <div class="user-info">
            <span class="user-name">{{Auth::user()->name}}</span>
            {{--            <span class="user-profile">Admin</span>--}}
        </div>
        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
    </div>
    <div class="user-options dropdown-box">
        <div class="drop-content basic">
            <ul>
                <li><a href="{{ route('setProfile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
            </ul>
        </div>
    </div>
</div>
