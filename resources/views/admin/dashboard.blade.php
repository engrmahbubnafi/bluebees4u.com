@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <!-- PAGE TITLE -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('dashboard','dashboard') }}">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="display-flex col-md-3">
            <a href="{{ route('signupusers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Total Signed Up Users
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalSignUpUsers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="display-flex col-md-3">
            <a href="{{ route('new_signupusers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        New Signed Up Users
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalNewSignUpUsers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="display-flex col-md-3">
            <a href="{{ route('paid_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Total Paid Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalPaidSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="display-flex col-md-3">
            <a href="{{ route('new_paid_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        New Paid Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalNewPaidSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- <div class="display-flex col-md-3">
            <a href="{{ route('subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Total Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div> --}}

        {{-- <div class="display-flex col-md-3">
            <a href="{{ route('new_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        New Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalNewSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>

    {{-- 
    <div class="row">
        <div class="display-flex col-md-3">
            <a href="{{ route('free_trial_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Total Trial Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalTrialSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="display-flex col-md-3">
            <a href="{{ route('new_free_trial_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        New Trial Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalNewTrialSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>      
    </div> 
    --}}

    {{-- <div class="row">
        <div class="display-flex col-md-3">
            <a href="{{ route('free_trial_honey_bee_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Free Trial Honey Bee
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalTrialHoneyBeeSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="display-flex col-md-3">
            <a href="{{ route('free_trial_bumble_bee_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Free Trial Bumble Bee
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalTrialBumbleBeeSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="display-flex col-md-3">
            <a href="{{ route('free_trial_queen_bee_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Free Trial Queen Bee
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalTrialQueenBeeSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="display-flex col-md-3">
            <a href="{{ route('expired_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Expired Subscribers
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalExpiredSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div> --}}

    <div class="row">
        <div class="display-flex col-md-3">
            <a href="{{ route('paid_honey_bee_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Paid Honey Bee
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalPaidHoneyBeeSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="display-flex col-md-3">
            <a href="{{ route('paid_bumble_bee_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Paid Bumble Bee
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalPaidBumbleBeeSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="display-flex col-md-3">
            <a href="{{ route('paid_queen_bee_subscribers.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Paid Queen Bee
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalPaidQueenBeeSubscribers }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="display-flex col-md-3">
            <a href="{{ route('payments.index') }}">
                <div class="card bg-primary text-white mb-4">
                    <div class="text-center card-body card-body-text">
                        Total Income
                    </div>
                    <div class="card-footer dashboard-card-footer">
                        <p class="text-center text-white card-footer-text">
                            {{ $totalIncome }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/examples/dashboard.js') }}"></script>
@stop
