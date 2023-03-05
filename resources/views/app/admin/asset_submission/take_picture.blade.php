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
            <div id="results" class="col-12 d-inline result_ss d-none text-center"></div>
            <div class="col-12 text-center cam_wrapper d-inline-block">
                <video id="webcam" autoplay playsinline maxwidth="640" maxheight="480" style="max-width: 100%;
                max-height: 100%; object-fit: content;"></video>
                <canvas id="canvas" class="d-none"></canvas>
                <audio id="snapSound" src="{{ asset('audio_snap.wav') }}" preload="auto"></audio>
            </div>

            <div class="col-12 text-center p-2">
                <button onclick="reTake()">Ulang Ambil Gambar</button>
                <button onclick="screenShoot()" id="btn-take-picture">Take Picture</button>
            </div>

            <div class="col-12 text-center p-2">
                <form
                    action="{{ route('admin.asset_submission.save_take_picture', ['asset_submission' => $assetSubmission->id]) }}"
                    class="form" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="{{ $status }}">
                    <input type="hidden" name="photo" id="photo" value="">
                    <button type="submit">Simpan Foto</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const webcamElement = document.getElementById('webcam');
    const canvasElement = document.getElementById('canvas');
    const snapSoundElement = document.getElementById('snapSound');
    const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);

    $(document).ready(function () {
        webcam.start()
        .then(result =>{
            console.log("webcam started");
        })
        .catch(err => {
            console.log(err);
        });
    });

    function screenShoot(){
        var picture = webcam.snap();
        console.log('Pictute Taked');
        webcam.stop();

        $("div.result_ss").removeClass("d-none");
        $("div.cam_wrapper").addClass("d-none");
        $("button#btn-take-picture").addClass("d-none");
        document.getElementById('results').innerHTML ='<img maxwidth="640" maxheight="480" src="'+picture+'"/>';
        $("input#photo").val(picture);
    }

    function reTake(){
        $("div.result_ss").addClass("d-none");
        $("div.cam_wrapper").removeClass("d-none");
        $("button#btn-take-picture").removeClass("d-none");
        webcam.start()
        .then(result =>{
            console.log("webcam started");
        })
        .catch(err => {
            console.log(err);
        });
    }
</script>
@endsection