<nav class="navbar navbar-fixed-top navbar-expand-md bg-dark" style="min-height:100px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="icon-bar">+</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav ml-auto">
            @auth
            @if(Auth::user()->type == 'admin')
                <div class="dropdown">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/user" id="navbarDropdownMenuLink" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">Users</a>
                        <div class="dropdown-menu text-info bg-secondary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-secondary" href="/user">Show Users</a>
                            <a class="dropdown-item text-secondary" href="/register">Add User</a>
                        </div>
                    </li>
                </div>
            @endif
                <div class="dropdown">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/courses" id="navbarDropdownMenuLink1" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">Courses</a>
                        <div class="dropdown-menu text-info bg-secondary" aria-labelledby="navbarDropdownMenuLink1">
                            <a href="/courses" class="dropdown-item text-secondary">Show Courses</a>
                            <a href="/courses/create" class="dropdown-item text-secondary">Add Course</a>

                        </div>
                    </li>
                </div>
                
                <li class="nav-item">
                    <a class="nav-link" href="/newsfeed">Announcements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/my">Profile</a>
                </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="/my" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-info" href="{{ route('logout') }}"
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
<script>
$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>