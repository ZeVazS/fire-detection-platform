<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ZoneController extends Controller
{
    use AuthorizesRequests;

    /**
     * Lista todas as zonas do utilizador.
     */
    public function index(Request $request)
    {
        $zones = $request->user()->zones()->with('cameras')->get();
        return view('zones.index', compact('zones'));
    }

    /**
     * Formulário de criação de zona.
     */
    public function create()
    {
        $this->authorize('manage', Zone::class);
        return view('zones.create');
    }

    /**
     * Guardar nova zona.
     */
    public function store(Request $request)
    {
        $this->authorize('manage', Zone::class);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'gps' => 'required|string',
            'risco' => 'required|in:baixo,médio,alto',
        ]);

        $request->user()->zones()->create($validated);

        return redirect()->route('zones.index')->with('success', 'Zona criada com sucesso!');
    }

    /**
     * Mostrar zona específica.
     */
    public function show(Zone $zone)
    {
        $this->authorize('view', $zone);
        $zone->load('cameras');
        return view('zones.show', compact('zone'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(Zone $zone)
    {
        $this->authorize('manage', $zone);
        return view('zones.edit', compact('zone'));
    }

    /**
     * Atualizar zona.
     */
    public function update(Request $request, Zone $zone)
    {
        $this->authorize('manage', $zone);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'gps' => 'required|string',
            'risco' => 'required|in:baixo,médio,alto',
        ]);

        $zone->update($validated);

        return redirect()->route('zones.index')->with('success', 'Zona atualizada com sucesso!');
    }

    /**
     * Apagar zona.
     */
    public function destroy(Zone $zone)
    {
        $this->authorize('manage', $zone);
        $zone->delete();

        return redirect()->route('zones.index')->with('success', 'Zona eliminada!');
    }
}
