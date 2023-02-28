<!-- navbar dashboard bootstrap 4.6-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              About
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalAbout">ADD</a></li>
              <li><a class="dropdown-item" href="/list/about">LIST</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Service
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalService">ADD</a></li>
              <li><a class="dropdown-item" href="#">LIST</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Portfolio
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalPortfolio">ADD</a></li>
              <li><a class="dropdown-item" href="#">LIST</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Testimonials
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTestimonials">ADD</a></li>
              <li><a class="dropdown-item" href="#">LIST</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Signature
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSignature">ADD</a></li>
              <li><a class="dropdown-item" href="#">LIST</a></li>
            </ul>
          </li>
      </ul>
      <div class="nav-item dropdown justify-content-end px-md-5">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Informação</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
      </div>
    </div>
  </nav>
<!--fim navbar dashboard-->