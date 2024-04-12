<?php

namespace App\Http\Controllers;

use App\Models\dossierpatient;
use Illuminate\Http\Request;

class DossierPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $dossierpatients = DossierPatient::all();
        return view('Back.dossierpatient.index', compact('dossierpatients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Back.dossierpatient.create');     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
             
            'nom'=>'required|max:150',
            'prenom'=>'required|max:150',
            'nationalite'=>'required|max:150',
            'date'=>'required|max:150',
            'adresse'=>'required|max:150',
            'lieu'=>'required|max:150',
            'nom_du_pere'=>'required|max:150',
            'nom_de_la_mere'=>'required|max:150',
            'email'=>'required|max:150',
            'sexe'=>'required|max:150',
            'groupe'=>'required|max:150',
            'antecedant'=>'required|max:150',
            'observation'=>'required|max:150',
            'allergie'=>'required|max:150',


            
        ]);
        $save=new DossierPatient;
        
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->nationalite=$request->nationalite;
        $save->date_naissance=$request->date;
        $save->adresse=$request->adresse;
        $save->lieu_naissance=$request->lieu;
        $save->nom_du_pere=$request->nom_du_pere;
        $save->nom_de_la_mere=$request->nom_de_la_mere;
        $save->email=$request->email;
        $save->sexe=$request->sexe;
        $save->groupe_sanguin=$request->groupe;
        $save->observation_medical=$request->observation;
        $save->allergies=$request->allergie;
        $save->antecedants=$request->antecedant;

             $save->save();
        return BACK()->with('message', "Le Dossier du patient a bien été crée !");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       $dossierpatient=DossierPatient::findOrFail($id);
       return view('BACK.dossierpatient.show', compact('dossierpatient'));
       if($dossierpatient->etat==0)
       {
        $etat=1;
        $message='Client active';
       }
       else
        {
        $etat=0;
        $message='Client desactive';
       }
    $dossierpatient->etat=$etat;
    $dossierpatient->save();
    return BACK()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dossierpatient=DossierPatient::findOrFail($id);
        return view('Back.dossierpatient.edit', compact('dossierpatient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            
            'nom'=>'required|max:150',
            'prenom'=>'required|max:150',
            'nationalite'=>'required|max:150',
            'date'=>'required|max:150',
            'adresse'=>'required|max:150',
            'lieu'=>'required|max:150',
            'nom_du_pere'=>'required|max:150',
            'nom_de_la_mere'=>'required|max:150',
            'email'=>'required|max:150',
            'sexe'=>'required|max:150',
            'groupe'=>'required|max:150',
            'antecedant'=>'required|max:150',
            'observation'=>'required|max:150',
            'allergie'=>'required|max:150',


            
        ]);
        $save=DossierPatient::find($id);
        
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->nationalite=$request->nationalite;
        $save->date_naissance=$request->date;
        $save->adresse=$request->adresse;
        $save->lieu_naissance=$request->lieu;
        $save->nom_du_pere=$request->nom_du_pere;
        $save->nom_de_la_mere=$request->nom_de_la_mere;
        $save->email=$request->email;
        $save->sexe=$request->sexe;
        $save->groupe_sanguin=$request->groupe;
        $save->observation_medical=$request->observation;
        $save->allergies=$request->allergie;
        $save->antecedants=$request->antecedant;

             $save->save();
        return BACK()->with('message', "Le Dossier du patient a bien été crée !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dossierdossierpatient $dossierdossierpatient)
    {
        //
    }
}
