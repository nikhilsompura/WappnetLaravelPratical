<header>
  <div class="container-fluid position-relative no-side-padding">


    <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

    <ul class="main-menu visible-on-click" id="main-menu">
    
      @guest
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
      @else
        <li>
          <a href="{{Auth::user()->role->id == 1 ? route('admin.dashboard') : route('author.dashboard')}}">
            Dashboard
          </a>
        </li>
      @endguest
      <li><a href="{{route('mainhome')}}">Home</a></li>
      <li><a href="{{route('post.index')}}">Posts</a></li>
    </ul>

  </div>
</header>
