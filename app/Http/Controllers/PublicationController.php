<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Publication::query();

        $request->validate([
            'limit' => 'required|gt:0'
        ]);

        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->get('sort')) {
            $query->orderBy('id', $request->get('sort'));
        }

        if ($request->get('filter')) {
            $query->where('titre', 'like', '%' . $request->get('filter') . '%');
        }

        return $query->get();
    }

    public function show(Request $request, $id)
    {
        return Publication::find($id);
    }

    public function create(Request $request)
    {
        return view('publications.create', [
            'auteurs' => Auteur::all()
        ]);
    }

    public function createNew(Request $request)
    {
        $request->validate([
            'auteur_id' => 'required|gt:0',
            'titre' => 'required|max:255',
            'resume' => 'nullable',
            'date_pub' => 'before:today'
        ]);

        Publication::create($request->all());

        return 'Bravo!';
    }
}
