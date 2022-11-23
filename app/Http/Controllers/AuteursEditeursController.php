<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Editeur;
use Illuminate\Http\Request;

class AuteursEditeursController extends Controller
{
    public function editeur(Request $request, $id)
    {
        return view('auteurs.editeur', [
            'auteur' => Auteur::findOrFail($id),
            'editeurs' => (Auteur::findOrFail($id))->editeur()->get()
        ]);
    }

    public function createEditeur(Request $request, $id)
    {
        $this->validateEditeur($request);

        // On assume que la requête
        $editeur = Editeur::create($request->all());
        $auteur = Auteur::findOrFail($id);
        $auteur->editeur()->attach($editeur->id);

        // Retourne un message de succès
        return "Vous avez ajouter l'editeur {$editeur->id} !";
    }

    private function validateEditeur(Request $request)
    {
        $request->validate([
            'nom' => 'required'
        ]);
    }
}
