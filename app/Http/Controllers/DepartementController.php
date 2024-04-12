<?php

namespace App\Http\Controllers;

use App\Models\departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return view('Back.departement.index', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Back.departement.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nom'=>'required|max:100', 
            'description'=>'required|max:150',
            'statut'=>'required|max:150',
            
        ]);
        $save=new Departement;
        $save->nom_departement=$request->nom;
        $save->description=$request->description;
        $save->status=$request->statut;

        
        
        $save->save();
        return BACK()->with('message', "Le département a bien été cree !");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $departement=Departement::findOrFail($id);
       return view('Back.departement.show', compact('departement'));
       if($departement->etat==0)
       {
        $etat=1;
        $message='Client active';
       }
       else
        {
        $etat=0;
        $message='Client desactive';
       }
    $departement->etat=$etat;
    $departement->save();
    return Back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departement=Departement::findOrFail($id);
        return view('Back.departement.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'nom'=>'required|max:100', 
            'description'=>'required|max:150',
            'statut'=>'required|max:150',
            
        ]);
        $save=Departement::find($id);
        $save->nom_departement=$request->nom;
        $save->description=$request->description;
        $save->status=$request->statut;

        
        
        $save->save();
        return BACK()->with('message', "Le département a bien été Modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departement $departement)
    {
        //
    }
}
