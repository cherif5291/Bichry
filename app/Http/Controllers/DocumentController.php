<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\DocumentsType;
use App\Http\Requests\DocumentStoreRequest;
use App\Http\Requests\DocumentUpdateRequest;

class DocumentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Document::class);

        $search = $request->get('search', '');

        $documents = Document::search($search)
            ->latest()
            ->paginate(5);

        return view('app.documents.index', compact('documents', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Document::class);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');
        $documentsTypes = DocumentsType::pluck('nom', 'id');

        return view(
            'app.documents.create',
            compact('entreprises', 'documentsTypes')
        );
    }

    /**
     * @param \App\Http\Requests\DocumentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        $this->authorize('create', Document::class);

        $validated = $request->validated();

        $document = Document::create($validated);

        return redirect()
            ->route('documents.edit', $document)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Document $document)
    {
        $this->authorize('view', $document);

        return view('app.documents.show', compact('document'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Document $document)
    {
        $this->authorize('update', $document);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');
        $documentsTypes = DocumentsType::pluck('nom', 'id');

        return view(
            'app.documents.edit',
            compact('document', 'entreprises', 'documentsTypes')
        );
    }

    /**
     * @param \App\Http\Requests\DocumentUpdateRequest $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        $this->authorize('update', $document);

        $validated = $request->validated();

        $document->update($validated);

        return redirect()
            ->route('documents.edit', $document)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Document $document)
    {
        $this->authorize('delete', $document);

        $document->delete();

        return redirect()
            ->route('documents.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
