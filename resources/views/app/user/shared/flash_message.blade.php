@if (flash()->message)
<div class="position-absolute top-0 end-0 m-3 mt-5" style="z-index: 1021">
    <div class="alert {{ flash()->class }} alert-dismissible fade show" role="alert">
        {{ flash()->message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif