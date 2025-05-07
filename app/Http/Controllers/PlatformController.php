<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Movie;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;

class PlatformController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutte le piattaforme dal database, query al database
        $platforms = Platform::all();

        // Restituisce la vista 'platform.index' con i dati delle piattaforme
        return view('platform.index', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Restituisce la vista 'platform.create' per creare una nuova piattaforma
        return view('platform.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatformRequest $request)
    {
        $platform = Platform::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $request->file('logo')->store('logo', 'public'),
        ]);
        // Reindirizza alla pagina delle piattaforme con un messaggio di successo
        return redirect(route('platform.index'))->with('success', 'Piattaforma creata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        // Restituisce la vista 'platform.show' con i dati della piattaforma specificata
        return view('platform.show', compact('platform'));
    }

    /**
     * Mostra la form per modificare le piattaforme di un film.
     */
    public function editMoviePlatforms($movieId)
    {
        $movie = Movie::find($movieId);
        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Film non trovato.');
        }
        $platforms = Platform::all();
        return view('platform.edit_movie_platforms', compact('movie', 'platforms'));
    }

    /**
     * Aggiorna le piattaforme associate a un film.
     */
    public function updateMoviePlatforms(Request $request, $movieId)
    {
        $movie = Movie::find($movieId);
        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Film non trovato.');
        }
        $movie->platforms()->sync($request->input('platforms', []));
        return redirect()->route('movies.show', $movieId)->with('success', 'Piattaforme aggiornate con successo.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platform $platform)
    {
        // Restituisce la vista 'platform.edit' con i dati della piattaforma da modificare
        return view('platform.edit', compact('platform'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        $platform->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $request->file('logo')->store('logo', 'public'),
        ]);
        return redirect(route('platform.index'))->with('success', 'Piattaforma aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        //
    }
}
