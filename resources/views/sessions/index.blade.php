<p>
    @if ($laSession)
        {{ $laSession }}
    @else
         Aucune valeur
    @endif
    </p>
    
    <form action="" method="POST">
        @csrf
        <button>Incrementer</button>
    </form>
    