<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'mystore') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                &nbsp;
            </ul>
            <ul class="nav navbar-nav btn" style="font-size:16px; height: 70px;">
                <li><a class="nav-link" href="/">Home</a>&nbsp;</li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div style="font-family:Bradley Hand ITC; font-size: 20px;"class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/items">Items</a>
                          <a class="dropdown-item" href="/types">Types</a>
                          <a class="dropdown-item" href="/products">Groups</a>
                        </div>
                            <li><a class="nav-link" href="/Brands">Brands</a>&nbsp;</li>
                            <li><a class="nav-link" href="/about">About</a>&nbsp;</li>
                            <li><a class="nav-link" href="/services">Services</a>&nbsp;</li>
                            <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/store" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Stores</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/sales">Sales</a>
                          <a class="dropdown-item" href="/shops">Shops</a>
                          <a class="dropdown-item" href="/Vendors">Vendors</a>
                          <a class="dropdown-item" href="/cashiers">Cashiers</a>
                        </div>
                        <li><a class="nav-link" href="/posts">Blog</a>&nbsp;</li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                    <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                          </form>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Profile</a>
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="/dashboard">Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>