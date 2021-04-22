<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">

        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{route('homepage')}}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Kodeeo Limited</strong>
            </a>


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Select Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="{{route('products.under.category','all')}}">All Product</a>
                    @foreach($categories as $category)
                    <a class="dropdown-item" href="{{route('products.under.category',$category->id)}}">{{$category->name}}</a>
                   @endforeach
                </div>
            </div>

            @auth()
                <span style="color:white;">{{auth()->user()->name}}</span> <a href="{{route('logout')}}"> Logout</a>
            @else
                <a href="{{route('login.registration.form')}}">Login / Registration</a>
            @endauth
        </div>
    </div>
</header>
