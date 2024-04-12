<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;

class AppointementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('Back.rendez_vous.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Back.rendez_vous.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData=$request->validate([
            'matricule'=>'required|max:100', 
            'nom'=>'required|max:150',
            'departement'=>'required|max:150',
            'medecin'=>'required|max:150',
            'date'=>'required|max:150',
            'telephone'=>'required|max:150',
            'temps'=>'required|max:150',
            'statut'=>'required|max:150',
            'message'=>'required|max:150',
            'email'=>'required|max:150',
            
        ]);
        $save=new Appointment;
        $save->matricule=$request->matricule;
        $save->nom_patient=$request->nom;
        $save->departement=$request->departement;
        $save->medecin=$request->medecin;
        $save->date_rv=$request->date;
        $save->temps=$request->temps;
        $save->telephone_patient=$request->telephone;
        $save->status=$request->statut;
        $save->message=$request->message;
        $save->email_patient=$request->email;

        
        
        $save->save();
        return BACK()->with('message', "Le Rendez_vous a bien été cree !");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment=Appointment::findOrFail($id);
       return view('Back.rendez_vous.show', compact('appointment'));
       if($appointment->etat==0)
       {
        $etat=1;
        $message='Client active';
       }
       else
        {
        $etat=0;
        $message='Client desactive';
       }
    $appointment->etat=$etat;
    $appointment->save();
    return Back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment=Appointment::findOrFail($id);
         return view('Back.rendez_vous.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'matricule'=>'required|max:100', 
            'nom'=>'required|max:150',
            'departement'=>'required|max:150',
            'medecin'=>'required|max:150',
            'date'=>'required|max:150',
            'telephone'=>'required|max:150',
            'temps'=>'required|max:150',
            'statut'=>'required|max:150',
            'message'=>'required|max:150',
            'email'=>'required|max:150',
            
        ]);
        $save=Appointment::find($id);
        $save->matricule=$request->matricule;
        $save->nom_patient=$request->nom;
        $save->departement=$request->departement;
        $save->medecin=$request->medecin;
        $save->date_rv=$request->date;
        $save->temps=$request->temps;
        $save->telephone_patient=$request->telephone;
        $save->status=$request->statut;
        $save->message=$request->message;
        $save->email_patient=$request->email;

        
        
        $save->save();
        return BACK()->with('message', "Le Rendez_vous a bien été Modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy( $id)
    {
     $appointment=Appointment::findOrFail($id);
     $message='';
     $erreur='';
     if ($appointment->etat==1) 
            {
            $message="Client Supprime avec success";
            $appointment->delete();
             } 
            else{ $erreur="Suppression du client non autorise";}
            if ($message!='') 
            { return BACK()->with('message', $message);}
           else
           { return BACK()->with('erreur', $erreur);}
    }
}