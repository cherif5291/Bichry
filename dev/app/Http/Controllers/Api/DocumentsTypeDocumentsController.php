<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DocumentsType;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\DocumentCollection;

class DocumentsTypeDocumentsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DocumentsType $documentsType)
    {
        $this->authorize('view', $documentsType);

        $search = $request->get('search', '');

        $documents = $documentsType
            ->documents()
            ->search($search)
            ->latest()
            ->paginate();

        return new DocumentCollection($documents);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DocumentsType $documentsType)
    {
        $this->authorize('create', Document::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'doc' => 'required|max:255|string',
            'cabinet_id' => 'required|numeric',
        ]);

        $document = $documentsType->documents()->create($validated);

        return new DocumentResource($document);
    }
}
