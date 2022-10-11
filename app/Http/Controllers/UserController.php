<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Langue;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Abonnement;
use App\Models\Control;
use App\Models\EmployesEntreprise;
use App\Models\Entreprise;
use App\Models\Habilitation;
use App\Models\Package;
use App\Models\SessionControl;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function __construct()
  {
    //its just a dummy data object.
    $user = User::all();

    // Sharing is caring
    view()->share('user', $user);
  }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function editUserEntreprise(Request $request, $id)
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

            $Users = User::all();
            $Langues  = Langue::all();
            $PageName = "Utilisateurs";
            $Employes = EmployesEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Habilitations = Habilitation::all();
            return view('entreprise.parametres.utilisateurs.index', compact('Users', 'Langues', 'PageName', 'Employes', 'Habilitations', 'Session'));
        } else {
            $Session = 0;

            $Users = User::all();
            $Langues  = Langue::all();
            $PageName = "Utilisateurs";
            $Employes = EmployesEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Habilitations = Habilitation::all();
            return view('entreprise.parametres.utilisateurs.index', compact('Users', 'Langues', 'PageName', 'Employes', 'Habilitations', 'Session'));
        }

    }

    public function index(Request $request)
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

            $Users = User::all();
            $Langues  = Langue::all();
            $PageName = "Utilisateurs";
            $Employes = EmployesEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Habilitations = Habilitation::all();
            return view('entreprise.parametres.utilisateurs.index', compact('Users', 'Langues', 'PageName', 'Employes', 'Habilitations', 'Session'));
        } else {
            $Session = 0;

            $Users = User::all();
            $Langues  = Langue::all();
            $PageName = "Utilisateurs";
            $Employes = EmployesEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Habilitations = Habilitation::all();
            return view('entreprise.parametres.utilisateurs.index', compact('Users', 'Langues', 'PageName', 'Employes', 'Habilitations', 'Session'));
        }


    }

    public function createEntrepriseInvitationUser(Request $request)
    {
        $this->validate($request, [
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'nullable',
            'portable'=>'nullable',
            'habilitation_id'=>'required',


        ]);
        $EntrepriseID =0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        }else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $User = new User();
        $User->prenom= $request->input('prenom');
        $User->nom= $request->input('nom');
        $User->email= $request->input('email');
        $User->entreprise_id= $EntrepriseID;
        $User->habilitation_id= $request->input('habilitation_id');

        $User->langue_id= 1;
        $User->password= Hash::make("12345678");
        $User->save();
        return back()->with('success', "Utilisateurs Ajouter avec success!");
    }

    public function getstarted(Request $request)
    {
        $this->validate($request, [
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'nullable',
            'telephone'=>'nullable',
            'nom_entreprise'=>'required',
            'email_entreprise'=>'required',
            'telephone_entreprise'=>'required',
            'pack'=>'required',

            'pass1'=>'required',
            'pass2'=>'required',


        ]);
        $Entreprise = new Entreprise();
        $Entreprise->nom_entreprise =$request->input('nom_entreprise');
        $Entreprise->email =$request->input('email_entreprise');
        $Entreprise->telephone =$request->input('telephone_entreprise');
        $Entreprise->save();
        $Abonnement = new Abonnement();
        $Abonnement->entreprise_id =  $Entreprise->id;
        $package = Package::all();

        for ($i=0; $i < $package->count(); $i++) {
            if ($request->input('pack') == $package[$i]->stripe_id) {
                $Abonnement->package_id =  $package[$i]->id;
            }
        }

        $Abonnement->expiration =  "2012-09-19";
        $Abonnement->save();


        $User = new User();
        $User->prenom= $request->input('prenom');
        $User->nom= $request->input('nom');
        $User->email= $request->input('email');
        $User->role= "entreprise";
        $User->entreprise_id= $Entreprise->id;
        $User->habilitation_id= 1;

        $User->langue_id= 1;
        if ($request->input('pass1') == $request->input('pass2')) {
            $User->password= Hash::make($request->input('pass1'));
        }else {
            return back()->with('error', "vos mots de passe ne correspondent pas !");
        }
        $User->save();
        return redirect(route('login'))->with('success', "Inscription réussi, vous pouvez à présent vous connectez !");

    }

    public function updateUserEntreprise(Request $request, $id)
    {
        $this->validate($request, [

            'habilitation_id'=>'required',
            'email'=>'nullable',
            'resetpass'=>'nullable',
        ]);
        $User =  User::find($id);
        $User->email= $request->input('email');
        $User->entreprise_id= Auth::user()->entreprise_id;
        $User->habilitation_id= $request->input('habilitation_id');
        $User->langue_id= 1;
        if ($request->input('resetpass') == 1) {
            $User->password= Hash::make("@Bilanpro");
        }
        $User->save();
        return back()->with('success', "Utilisateurs modifier avec success!");
    }

    public function createEntrepriseEmployeUser(Request $request)
    {
        $this->validate($request, [

            'employes_entreprise_id'=>'nullable',
            'habilitation_id'=>'required',

        ]);
        $Employe = EmployesEntreprise::find($request->input('employes_entreprise_id'));
        $User = new User();
        $User->prenom= $Employe->prenom;
        $User->nom= $Employe->nom;
        $User->email= $Employe->email;
        $User->telephone= $Employe->telephone;
        $User->habilitation_id= $request->input('habilitation_id');
        $User->entreprise_id=  Auth::user()->entreprise_id;
        $User->langue_id= 1;
        $User->password= Hash::make("12345678");
        $User->save();
        return back()->with('success', "Utilisateurs Ajouter avec success!");
    }

    public function infosChange(Request $request)
    {
        $this->validate($request, [
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'nullable',
            'telephone'=>'required',
            'portable'=>'nullable',
            'langue_id'=>'required',
            'pays'=>'nullable',
            'ville'=>'nullable',
            'province'=>'nullable',
            'code_postale'=>'nullable',
            'adresse'=>'nullable',
            'avatar'=>'avatar',

        ]);
        $User = User::find(Auth::user()->id);
        $User->prenom=$request->input('prenom');
        $User->nom=$request->input('nom');
        $User->email=$request->input('email');
        $User->telephone=$request->input('telephone');
        $User->portable=$request->input('portable');
        $User->langue_id=$request->input('langue_id');
        $User->pays=$request->input('pays');
        $User->ville=$request->input('ville');
        $User->province=$request->input('province');
        $User->code_postale=$request->input('code_postale');
        $User->adresse=$request->input('adresse');

        if ($request->hasFile('avatar')) {

            $logo = time().'.'.$request->avatar->getClientOriginalExtension();
            $path_name = 'storage/uploads/user/'. date('Y')."/". date('F'). '/';

            if ($request->avatar->move($path_name, $logo)) {
                $User->avatar = $path_name.$logo;
            }
        }
        $User->update();
        return back()->with('success', "information modifier avec succès !");
    }

    public function passwordChange(Request $request)
    {
        $this->validate($request, [
            'newpass'=>'required',
            'confirmpass'=>'required',

        ]);
        $User = User::find(Auth::user()->id);
        $newpass = $request->input('newpass');
        $confirmpass = $request->input('confirmpass');

        if ($newpass == $confirmpass) {
            $User->password=Hash::make($request->input('newpass'));
            $User->update();
            return back()->with('success', "Mot de passe modifier avec succès !");
        } else {
            return back()->with('error', "Les mots de passe ne correspondent pas !");
        }


    }
    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $user->syncRoles($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $this->authorize('view', $user);

        return view('app.users.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $langues = Langue::pluck('nom', 'id');

        $roles = Role::get();

        return view('app.users.edit', compact('user', 'langues', 'roles'));
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        $user->syncRoles($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(route('entreprise.utilisateurs'))->with('success', "Utilisateurs supprimer avec succès");
    }

    public function newAdmin()
    {
        $Is_selected = 4;
        $Users = User::where('role', 'admin')->get();
        return view('admin.parametres.utilisateurs.add', compact('Is_selected', 'Users'));
    }

    public function editAdmin($id)
    {
        $Is_selected = 4;
        $Users = User::where('role', 'admin')->get();
        $user = User::find($id);
        return view('admin.parametres.utilisateurs.edit', compact('Is_selected', 'Users', 'user'));
    }

    public function storeAdmin(Request $request)
    {
        $this->validate($request, [
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'required',

        ]);

        $User = new User();
        $User->prenom= $request->prenom;
        $User->nom= $request->nom;
        $User->email= $request->email;
        $User->role=  "admin";
        $User->langue_id= 1;
        $User->password= Hash::make("@Bilanpro");
        $User->save();

        return back()
        ->withSuccess(__('utilisateur créer avec succès'));
    }
}
