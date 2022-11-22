<form action="{{ route('publications.new') }}" method="POST">
    @csrf

    <label style="display: block;">
        @error('auteur_id')
        ! {{ $message }}
        @enderror

        Auteur
        <select name="auteur_id">
            <option>Veuillez choisir</option>
            @foreach ($auteurs as $auteur)
            <option value="{{ $auteur->id }}">{{ $auteur->nom }}, {{ $auteur->prenom }}</option>
            @endforeach
        </select>
    </label>
    <label style="display: block;">
        @error('titre')
        ! {{ $message }}
        @enderror

        Titre <input name="titre" type="text" value="{{ old('titre') }}" />
    </label>
    <label style="display: block;">
        @error('date_pub')
        ! {{ $message }}
        @enderror

        Date <input name="date_pub" type="date" value="{{ old('date_pub') }}" />
    </label>
    <label style="display: block;">
        @error('resume')
        ! {{ $message }}
        @enderror

        Résumé <textarea name="resume">{{ old('resume') }}</textarea>
    </label>

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <button>Create</button>
</form>
