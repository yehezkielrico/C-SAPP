<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    public function index()
    {
        // Only show non-deleted simulations for admin
        $simulations = Simulation::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.simulations.index', compact('simulations'));
    }

    public function create()
    {
        return view('admin.simulations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scenario' => 'required|string',
            'type' => 'required|string',
            'steps' => 'required|array|min:1',
            'steps.*' => 'required|string',
            'options' => 'required|array|min:1',
            'options.*' => 'required|array|min:2',
            'options.*.*' => 'required|string',
            'correct_answers' => 'required|array|min:1',
            'correct_answers.*' => 'required|integer|min:0',
            'is_published' => 'nullable',
        ]);

        // Convert options from associative array to indexed array
        $options = [];
        foreach ($request->options as $stepOptions) {
            $options[] = array_values($stepOptions);
        }

        // Convert correct_answers to integers
        $correctAnswers = array_map('intval', $request->correct_answers);

        Simulation::create([
            'title' => $request->title,
            'description' => $request->description,
            'scenario' => $request->scenario,
            'type' => $request->type,
            'steps' => $request->steps,
            'options' => $options,
            'correct_answers' => $correctAnswers,
            'is_published' => (bool) $request->is_published,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.simulations.index')
            ->with('success', 'Simulasi berhasil dibuat!');
    }

    public function edit(Simulation $simulation)
    {
        return view('admin.simulations.edit', compact('simulation'));
    }

    public function update(Request $request, Simulation $simulation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scenario' => 'required|string',
            'type' => 'required|string',
            'steps' => 'required|array|min:1',
            'steps.*' => 'required|string',
            'options' => 'required|array|min:1',
            'options.*' => 'required|array|min:2',
            'options.*.*' => 'required|string',
            'correct_answers' => 'required|array|min:1',
            'correct_answers.*' => 'required|integer|min:0',
            'is_published' => 'nullable',
        ]);

        // Convert options from associative array to indexed array
        $options = [];
        foreach ($request->options as $stepOptions) {
            $options[] = array_values($stepOptions);
        }

        // Convert correct_answers to integers
        $correctAnswers = array_map('intval', $request->correct_answers);

        $simulation->update([
            'title' => $request->title,
            'description' => $request->description,
            'scenario' => $request->scenario,
            'type' => $request->type,
            'steps' => $request->steps,
            'options' => $options,
            'correct_answers' => $correctAnswers,
            'is_published' => (bool) $request->is_published,
        ]);

        return redirect()->route('admin.simulations.index')
            ->with('success', 'Simulasi berhasil diperbarui!');
    }

    public function destroy(Simulation $simulation)
    {
        $simulation->delete();

        return redirect()->route('admin.simulations.index')
            ->with('success', 'Simulasi berhasil dihapus!');
    }
}
