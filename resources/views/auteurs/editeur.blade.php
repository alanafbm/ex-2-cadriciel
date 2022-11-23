@foreach ($editeurs as $editeur)
    
<ul>
    <li>{{ $editeur->nom }}</li><!-- Afficher ici la liste des éditeurs reliés à cet auteur -->
</ul>

@endforeach

<form action="{{ route('auteur.createEditeur', ['id' => $auteur->id]) }}" method="POST">
    @csrf

    @error('nom')
    Svp écrire un nom d'editeur!
    @enderror
    <br>
    <br>
<label>
    Nom <input name="nom" type="text" value="{{ old('nom') }}" />
</label>
    <button>Ajouter</button>
</form>