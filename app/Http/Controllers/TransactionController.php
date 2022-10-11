<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Caisse;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;

class TransactionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Transaction::class);

        $search = $request->get('search', '');

        $transactions = Transaction::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.transactions.index',
            compact('transactions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Transaction::class);

        $banques = Banque::pluck('nom', 'id');
        $caisses = Caisse::pluck('nom', 'id');

        return view('app.transactions.create', compact('banques', 'caisses'));
    }

    /**
     * @param \App\Http\Requests\TransactionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStoreRequest $request)
    {
        $this->authorize('create', Transaction::class);

        $validated = $request->validated();

        $transaction = Transaction::create($validated);

        return redirect()
            ->route('transactions.edit', $transaction)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Transaction $transaction)
    {
        $this->authorize('view', $transaction);

        return view('app.transactions.show', compact('transaction'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        $banques = Banque::pluck('nom', 'id');
        $caisses = Caisse::pluck('nom', 'id');

        return view(
            'app.transactions.edit',
            compact('transaction', 'banques', 'caisses')
        );
    }

    /**
     * @param \App\Http\Requests\TransactionUpdateRequest $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(
        TransactionUpdateRequest $request,
        Transaction $transaction
    ) {
        $this->authorize('update', $transaction);

        $validated = $request->validated();

        $transaction->update($validated);

        return redirect()
            ->route('transactions.edit', $transaction)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
