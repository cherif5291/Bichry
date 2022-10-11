 @if (Session('error'))

 <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div class="toast fade" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white"><strong class="me-auto">Erreur dététecté</strong>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-danger">{!!Session('error')!!}</div>
    </div>
  </div>

@endif

  <!-- Success message -->
  @if(Session('success'))


  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div class="toast fade" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white"><strong class="me-auto">Opération réussi</strong>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">{!!Session('success')!!}</div>
    </div>
  </div>


  @endif


  @if ($errors->any())
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div class="toast fade" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-warning text-dark"><strong class="me-auto">Attention</strong>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <p class="mb-0 flex-1">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    </div>
    </div>
  </div>

@endif
