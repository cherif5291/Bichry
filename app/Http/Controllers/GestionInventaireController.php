<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use App\Models\Article;
use App\Models\Control;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\SessionControl;
use App\Models\Comptescomptable;
use App\Models\CategoriesArticle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

class GestionInventaireController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    
    public function stocks(Request $request)
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
            $ComptesComptables = Comptescomptable::where('entreprise_id',$EntrepriseID)->get();
            $Taxes = Taxe::where('entreprise_id',$EntrepriseID)->get();
            $type = "add";
            $choice = "stock";
            $choiceStock = "stock";

            $PageName = "Produits & service";
            $Articles = Article::where('entreprise_id',$EntrepriseID)->get();
            $Categories = CategoriesArticle::where('entreprise_id',$EntrepriseID)->get();
            return view('entreprise.inventaire.index', compact('Categories','Taxes','ComptesComptables','Articles','Session','type','choice','choiceStock'));
        } else {
            $Session = 0;
            $ComptesComptables = Comptescomptable::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $Taxes = Taxe::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $type = "add";
            $choice = "stock";
            $choiceStock = "stock";
 $sum=DB::table('articles')->sum('stock','qte_initiale');

            $PageName = "Produits & service";
            $Articles = Article::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $Categories = CategoriesArticle::where('entreprise_id',Auth::user()->entreprise_id)->get();
            return view('entreprise.inventaire.index', compact('sum','Categories','Taxes','ComptesComptables','Articles','Session','type','choice','choiceStock'));

        }


        //$this->authorize('view-any', Article::class);

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

            $ComptesComptables = Comptescomptable::where('entreprise_id',$EntrepriseID)->get();
            $Taxes = Taxe::where('entreprise_id',$EntrepriseID)->get();
            $type = "edit";
            // $PageName = "Produits & service";
            $Article = Article::find($id);
            $Articles = Article::where('entreprise_id',$EntrepriseID)->get();
            $Categories = CategoriesArticle::where('entreprise_id',$EntrepriseID)->get();
            $choice = $Article->type;
            return view('entreprise.inventaire.index', compact('Categories','Taxes','ComptesComptables','type','Articles', 'Article', 'choice', 'Session'));
        } else {
            $Session = 0;

            $ComptesComptables = Comptescomptable::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $Taxes = Taxe::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $type = "edit";
            $PageName = "Produits & service";
            $Article = Article::find($id);
            $Articles = Article::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $Categories = CategoriesArticle::where('entreprise_id',Auth::user()->entreprise_id)->get();
            $choice = $Article->type;
            return view('entreprise.inventaire.index', compact('Categories','Taxes','ComptesComptables','type','Articles', 'Article', 'choice', 'Session'));

        }


        //$this->authorize('view-any', Article::class);

    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'description'=>'nullable',
            'taxe_id'=>'nullable',
            'image'=>'nullable',
            'comptes_comptable_id'=>'nullable',
            'entreprise_id'=>'nullable',
            'stock'=>'nullable',
            'prix_unitaire'=>'nullable',
            'type'=>'nullable',
            'qte_initiale'=>'nullable',
            'date_debut_stock'=>'nullable',
            'prix_achat'=>'nullable',
            'comptes_achat_id'=>'nullable',
            'comptes_vente_id'=>'nullable'

        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Article = new Article();
        $Article->entreprise_id=$EntrepriseID;
        $Article->description=$request->input('description');
        $Article->prix_unitaire=$request->input('prix_unitaire');
        $Article->stock=$request->input('stock');
        $Article->comptes_comptable_id=$request->input('comptes_comptable_id');
        $Article->taxe_id=$request->input('taxe_id');
        $Article->nom=$request->input('nom');
        $Article->type=$request->input('type');
        $Article->qte_initiale=$request->input('qte_initiale');
        $Article->date_debut_stock=$request->input('date_debut_stock');
        $Article->prix_achat=$request->input('prix_achat');
        $Article->comptes_achat_id=$request->input('comptes_achat_id');
        $Article->comptes_vente_id=$request->input('comptes_vente_id');
        


        if ($request->hasFile('image')) {

            $logo = time().'.'.$request->image->getClientOriginalExtension();
            $path_name = 'storage/uploads/article/images/'. date('Y')."/". date('F'). '/';

            if ($request->image->move($path_name, $logo)) {
                $Article->image = $path_name.$logo;
            }

        }
        $Article->save();
        return back()->with('success', "Article ajouté avec succès !");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom'=>'required',
            'description'=>'nullable',
             'qte_initiale'=>'nullable',
            'image'=>'nullable',
            'comptes_comptable_id'=>'nullable',
            'entreprise_id'=>'nullable',
            'stock'=>'nullable',
            'prix_unitaire'=>'nullable',
            'type'=>'required',
             'taxe_id'=>'nullable',
            'date_debut_stock'=>'nullable',
            'prix_achat'=>'nullable',
            'comptes_achat_id'=>'nullable',
            'comptes_vente_id'=>'nullable'


        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Article =  Article::find($id);
        $Article->entreprise_id=$EntrepriseID;
        $Article->description=$request->input('description');
        $Article->type=$request->input('type');
        $Article->qte_initiale=$request->input('qte_initiale');
        $Article->prix_unitaire=$request->input('prix_unitaire');
        $Article->stock=$request->input('stock');
        $Article->comptes_comptable_id=$request->input('comptes_comptable_id');
        $Article->taxe_id=$request->input('taxe_id');
        $Article->nom=$request->input('nom');
        $Article->date_debut_stock=$request->input('date_debut_stock');
        $Article->prix_achat=$request->input('prix_achat');
        $Article->comptes_achat_id=$request->input('comptes_achat_id');
        $Article->comptes_vente_id=$request->input('comptes_vente_id');
        if ($request->hasFile('image')) {

            $logo = time().'.'.$request->image->getClientOriginalExtension();
            $path_name = 'storage/uploads/article/images/'. date('Y')."/". date('F'). '/';

            if ($request->image->move($path_name, $logo)) {
                $Article->image = $path_name.$logo;
            }

        }
        $Article->update();
        return redirect()->route('entreprise.inventaire.stocks')->with('success', "Stock mise à jour avec succès !");
    }



    

    public function destroy($id)
    {
        Article::find($id)->delete();
        
        return redirect()->route('entreprise.inventaire.stocks')->withSuccess(__('Stock supprime avec succès'));
    }
}
