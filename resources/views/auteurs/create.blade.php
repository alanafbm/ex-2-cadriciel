<form action="{{ route('auteur.new') }}" method="POST">
    @csrf

    <label style="display: block;">
        @error('nom')
        ! {{ $message }}
        @enderror

        Nom <input name="nom" type="text" value="{{ old('nom') }}" />
    </label>
    <label style="display: block;">
        @error('prenom')
        ! {{ $message }}
        @enderror

        Pénom <input name="prenom" type="text" value="{{ old('prenom') }}" />
    </label>
    <label style="display: block;">
        @error('ddn')
        ! {{ $message }}
        @enderror

        Date de naissance <input name="ddn" type="date" value="{{ old('ddn') }}" />
    </label>
    <label style="display: block;">
        <input name="active" type="hidden" value="0" />
        Actif <input name="active" type="checkbox"
            value="1"
            {{ old('active') ? 'checked' : '' }}
            />
    </label>

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <button>Create</button>
</form>
