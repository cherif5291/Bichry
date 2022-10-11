<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentsType;
use App\Http\Requests\DocumentsTypeStoreRequest;
use App\Http\Requests\DocumentsTypeUpdateRequest;

class DocumentsTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DocumentsType::class);

        $search = $request->get('search', '');

        $documentsTypes = DocumentsType::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.documents_types.index',
            compact('documentsTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DocumentsType::class);

        return view('app.documents_types.create');
    }

    /**
     * @param \App\Http\Requests\DocumentsTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentsTypeStoreRequest $request)
    {
        $this->authorize('create', DocumentsType::class);

        $validated = $request->validated();

        $documentsType = DocumentsType::create($validated);

        return redirect()
            ->route('documents-types.edit', $documentsType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DocumentsType $documentsType)
    {
        $this->authorize('view', $documentsType);

        return view('app.documents_types.show', compact('documentsType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DocumentsType $documentsType)
    {
        $this->authorize('update', $documentsType);

        return view('app.documents_types.edit', compact('documentsType'));
    }

    /**
     * @param \App\Http\Requests\DocumentsTypeUpdateRequest $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function update(
        DocumentsTypeUpdateRequest $request,
        DocumentsType $documentsType
    ) {
        $this->authorize('update', $documentsType);

        $validated = $request->validated();

        $documentsType->update($validated);

        return redirect()
            ->route('documents-types.edit', $documentsType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DocumentsType $documentsType)
    {
        $this->authorize('delete', $documentsType);

        $documentsType->delete();

        return redirect()
            ->route('documents-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
