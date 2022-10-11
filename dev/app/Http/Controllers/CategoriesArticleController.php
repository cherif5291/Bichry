<?php

namespace App\Http\Controllers;

use App\Models\CategoriesArticle;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
            //data

            $Categories = CategoriesArticle::where('entreprise_id', $EntrepriseID)->get();
            $PageName = "Catégories de produit";
            $type = "add";
            return view('entreprise.commerciale.articles.categorie', compact('Categories', 'PageName', 'type', 'Session'));
        } else {
            $Session = 0;

            $Categories = CategoriesArticle::where('entreprise_id', Auth::user()->entreprise_id)->get();
        $PageName = "Catégories de produit";
        $type = "add";
        return view('entreprise.commerciale.articles.categorie', compact('Categories', 'PageName', 'type', 'Session'));

        }


    }

    public function edit($id)
    {
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
            //data

            $Categories = CategoriesArticle::where('entreprise_id', $EntrepriseID)->get();
            $PageName = "Catégories de produit";
            $type = "edit";
            $Categorie = CategoriesArticle::find($id);
            return view('entreprise.commerciale.articles.categorie', compact('Categories', 'PageName', 'Categorie', 'type', 'Session'));
        } else {
            $Session = 0;

            $Categories = CategoriesArticle::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = "Catégories de produit";
            $type = "edit";
            $Categorie = CategoriesArticle::find($id);
            return view('entreprise.commerciale.articles.categorie', compact('Categories', 'PageName', 'Categorie', 'type', 'Session'));

        }


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'type'=>'required',
            'sub_categorie'=>'nullable',

        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =Auth::user()->entreprise_id;
        }
        $Categorie = new CategoriesArticle();
        $Categorie->entreprise_id= $EntrepriseID;
        $Categorie->type=$request->input('type');
        $Categorie->nom=$request->input('nom');
        $Categorie->sub_categorie=$request->input('sub_categorie');
        $Categorie->save();
        return back()->with('success', "Catégorie ajoutée avec succès sur la facture !");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom'=>'required',
            'type'=>'required',
            'sub_categorie'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =Auth::user()->entreprise_id;
        }
        $Categorie =  CategoriesArticle::find($id);
        $Categorie->entreprise_id=$EntrepriseID;
        $Categorie->type=$request->input('type');
        $Categorie->nom=$request->input('nom');
        $Categorie->sub_categorie=$request->input('sub_categorie');
        $Categorie->update();
        return back()->with('success', "Catégorie ajoutée avec succès sur la facture !");
    }

     public function destroy($id)
    {
       CategoriesArticle::find($id)->delete();
       return redirect(route('entreprise.commerciale.categories'))->with('success', "Catégorie Supprimé avec success");
    }
}
