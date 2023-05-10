@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">                    
                    <div class="row">
                        <div class="col-6">
                                {{ __('User Dashboard') }}
                        </div>
                        <div class="col-6">
                            <a class="float-right" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(Auth::user()->status == 0)
                        <div class="alert alert-warning" role="alert">
                            Your are not a active user.
                        </div>
                        <h3>Please wait for admin approval</h3>
                    @else 

                        <h3>Your details</h3>

                        <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                               Name 
                                <span>{{ Auth::user()->name }}</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Email
                                <span><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Status
                                <span>Active User</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Registered at 
                                <span>{{ date('d M Y H:i:s A', strtotime(Auth::user()->created_at)) }}</span>
                              </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
