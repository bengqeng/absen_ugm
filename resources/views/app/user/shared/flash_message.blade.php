@if (flash()->message)
    <div class="alert {{ flash()->class }} alert-dismissible fade show" role="alert">
        <strong>{{ flash()->message }} </strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
