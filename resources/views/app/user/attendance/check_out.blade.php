@extends('app.user.shared.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 mb-3 text-center">
                <h1 class="fs-4">
                    Absensi Check Out
                </h1>
                <span
                    class="badge text-uppercase rounded-pill text-bg-{{ $statusIp === 'out office' ? 'secondary' : 'success' }}">{{ $statusIp }}</span>
            </div>
            <div class=" col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('staff.checkout.store') }}" method="POST">
                    @csrf
                    <label class="fw-semibold mb-2" for="">Silahkan masukan deskripsi,
                        jika Anda sedang WFH atau tugas dinas</label>
                    <div class="mx-2">
                        <div class="form-floating mb-2 bg-white">
                            <textarea class="form-control" name="note_out" placeholder="Deskripsi:" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Deskripsi:</label>
                        </div>
                        <div class="p-3 border bg-default mb-2 rounded-2">
                            Tanggal {{ now()->format('j F Y') }}, pukul <span class="fw-bolder" id="time"></span>
                        </div>
                        <hr>
                        <div class="form-floating mb-2 bg-white">
                            <input class="form-control" name="overtime" type="number" placeholder="Lembur:">
                            <label for="floatingTextarea2">Lembur: (dalam satuan menit)</label>
                        </div>
                        <div class="form-floating mb-2 bg-white">
                            <textarea class="form-control" name="note_overtime" placeholder="Deskripsi Lembur:" id="floatingTextareanoteovertime"
                                style="height: 100px"></textarea>
                            <label for="floatingTextareanoteovertime">Deskripsi Lembur:</label>
                        </div>
                        <button class="btn btn-success btn-tropmed w-100" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function showTime() {
                var date = new Date(),
                    utc = new Date(
                        date.getFullYear(),
                        date.getMonth(),
                        date.getDate(),
                        date.getHours(),
                        date.getMinutes(),
                        date.getSeconds()
                    );

                document.getElementById('time').innerHTML = utc.toLocaleTimeString('en-GB');
            }

            setInterval(showTime, 1000);
        </script>
    @endpush
@endsection
