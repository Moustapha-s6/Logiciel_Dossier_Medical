<?php

namespace App\Http\Controllers;

use App\Models\personel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personels = Personel::all();
        return view('Back.personnel.index', compact('personels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Back.personnel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'matricule'=>'required|max:100', 
            'nom'=>'required|max:150',
            'prenom'=>'required|max:150',
            'username'=>'required|max:150',
            'date'=>'required|max:150',
            'telephone'=>'required|max:150',
            'adresse'=>'required|max:150',
            'genre'=>'required|max:150',
            'role'=>'required|max:150',
            'email'=>'required|max:150',
            'statut'=>'required|max:150',
        ]);
        $save=new Personel;
        $save->matricule=$request->matricule;
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->username=$request->username;
        $save->date_adhesion=$request->date;
        $save->adresse=$request->adresse;
        $save->telephone=$request->telephone;
        $save->status=$request->statut;
        $save->genre=$request->genre;
        $save->email=$request->email;
        $save->role=$request->role;

        
        
        $save->save();
        return BACK()->with('message', "Le personel Médical a bien été cree !");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personel=Personel::findOrFail($id);
       return view('Back.personnel.show', compact('personel'));
       if($personel->etat==0)
       {
        $etat=1;
        $message='Client active';
       }
       else
        {
        $etat=0;
        $message='Client desactive';
       }
    $personel->etat=$etat;
    $personel->save();
    return Back()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personel=Personel::findOrFail($id);
        return view('Back.personnel.edit', compact('personel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'matricule'=>'required|max:100', 
            'nom'=>'required|max:150',
            'prenom'=>'required|max:150',
            'username'=>'required|max:150',
            'date'=>'required|max:150',
            'telephone'=>'required|max:150',
            'adresse'=>'required|max:150',
            'genre'=>'required|max:150',
            'role'=>'required|max:150',
            'email'=>'required|max:150',
            'statut'=>'required|max:150',
        ]);
        $save=Personel::find($id);
        $save->matricule=$request->matricule;
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->username=$request->username;
        $save->date_adhesion=$request->date;
        $save->adresse=$request->adresse;
        $save->telephone=$request->telephone;
        $save->status=$request->statut;
        $save->genre=$request->genre;
        $save->email=$request->email;
        $save->role=$request->role;

        
        
        $save->save();
        return BACK()->with('message', "Le personel Médical a bien été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     $personel=personel::findOrFail($id);
     $message='';
     $erreur='';
     if ($personel->etat==1) 
            {
            $message="Client Supprime avec success";
            $personel->delete();
             } 
            else{ $erreur="Suppression du client non autorise";}
            if ($message!='') 
            { return BACK()->with('message', $message);}
           else
           { return BACK()->with('erreur', $erreur);}
    }
}
