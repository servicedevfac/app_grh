<?php

namespace App\Http\Controllers;

// use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use App\Models\Recrutement;

class RecrutementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recrutements = Recrutement::all();
        $service = Service::all();
        return view('recrutement.liste', compact('recrutements', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = Service::all();
        return view('recrutement.creer', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_contrat' => 'required|in:CDI,CDD,Stage',
            'date_limite' => 'required|date',
            'service_id' => 'required|exists:services,id'
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'type_contrat.required' => 'Le type de contrat est obligatoire.',
            'type_contrat.in' => 'Le type de contrat doit être l\'un des suivants : CDI, CDD, Stage.',
            'date_limite.required' => 'La date limite est obligatoire.',
            'date_limite.date' => 'La date limite doit être une date valide.',
            'service_id.required' => 'Le service est obligatoire.',
            'service_id.exists' => 'Le service sélectionné est invalide.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Creation logic
        
        Recrutement::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'type_contrat' => $request->type_contrat,
            'date_limite' => $request->date_limite,
            'service_id' => $request->service_id,
            'statut' => 'ouvert',
        ]);
        return redirect()->route('recrutement.liste')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
