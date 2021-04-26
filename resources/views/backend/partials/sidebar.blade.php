<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">


        <ul class="nav flex-column">
            @if(auth()->user()->role=='admin')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.booking')}}">
                        <span data-feather="file"></span>
                        Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.list')}}">
                        <span data-feather="shopping-cart"></span>
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.list')}}">
                        <span data-feather="shopping-cart"></span>
                        Category
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="users"></span>
                        Customers
                    </a>
                </li>

            @endif

            @if(auth()->user()->role=='manager')

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="users"></span>
                        Customers
                    </a>
                </li>
            @endif
        </ul>


    </div>
</nav>
