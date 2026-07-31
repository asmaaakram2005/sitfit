    <!-- Write A nav bar code under this command. "Ahmed"-->

   <header class="sf-navbar-wrapper" id="sfNavbar">
    <div class="sf-navbar-container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="sf-brand" aria-label="SitFit Home">
            <img src="{{ asset('images/sitfit_logo_nav.png') }}" alt="SitFit Logo" class="sf-logo">
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
                    <a href="{{ route('home') }}#solution-section" class="sf-nav-link">About</a>
                </li>
                <li class="sf-nav-item">
                    <a href="{{ route('home') }}#faq-section" class="sf-nav-link">FAQ</a>
                </li>
                <li class="sf-nav-item">
                    <a href="{{route('contact.index')}}" class="sf-nav-link">Contact Us</a>
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
                    <div class="sf-mobile-profile">

    <button type="button" class="sf-btn sf-btn-outline sf-mobile-profile-btn">
        <i class="fa-solid fa-circle-user"></i>
        <span>My Profile</span>
        <i class="fa-solid fa-chevron-down"></i>
    </button>

 <div class="sf-mobile-profile-menu">
    <a href="{{ route('profile.index') }}">
        <i class="fa-solid fa-user"></i>
        <span> Profile</span>
    </a>

    <a href="#">
        <i class="fa-solid fa-location-dot"></i>
        <span>My Address</span>
    </a>

    <a href="#">
        <i class="fa-solid fa-box"></i>
        <span>My Orders</span>
    </a>
</div>

</div>
         @if(auth()->check() && auth()->user()->isAdmin())

        <a href="{{ route('admin.dashboard') }}"
       class="sf-btn sf-btn-primary">
        <i class="fa-solid fa-gear"></i>
        <span>Admin</span>
        </a>

     @endif
                    <!-- <form method="POST" action="{{ route('logout') }}" class="sf-logout-form">
                        @csrf
                        <button type="submit" class="sf-btn sf-btn-danger">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form> -->
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
                <div class="sf-profile-dropdown">
    <button type="button" class="sf-btn sf-btn-outline sf-profile-btn">
        <i class="fa-solid fa-circle-user"></i>
        <span>My Profile</span>
        <i class="fa-solid fa-chevron-down"></i>
    </button>

    <div class="sf-profile-menu">
    <a href="{{ route('profile.index') }}">
        <i class="fa-solid fa-user"></i>
           Profile
    </a>

    <a href="{{ route('profile.address') }}">
        <i class="fa-solid fa-location-dot"></i>
        My Address
    </a>

    <a href="{{ route('profile.orders') }}">
        <i class="fa-solid fa-box"></i>
        My Orders
    </a>
</div>
</div>

     @if(auth()->check() && auth()->user()->isAdmin())

    <a href="{{ route('admin.dashboard') }}"
       class="sf-btn sf-btn-primary">
        <i class="fa-solid fa-gear"></i>
        <span>Admin</span>
    </a>

     @endif
                 <!-- <form action="{{ route('logout') }}" method="post" class="sf-logout-form">
                   @csrf
                   @method('DELETE')

                        <button type="submit" class="sf-btn sf-btn-danger">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                       </button>
                 </form> -->
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


   <!-- javascript -->
     <script>

        const navToggle = document.getElementById("sfNavToggle");
        const navMenu = document.getElementById("sfNavMenu");

     navToggle.addEventListener("click", () => {
     navMenu.classList.toggle("sf-active");
     navToggle.classList.toggle("sf-active");
    });

        //   desktop
        const profileBtn = document.querySelector(".sf-profile-btn");
         const profileMenu = document.querySelector(".sf-profile-menu");

          if (profileBtn && profileMenu) {

    profileBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        profileMenu.classList.toggle("show");
    });

    document.addEventListener("click", function () {
        profileMenu.classList.remove("show");
    });

    profileMenu.addEventListener("click", function (e) {
        e.stopPropagation();
    });


        //   mobile
         const mobileProfileBtn = document.querySelector(".sf-mobile-profile-btn");
         const mobileProfileMenu = document.querySelector(".sf-mobile-profile-menu");

     if (mobileProfileBtn && mobileProfileMenu) {

    mobileProfileBtn.addEventListener("click", () => {
        mobileProfileMenu.classList.toggle("show");
    });

      }
    }
     </script>


        



    





    
        <!-- NEVER DELETE THIS FORM, IT IS VERY IMPORTANT. "Ahmed" -->
    <!-- <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Logout</button>
    </form> -->
