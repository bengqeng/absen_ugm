@extends('app.admin.shared.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-4">
                    Ambil Gambar
                </h1>
            </div>

            <div id="results" class="col-12 d-inline result_ss text-center">
                <img id="preview-selected-image" class="img-thumbnail" width="640" height="480" />
            </div>

            <div class="col-12 text-center p-2">
                @include('layouts.form_validation')
                <form
                    action="{{ route('admin.asset_submission.save_take_picture', ['asset_submission' => $assetSubmission->id]) }}"
                    class="form" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="{{ $status }}">
                    <input type="hidden" name="photo" id="image-file">
                    <div class="row">
                        <div class="col-6 text-end">
                            <label for="image_upload" class="btn btn-primary">Ambil Gambar</label>
                            <input type="file" capture="user" accept="image/png, image/gif, image/jpeg"
                                id="image_upload" class="d-none">
                        </div>
                        <div class="col-6 text-start">
                            <button type="submit" class="btn btn-primary">Simpan Foto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#image_upload').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            console.log(e.target.result);
            $('#preview-selected-image').attr('src', e.target.result);
            $("input#image-file").val(e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection