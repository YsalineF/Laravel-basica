<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : ''}}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{ Route::currentRouteName() == 'works.index' ? 'active' : ''}} {{ Route::currentRouteName() == 'works.show' ? 'active' : ''}}"><a href="{{ route('works.index') }}">Portfolio</a></li>
        <li class="{{ Route::currentRouteName() == 'posts.index' ? 'active' : ''}} {{ Route::currentRouteName() == 'posts.show' ? 'active' : ''}}"><a href="{{ route('posts.index') }}">Blog</a></li>
        <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('login') }}">Connexion</a></li>
    </ul>
</div>
