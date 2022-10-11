<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Requests\InvitationStoreRequest;
use App\Http\Requests\InvitationUpdateRequest;
use App\Models\Control;
use App\Models\Entreprise;
use App\Models\InfosSystem;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Invitation::class);

        $search = $request->get('search', '');

        $invitations = Invitation::search($search)
            ->latest()
            ->paginate(5);

        return view('app.invitations.index', compact('invitations', 'search'));
    }

    public function sendInvitations()
    {

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

            $PageName = "Envoyer une invitation";
        return view('entreprise.comptable.invitations.invite', compact('PageName', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Envoyer une invitation";
            return view('entreprise.comptable.invitations.invite', compact('PageName', 'Session'));
        }

    }

    /**
     * @param \App\Http\Requests\InvitationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationStoreRequest $request)
    {
        $this->authorize('create', Invitation::class);

        $validated = $request->validated();

        $invitation = Invitation::create($validated);

        return redirect()
            ->route('invitations.edit', $invitation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        return view('app.invitations.show', compact('invitation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        return view('app.invitations.edit', compact('invitation'));
    }

    /**
     * @param \App\Http\Requests\InvitationUpdateRequest $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(
        InvitationUpdateRequest $request,
        Invitation $invitation
    ) {
        $this->authorize('update', $invitation);

        $validated = $request->validated();

        $invitation->update($validated);

        return redirect()
            ->route('invitations.edit', $invitation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Invitation $invitation)
    {
        $this->authorize('delete', $invitation);

        $invitation->delete();

        return redirect()
            ->route('invitations.index')
            ->withSuccess(__('crud.common.removed'));
    }



    public function sendInvitation(Request $request)
    {
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;

        }
        $objet = __('messages.invitation_from')." ". Entreprise::find($EntrepriseID)->nom_entreprise;
        $text1 = __('messages.invitation_from')." ". Entreprise::find($EntrepriseID)->nom_entreprise;
        $text2 = Auth::user()->prenom. " ".Auth::user()->nom ." ".  __('messages.from')." " . Entreprise::find($EntrepriseID)->nom_entreprise." ". __('messages.was_invite_you_to_collaborate') ." ". __('messages.in')." ". InfosSystem::find(1)->nom_plateforme;
        $LINK= route('accueil');
        $Have_account=  __('messages.already_have_account') ." ?";
        $SignIN_text= __('messages.add')." ". Entreprise::find($EntrepriseID)->nom_entreprise." ".__('messages.to_your')." ". InfosSystem::find(1)->nom_plateforme." ".__('messages.workspace')." ".__('messages.by_signing_using_link');
        $text3 = "Si vous avez des questions, vous pouvez simplement répondre à cet e-mail ou trouver nos coordonnées ci-dessous.
        Contactez-nous également sur :";
        $data = array($text1, $text2,  $LINK, $Have_account, $SignIN_text, $text3);
        sendInvitation($request->input('email'), $data, $objet,);

       if (Invitation::where('invitant_id', $EntrepriseID)->where('email', $request->input('email'))->first()) {
           return back()->with('error', "utilisateur déjà invité. utiliser un autre email ou dites à votre collaborateur de se connecter directement");
       } else {
        $invitation  = new Invitation();
        $invitation->invitant_id = $EntrepriseID;
        $invitation->email = $request->input('email');
        $invitation->save();
        return back()->with('success',__('messages.activation_email_sent'));
       }
       
       

        

        // return view('emails.invitation', compact('data'));
    }
}
