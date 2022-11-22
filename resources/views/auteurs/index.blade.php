@foreach ($auteurs as $auteur)
    <div>
        <a href="{{ route('auteur.show', ['id' => $auteur->id ]) }}">
            {{ $auteur->nom }}
        </a>
        -
        <a href="{{ route('auteur.edit', ['id' => $auteur->id ]) }}">
            Éditer
        </a>
    </div>
@endforeach

<a href="{{ route('auteur.create') }}">
    Créer un nouvel auteur
</a>