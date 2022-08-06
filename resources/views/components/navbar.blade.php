
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('product') }}">Product List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('banner') }}">Product Banners</a>
          </li>
        </ul>
        @if(Auth::user())
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}"
                     @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>
        @else
        <span><a href="{{ route('login') }}">Login</a></span> || <span><a href="{{ route('register') }}">Register</a></span>
        @endif

      </div>
    </div>
  </nav>
