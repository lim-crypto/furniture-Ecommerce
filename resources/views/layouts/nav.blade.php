<nav class="navbar navbar-expand-md navbar-white navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('furnilogo.png') }}" width="45" alt="">
            <span class="h4 align-middle"> {{ config('app.name', 'Furni') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-right">
                        @forelse(App\Category::all() as $category)
                        <li><a class="dropdown-item" href="{{route('productByCategory' , $category->id)}}">{{$category->name}}</a></li>
                        @empty
                        <p class="mb-3">No Category</p>
                        @endforelse
                    </ul>
                </li>

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav  ml-auto">
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
                <!-- Cart Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link  d-block  d-sm-none" href="/carts">
                        Cart
                    </a>
                    <a class="nav-link d-none d-sm-block" data-toggle="dropdown" href="#">
                        <i class="fas fa-shopping-cart  ">
                            @if( Cart::session(auth()->id())->getContent()->count() )
                            <span class="badge badge-danger navbar-badge">{{ Cart::session(auth()->id())->getContent()->count() }}</span>
                            @endif
                        </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pre-scrollable">
                        @if( Cart::session(auth()->id())->getContent()->count() > 0)
                        <div class="dropdown-divider"></div>
                        <a href="/carts" class="dropdown-item dropdown-footer">See All Items in Cart</a>
                        @endif
                        @forelse(Cart::session(auth()->id())->getContent() as $item)
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="/storage/images/products/{{ $item->attributes->image }}" alt="" class="img-size-50 mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ $item->name }}
                                    </h3>
                                    <p class="text-sm">&#8369; {{ $item->price }} </p>
                                    <span class="float-right text-sm text-muted"> Total : &#8369; {{ $item->quantity  *  $item->price }} </span>
                                    <p class="text-sm text-muted"> Qty : {{ $item->quantity }} </p>
                                </div>
                            </div>
                        </a>
                        @empty
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        No Item in Cart
                                    </h3>
                                </div>
                            </div>
                        </a>
                        @endforelse

                    </div>
                </li>
                <!-- user menu -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="/storage/images/me.jpg" class="user-image elevation-2" alt="{{ Auth::user()->getName()  }}"> -->
                        <i class="fas fa-user fa-fw"></i>
                        <span class="text-capitalize">
                            {{Auth::user()->getName()}}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-right">
                        @if(Auth::user()->isAdmin)
                        <li><a class="dropdown-item" href="{{route('dashboard')}}">Admin Dashboard</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('users.show',Auth::user())}}">Profile</a></li>
                        @endif
                        <li><a class="dropdown-item" href="/orders">Orders</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                <!--  -->
                @endguest
            </ul>
        </div>
    </div>
</nav>