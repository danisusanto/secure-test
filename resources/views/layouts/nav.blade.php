<nav class="navbar navbar-expand-lg navbar-light navbar-product">
    <div class="container">
        <a class="navbar-brand mr-0" href="{{ url('/product') }}">
            <img src="{{ asset('images/nh-logo.svg') }}" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler mr-3 mr-lg-0 mr-md-0 navbar-product__toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-product__toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-product__menu" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 pl-3">
                <li class="nav-item active">
                    <a class="nav-link navbar-product__menu-nav" href="{{ url('/product') }}">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-product__menu-nav" href="#">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-product__menu-nav" href="{{ url('/auth/logout') }}">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>