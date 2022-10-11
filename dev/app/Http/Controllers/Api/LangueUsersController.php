<?php

namespace App\Http\Controllers\Api;

use App\Models\Langue;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;

class LangueUsersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Langue $langue)
    {
        $this->authorize('view', $langue);

        $search = $request->get('search', '');

        $users = $langue
            ->users()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserCollection($users);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Langue $langue)
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = $langue->users()->create($validated);

        $user->syncRoles($request->roles);

        return new UserResource($user);
    }
}
