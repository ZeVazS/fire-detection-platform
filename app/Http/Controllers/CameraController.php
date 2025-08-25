<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CameraController extends Controller
{
    use AuthorizesRequests;

    /**
     * Lista todas as câmaras da zona.
     */
    public function index(Zone $zone)
    {
        $this->authorize('view', $zone);
        $cameras = $zone->cameras;
        return view('cameras.index', compact('zone', 'cameras'));
    }

    /**
     * Formulário para criar câmara.
     */
    public function create(Zone $zone)
    {
        $this->authorize('manage', $zone);
        return view('cameras.create', compact('zone'));
    }

    /**
     * Guardar nova câmara.
     */
    public function store(Request $request, Zone $zone)
    {
        $this->authorize('manage', $zone);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $zone->cameras()->create($validated);

        return redirect()->route('zones.cameras.index', $zone)->with('success', 'Câmara adicionada!');
    }

    /**
     * Mostrar câmara.
     */
    public function show(Zone $zone, Camera $camera)
    {
        $this->authorize('view', $zone);
        return view('cameras.show', compact('zone', 'camera'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(Zone $zone, Camera $camera)
    {
        $this->authorize('manage', $zone);
        return view('cameras.edit', compact('zone', 'camera'));
    }

    /**
     * Atualizar câmara.
     */
    public function update(Request $request, Zone $zone, Camera $camera)
    {
        $this->authorize('manage', $zone);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $camera->update($validated);

        return redirect()->route('zones.cameras.index', $zone)->with('success', 'Câmara atualizada!');
    }

    /**
     * Apagar câmara.
     */
    public function destroy(Zone $zone, Camera $camera)
    {
        $this->authorize('manage', $zone);
        $camera->delete();

        return redirect()->route('zones.cameras.index', $zone)->with('success', 'Câmara removida!');
    }
}
