<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Website  =  Website::find(1);
        $Is_selected = 5;
        return view('admin.parametres.website.index', compact('Website', 'Is_selected'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,){
        $this->validate($request, [

            'debut'=>'nullable',
            'complement'=>'nullable',
            'description'=>'nullable',
            'btn1'=>'nullable',
            'link1'=>'nullable',
            'image1'=>'nullable',

            'packIntro'=>'nullable',
            'packText'=>'nullable',
            'serviceIntro'=>'nullable',
            'serviceText'=>'nullable',

            'image2'=>'nullable',
            'content2'=>'nullable',
            'btn2'=>'nullable',
            'link2'=>'nullable',

            'image3'=>'nullable',
            'content3'=>'nullable',
            'btn3'=>'nullable',
            'link3'=>'nullable',

            'image4'=>'nullable',
            'content4'=>'nullable',
            'btn4'=>'nullable',
            'link4'=>'nullable',


        ]);

        $Website =  Website::find(1);
        $Website->debut=$request->input('debut');
        $Website->complement=$request->input('complement');
        $Website->description=$request->input('description');
        $Website->btn1=$request->input('btn1');
        $Website->link1=$request->input('link1');

        $Website->packIntro=$request->input('packIntro');
        $Website->packText=$request->input('packText');
        $Website->serviceIntro=$request->input('serviceIntro');
        $Website->serviceText=$request->input('serviceText');


        $Website->content2=$request->input('content2');
        $Website->btn2=$request->input('btn2');
        $Website->link2=$request->input('link2');

        $Website->content3=$request->input('content3');
        $Website->btn3=$request->input('btn3');
        $Website->link3=$request->input('link3');

        $Website->content4=$request->input('content4');
        $Website->btn4=$request->input('btn4');
        $Website->link4=$request->input('link4');


        if ($request->hasFile('image1')) {

            $logo = time().'.'.$request->image1->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/image1/'. date('Y')."/". date('F'). '/';

            if ($request->image1->move($path_name, $logo)) {
                $Website->image1 = $path_name.$logo;
            }

        }

        if ($request->hasFile('image2')) {

            $logo = time().'.'.$request->image2->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/image2/'. date('Y')."/". date('F'). '/';

            if ($request->image2->move($path_name, $logo)) {
                $Website->image2 = $path_name.$logo;
            }

        }

        if ($request->hasFile('image3')) {

            $logo = time().'.'.$request->image3->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/image3/'. date('Y')."/". date('F'). '/';

            if ($request->image3->move($path_name, $logo)) {
                $Website->image3 = $path_name.$logo;
            }

        }

        if ($request->hasFile('image4')) {

            $logo = time().'.'.$request->image4->getClientOriginalExtension();
            $path_name = 'storage/uploads/system/image4/'. date('Y')."/". date('F'). '/';

            if ($request->image4->move($path_name, $logo)) {
                $Website->image4 = $path_name.$logo;
            }

        }
        $Website->update();
        return back()->with('success', "Taxe modifié avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
