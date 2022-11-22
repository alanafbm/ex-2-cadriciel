<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Editeur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{

    
    public function index()
    {
        return view('auteurs.index', [
            'auteurs' => Auteur::active()->get()
        ]);
    }

    public function show(Request $request, $id)
    {
        return view('auteurs.show', [
            'auteur' => Auteur::findOrFail($id),
            'editeur' => Editeur::find(1)
        ]);
    }

    public function create(Request $request)
    {
        return view('auteurs.create');
    }

    public function createNew(Request $request)
    {
        $this->validateAuteur($request);

        // On assume que la requête
        $auteur = Auteur::create($request->all());

        // Retourne un message de succès
        return "Vous avez créé l'auteur {$auteur->id} !";
    }

    public function edit(Request $request, $id)
    {
        return view('auteurs.edit', [
            'auteur' => Auteur::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validateAuteur($request);

        // On assume que la requête
        $auteur = Auteur::findOrFail($id)->update($request->all());

        // Retourne au formulaire
        // return $this->edit($request, $id);
        return redirect()
            ->route('auteur.edit', ['id' => $id])
            ->withSuccess('Bravo!');
    }

    public function destroy(Request $request, $id)
    {
        Auteur::findOrFail($id)->delete();
        return redirect()->route('auteur.index');
    }

    // undo delete
    public function restore(Request $request, $id)
    {
        Auteur::withTrashed()->findOrFail($id)->restore();
        return redirect(route('auteur.index'));
    }

    private function validateAuteur(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'ddn' => 'required|before:now',
        ]);
    }
}
