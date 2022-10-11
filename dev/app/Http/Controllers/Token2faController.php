<?php

namespace App\Http\Controllers;

use App\Models\Token2fa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Token2faController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('verify');
    }
    public function verify(Request $request)
    {
        // dd("fgf");
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',

        ]);
        $user = User::where('email', $request->input('email'))->first();
        if (Hash::check($request->password, $user->password)) {
            // return back()->with('success', "Identifiant ou mot de passe correct.");
            $email = $request->input('email');
            $password = $request->input('password');
            $Today = Carbon::now()->format('Y-m-d');
            if (Token2fa::where('email', $request->input('email'))->first()) {
                // $T2FA = Token2fa::whereDate('created_at', $Today)->where('email', $request->input('email'))->first();
                if (Token2fa::whereDate('created_at', $Today)->where('email', $request->input('email'))->first()) {
                    return view('auth.login2FA', compact('email', 'password'));
                } else {
                    $T2FA = new Token2fa();
                    $T2FA->email = $request->input('email');
                    $T2FA->token = str_pad(mt_rand(1,9999),4,'0',STR_PAD_LEFT);
                    $T2FA->status = "invalide";
                    $T2FA->save();
                    return view('auth.login2FA', compact('email', 'password'));
                }
            } else {
                $T2FA = new Token2fa();
                $T2FA->email = $request->input('email');
                $T2FA->token = str_pad(mt_rand(1,9999),4,'0',STR_PAD_LEFT);
                $T2FA->status = "invalide";
                $T2FA->save();
                return view('auth.login2FA', compact('email', 'password'));
            }
        } else {
            return back()->with('error', "Identifiant ou mot de passe incorrectent.");
        }


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
     * @param  \App\Models\Token2fa  $token2fa
     * @return \Illuminate\Http\Response
     */
    public function show(Token2fa $token2fa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Token2fa  $token2fa
     * @return \Illuminate\Http\Response
     */
    public function edit(Token2fa $token2fa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Token2fa  $token2fa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Token2fa $token2fa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Token2fa  $token2fa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Token2fa $token2fa)
    {
        //
    }
}
