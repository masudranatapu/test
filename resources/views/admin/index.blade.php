<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                                {{ __('Admin Dashboard') }}
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
                                    <h3>User List</h3>

                                    @if (session('success'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('active'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('active') }}
                                        </div>
                                    @endif

                                    @if (session('inactive'))
                                        <div class="alert alert-info" role="alert">
                                            {{ session('inactive') }}
                                        </div>
                                    @endif


                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($users as $key => $user)
                                            <tr>
                                              <th scope="row">{{$key + 1}}</th>
                                              <td>{{$user->name ?? ''}}</td>
                                              <td><a href="mailto::{{ $user->email }}">{{ $user->email ?? '' }}</a></td>
                                              <td>
                                                  @if($user->status == 1)
                                                    <span class="badge bg-success text-white">Active</span>
                                                  @else 
                                                    <span class="badge bg-info text-white">Inactive</span>
                                                  @endif
                                              </td>
                                              <td>
                                                  @if($user->status == 1)
                                                    <a href="{{ route('admin.user.inactive', $user->id) }}" class="btn btn-info">Inactive now</a>
                                                  @else
                                                    <a href="{{ route('admin.user.active', $user->id) }}" class="btn btn-success">Active now</a>
                                                  @endif
                                                  <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure, You want to delete this user?')">Delete</a>
                                              </td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="{{asset('massage/toastr/toastr.js')}}"></script>
        {!! Toastr::message() !!}
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}','Error',{
                        closeButton:true,
                        progressBar:true,
                    });
                @endforeach
            @endif
        </script>
    </body>
</html>
