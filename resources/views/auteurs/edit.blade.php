@if (session('success'))
    <p style="font-size:1.3em; color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('auteur.update', ['id' => $auteur->id]) }}" method="POST">
    @csrf

    <label style="display: block;">
        @error('nom')
        ! {{ $message }}
        @enderror

        Nom <input name="nom" type="text"
            value="{{ old('nom', $auteur->nom) }}" />
    </label>
    <label style="display: block;">
        @error('prenom')
        ! {{ $message }}
        @enderror

        Pénom <input name="prenom" type="text"
            value="{{ old('prenom', $auteur->prenom) }}" />
    </label>
    <label style="display: block;">
        @error('ddn')
        ! {{ $message }}
        @enderror

        Date de naissance <input name="ddn" type="date"
            value="{{ old('ddn', $auteur->ddn) }}" />
    </label>
    <label style="display: block;">
        <input name="active" type="hidden" value="0" />
        Actif <input name="active" type="checkbox"
            value="1"
            {{ old('active', $auteur->active) ? 'checked' : '' }}
            />
    </label>

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <button>Sauvegarde</button>
</form>

<form action="{{ route('auteur.destroy', ['id' => $auteur->id]) }}" method="POST">
    @csrf

    <button>Supprimer</button>
</form>

<p>
    <a href="{{ route('auteur.editeur', ['id' => $auteur->id]) }}">
        Ajouter un éditeur
    </a>
</p>
