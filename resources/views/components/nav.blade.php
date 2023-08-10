<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @if(!auth()->user())
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Tutti gli annunci</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Registrati</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('userHome')}}">I miei annunci</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('userCreate')}}">Inserisci annuncio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tagsHome')}}">TAGS del sito</a>
          </li>

          <form action="/logout" method="post">
            @csrf
            <button class="nav-link text-danger" type="submit">Esci</button>
          </form>
        @endif

        
      </ul>
    </div>
  </div>
</nav>