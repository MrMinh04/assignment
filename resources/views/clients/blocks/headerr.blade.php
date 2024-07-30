<nav class="navbar navbar-expand-sm bg-black shadow navbar-dark" style="height: 55px;">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <!-- Khu vực Logo -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.html">
                        <img height="50px" src="{{ asset('images/logo_nen_den.png') }}" alt="">
                    </a>
                </li>
            </ul>
        </div>

        <!-- Khu vực menu  -->
        <ul class="navbar-nav ms-5">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Join us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Account</a>
            </li>
            <form action="{{route('logout')}}" method="post">
                @csrf
                {{-- {{Auth::user()->name}} --}}
                <button type="submit">Logout</button>
            </form>
        </ul>
    </div>

</nav>