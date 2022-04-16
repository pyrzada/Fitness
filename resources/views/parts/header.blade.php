<header class="header">
    <div class="container">
        <div class="menu">
            <div class="logo">
                <img src="{{asset('images/cropped-Logo_AstroverseClub_04-1.png')}}" alt="Logo">
            </div>
            <div class="navbar">
                <ul>
                    <li class=""><a href="/">Home</a></li>
                    <li class=""><a href="">About</a></li>
                    <li class=""><a href="">Service</a></li>
                    @guest
                        <li class=""><a href="login">Login</a></li>
                        <li class=""><a href="register">Register</a></li>
                    @endguest

                    @auth
                        <li class=""><a href="dashboard">{{auth()->user()->name}}</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            {{--                            <li class=""><a type="submit" >{{auth()->user()->name}}</a></li>--}}

                            <button type="submit" style="background: transparent;
    border: none;
    color: white;
    font-size: inherit;cursor: pointer">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>
