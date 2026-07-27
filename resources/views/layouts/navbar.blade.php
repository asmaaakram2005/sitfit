    <!-- Write A nav bar code under this command. "Ahmed"-->

   <header class="sf-navbar-wrapper" id="sfNavbar">
    <div class="sf-navbar-container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="sf-brand" aria-label="SitFit Home">
            <img src="{{ asset('images/sitfit_logo.png') }}" alt="SitFit Logo" class="sf-logo">
        </a>

        <!-- Desktop Navigation -->
        <nav class="sf-nav-menu" id="sfNavMenu">
            <ul class="sf-nav-list">
                 {{-- TODO: add active route when pages are created --}}
                <li class="sf-nav-item">
                    <a href="{{ route('home') }}" class="sf-nav-link ">Home</a>
                </li>
                <li class="sf-nav-item">
                    <a href="{{ route('products.index') }}" class="sf-nav-link">Products</a>
                </li>
                <li class="sf-nav-item">
                    <a href="#" class="sf-nav-link">About</a>
                </li>
                <li class="sf-nav-item">
                    <a href="#" class="sf-nav-link">FAQ</a>
                </li>
                <li class="sf-nav-item">
                    <a href="#" class="sf-nav-link">Contact</a>
                </li>
                  <li class="sf-nav-item">
                <a href="{{ route('cart.index') }}" class="sf-nav-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>My Cart</span>
                    @auth
                        @php
                            $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
                        @endphp

                        @if($cartCount > 0)
                            <span class="cart-badge">
                                {{ $cartCount }}
                            </span>
                        @endif
                    @endauth
                </a>
                 </li>
            </ul>

            <!-- Mobile Auth Links inside Menu -->
            <div class="sf-auth-mobile">
                @guest
                    <a href="{{ route('login') }}" class="sf-btn sf-btn-outline">
                        <i class="fa-solid fa-user"></i>
                        <span>Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="sf-btn sf-btn-primary">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Create Account</span>
                    </a>
                @endguest

                @auth
                    <a href="#" class="sf-btn sf-btn-outline">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>MyProfile</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="sf-logout-form">
                        @csrf
                        <button type="submit" class="sf-btn sf-btn-danger">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @endauth
            </div>
        </nav>

        <!-- Desktop Auth Actions -->
        <div class="sf-auth-desktop">
            @guest
                <a href="{{ route('login') }}" class="sf-btn sf-btn-outline">
                    <i class="fa-solid fa-user"></i>
                    <span>Login</span>
                </a>
                <a href="{{ route('register') }}" class="sf-btn sf-btn-primary">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Create Account</span>
                </a>
            @endguest

            @auth
                <a href="{{ route('profile.edit') }}" class="sf-btn sf-btn-outline">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>My Profile</span>
                </a>
                 <form action="{{ route('logout') }}" method="post" class="sf-logout-form">
                   @csrf
                   @method('DELETE')

                        <button type="submit" class="sf-btn sf-btn-danger">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                       </button>
                 </form>
            @endauth
        </div>

        <!-- Mobile Toggle Button -->
        <button class="sf-hamburger" id="sfNavToggle" aria-label="Toggle navigation menu" aria-expanded="false">
            <span class="sf-bar"></span>
            <span class="sf-bar"></span>
            <span class="sf-bar"></span>
        </button>
    </div>
</header>

        



    





    
        <!-- NEVER DELETE THIS FORM, IT IS VERY IMPORTANT. "Ahmed" -->
    <!-- <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Logout</button>
    </form> -->
