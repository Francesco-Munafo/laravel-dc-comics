<header>
    <nav class="nav justify-content-center py-3 navbar-dark bg-dark">
        <div class="links d-flex">
            <a class="nav-link active" href="{{ route('home') }}" aria-current="page">Home</a>
            <a class="nav-link" href="{{ route('comics') }}">Comics</a>
            <a class="nav-link" href="{{ route('about') }}">About</a>
        </div>
        <div class="admin ms-auto me-3">
            <a class="btn btn-primary" href="{{ route }}">Admin</a>
        </div>
    </nav>
</header>
