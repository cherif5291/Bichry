<?php

namespace App\Http\Controllers\Api;

use App\Models\Banque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;

class BanqueTransactionsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Banque $banque)
    {
        $this->authorize('view', $banque);

        $search = $request->get('search', '');

        $transactions = $banque
            ->transactions()
            ->search($search)
            ->latest()
            ->paginate();

        return new TransactionCollection($transactions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Banque $banque)
    {
        $this->authorize('create', Transaction::class);

        $validated = $request->validate([
            'caisse_id' => 'required|exists:caisses,id',
            'motif' => 'required|max:255|string',
            'montant' => 'required|numeric',
            'pre_solde_banque' => 'required|numeric',
            'post_solde_banque' => 'required|numeric',
            'pre_solde_caisse' => 'required|numeric',
            'post_solde_caisse' => 'required|numeric',
            'type' => 'required|max:255|string',
        ]);

        $transaction = $banque->transactions()->create($validated);

        return new TransactionResource($transaction);
    }
}
