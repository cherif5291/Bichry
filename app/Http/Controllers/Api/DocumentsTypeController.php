<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DocumentsType;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentsTypeResource;
use App\Http\Resources\DocumentsTypeCollection;
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
            ->paginate();

        return new DocumentsTypeCollection($documentsTypes);
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

        return new DocumentsTypeResource($documentsType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DocumentsType $documentsType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DocumentsType $documentsType)
    {
        $this->authorize('view', $documentsType);

        return new DocumentsTypeResource($documentsType);
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

        return new DocumentsTypeResource($documentsType);
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

        return response()->noContent();
    }
}
