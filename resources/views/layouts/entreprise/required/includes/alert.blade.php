@if (session('success'))
<div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert"> <i
        data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{session('success')}} <button type="button"
        class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> <i
        data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{session('error')}} <button type="button"
        class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button>
</div>
@endif
