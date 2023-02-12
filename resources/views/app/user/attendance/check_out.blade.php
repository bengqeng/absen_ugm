@extends('app.user.shared.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 mb-3 text-center">
                <h1 class="fs-4">
                    Absensi Check Out
                </h1>
            </div>
            <div class="col-12">
                <form action="">
                    <label class="fw-semibold mb-2" for="">Silahkan masukan deskripsi,
                        jika anda sedang WFH atau tugas dinas</label>
                    <div class="mx-2">
                        <div class="form-floating mb-2 shadow">
                            <textarea class="form-control" name="description_check_in_wfh" placeholder="Deskripsi:" id="floatingTextarea2"
                                style="height: 300px"></textarea>
                            <label for="floatingTextarea2">Deskripsi:</label>
                        </div>
                        <button class="btn btn-success btn-tropmed float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
