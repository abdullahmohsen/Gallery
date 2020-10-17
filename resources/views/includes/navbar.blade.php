<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="{{ route('home') }}">Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
        aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::currentRouteName() == ('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == ('create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create') }}">Create Album</a>
            </li>
        </ul>
    </div>
</nav>
