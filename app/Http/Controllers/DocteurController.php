<?php

namespace App\Http\Controllers;

use App\Models\docteur;
use Illuminate\Http\Request;
use Image;
use Intervention\Image\Exception\NotReadebleException;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docteurs = Docteur::all();
        return view('Back.docteur.index', compact('docteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Back.docteur.create'); 
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
            'age'=>'required|max:150',
            'email'=>'required|max:150',
            'statut'=>'required|max:150',
            'pays'=>'required|max:150',
            'ville'=>'required|max:150',
            'profession'=>'required|max:150',
            'bio'=>'required|max:150',


            
        ]);
        $save=new Docteur;
        $save->matricule=$request->matricule;
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->username=$request->username;
        $save->datenaissance=$request->date;
        $save->adresse=$request->adresse;
        $save->telephone=$request->telephone;
        $save->status=$request->statut;
        $save->genre=$request->genre;
        $save->email=$request->email;
        $save->age=$request->age;
        $save->pays=$request->pays;
        $save->ville=$request->ville;
        $save->profession=$request->profession;
        $save->biographie=$request->bio;

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='moustapha'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/imagesdocteurs');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/imagesdocteurs');
            $save->image=$filename;
        }
        else{ 
        return $request;
        $save->image='';
    }

        
        
        $save->save();
        return BACK()->with('message', "Le Medecin a bien été crée !");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $docteur=Docteur::findOrFail($id);
       return view('Back.docteur.show', compact('docteur'));
       if($docteur->etat==0)
       {
        $etat=1;
        $message='Client active';
       }
       else
        {
        $etat=0;
        $message='Client desactive';
       }
    $docteur->etat=$etat;
    $docteur->save();
    return BACK()->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docteur=Docteur::findOrFail($id);
        return view('Back.docteur.edit', compact('docteur'));
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
            'age'=>'required|max:150',
            'email'=>'required|max:150',
            'statut'=>'required|max:150',
            'pays'=>'required|max:150',
            'ville'=>'required|max:150',
            'profession'=>'required|max:150',
            'bio'=>'required|max:150',


            
        ]);
        $save=Docteur::find($id);
        $save->matricule=$request->matricule;
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->username=$request->username;
        $save->datenaissance=$request->date;
        $save->adresse=$request->adresse;
        $save->telephone=$request->telephone;
        $save->status=$request->statut;
        $save->genre=$request->genre;
        $save->email=$request->email;
        $save->age=$request->age;
        $save->pays=$request->pays;
        $save->ville=$request->ville;
        $save->profession=$request->profession;
        $save->biographie=$request->bio;

        if($request->hasfile('image')){
        $request->validate(['image'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048']);
        $image=Docteur::find($request->id);
        $rfile="uploads/imagesdocteurs/" .$image->image;
        
        $check=@fopen($rfile, 'r');
        if(!$check){

        }
            else{
                unlink("uploads/imagesdocteurs/" .$image->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='moustapha'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/imagesdocteurs');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/imagesdocteurs');
            $save->image=$filename;
        
             }
        $save->save();
        return BACK()->with('message', "Le Docteur a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(docteur $docteur)
    {
        //
    }
}
