<?php

namespace App\Http\Controllers\Api;

use App\Models\Caisse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;

class CaisseTransactionsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Caisse $caisse)
    {
        $this->authorize('view', $caisse);

        $search = $request->get('search', '');

        $transactions = $caisse
            ->transactions()
            ->search($search)
            ->latest()
            ->paginate();

        return new TransactionCollection($transactions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Caisse $caisse)
    {
        $this->authorize('create', Transaction::class);

        $validated = $request->validate([
            'banque_id' => 'required|exists:banques,id',
            'motif' => 'required|max:255|string',
            'montant' => 'required|numeric',
            'pre_solde_banque' => 'required|numeric',
            'post_solde_banque' => 'required|numeric',
            'pre_solde_caisse' => 'required|numeric',
            'post_solde_caisse' => 'required|numeric',
            'type' => 'required|max:255|string',
        ]);

        $transaction = $caisse->transactions()->create($validated);

        return new TransactionResource($transaction);
    }
}
