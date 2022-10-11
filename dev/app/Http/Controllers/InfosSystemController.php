<?php

namespace App\Http\Controllers;

use App\Models\InfosSystem;
use Illuminate\Http\Request;
use App\Http\Requests\InfosSystemStoreRequest;
use App\Http\Requests\InfosSystemUpdateRequest;

class InfosSystemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', InfosSystem::class);

        $search = $request->get('search', '');

        $infosSystems = InfosSystem::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.infos_systems.index',
            compact('infosSystems', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', InfosSystem::class);

        return view('app.infos_systems.create');
    }

    /**
     * @param \App\Http\Requests\InfosSystemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfosSystemStoreRequest $request)
    {
        $this->authorize('create', InfosSystem::class);

        $validated = $request->validated();

        $infosSystem = InfosSystem::create($validated);

        return redirect()
            ->route('infos-systems.edit', $infosSystem)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InfosSystem $infosSystem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InfosSystem $infosSystem)
    {
        $this->authorize('view', $infosSystem);

        return view('app.infos_systems.show', compact('infosSystem'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InfosSystem $infosSystem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InfosSystem $infosSystem)
    {
        $this->authorize('update', $infosSystem);

        return view('app.infos_systems.edit', compact('infosSystem'));
    }

    /**
     * @param \App\Http\Requests\InfosSystemUpdateRequest $request
     * @param \App\Models\InfosSystem $infosSystem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nom_plateforme'=>'required',
            'description'=>'required|nullable',

            'logo'=>'nullable',
            'logo_white'=>'nullable',
            'fav_icon'=>'nullable',

            'telephone'=>'required|nullable',
            'whatsapp'=>'required|nullable',

            'email_contact'=>'required|nullable',
            'email_support'=>'required|nullable',

            'slogan'=>'required|nullable',

            'adresse'=>'required|nullable',
            'ville'=>'required|nullable',
            'code_postale'=>'required|nullable',
            'pays'=>'required|nullable',

            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'linkedIn'=>'nullable',
            'twitter'=>'nullable',

            'maplink_iframe'=>'required|nullable',


        ]);
        $InfosSystem = InfosSystem::find(1);
        $InfosSystem->nom_plateforme=$request->input('nom_plateforme');
        $InfosSystem->description=$request->input('description');

        $InfosSystem->telephone=$request->input('telephone');
        $InfosSystem->whatsapp=$request->input('whatsapp');

        $InfosSystem->email_contact=$request->input('email_contact');
        $InfosSystem->email_support=$request->input('email_support');

        $InfosSystem->adresse=$request->input('adresse');
        $InfosSystem->ville=$request->input('ville');
        $InfosSystem->code_postale=$request->input('code_postale');
        $InfosSystem->pays=$request->input('pays');

        $InfosSystem->facebook=$request->input('facebook');
        $InfosSystem->instagram=$request->input('instagram');
        $InfosSystem->linkedIn=$request->input('linkedIn');
        $InfosSystem->twitter=$request->input('twitter');
        $InfosSystem->slogan=$request->input('slogan');

        $InfosSystem->maplink_iframe=$request->input('maplink_iframe');





        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/'. date('Y')."/". date('F'). '/';

            if ($request->logo->move($path_name, $logo)) {
                $InfosSystem->logo = $path_name.$logo;
            }

        }

        if ($request->hasFile('fav_icon')) {

            $fav_icon = time().'.'.$request->fav_icon->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/'. date('Y')."/". date('F'). '/';

            if ($request->fav_icon->move($path_name, $fav_icon)) {
                $InfosSystem->fav_icon = $path_name.$fav_icon;
            }

        }

        if ($request->hasFile('logo_white')) {

            $logo_white = time().'.'.$request->logo_white->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/pub1/'. date('Y')."/". date('F'). '/';

            if ($request->logo_white->move($path_name, $logo_white)) {
                $InfosSystem->logo_white = $path_name.$logo_white;
            }

        }


        $InfosSystem->update();
        return back()->with('success', "paramètres mise à jour avec succès !");
    }
}
