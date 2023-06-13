<!-- modal -->
<section>
    <div class="modal" id="detailPengajuanModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="fs-5 text-center">
                        Detail Peminjaman Aset
                    </h2>
                    <table class="table bg-white shadow-sm rounded p-2">
                        <tbody>
                            <tr>
                                <th class="align-top fw-semibold">Aset</th>
                                <td>A7x</td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold text-nowrap">Nama Peminjam</th>
                                <td>Reza Velayani</td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold text-nowrap">Tanggal Pinjam</th>
                                <td>17/02/2023</td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Tanggal Kembali</th>
                                <td>20/02/2023</td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Project</th>
                                <td>Tropmed</td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Deskripsi</th>
                                <td>Lorem ipsum dolor sit amet consectetur. Aliquet quam sit ultricies ipsum
                                    sagittis sit. Sit duis proin vulputate egestas
                                    sed elit.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-end border-0">
                    <button type="button" class="btn btn-outline-danger px-5" data-bs-dismiss="modal">Tolak</button>
                    <button type="button" class="btn btn-success btn-tropmed px-5"
                        data-bs-dismiss="modal">Terima</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="attendanceDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="fs-5 text-center">
                        Detail Presensi
                    </h2>
                    <table class="table bg-white shadow-sm rounded p-2">
                        <tbody>
                            <tr>
                                <th class="align-top fw-semibold">Nama Staf</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold text-nowrap">Tanggal</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold text-nowrap">Absen Masuk</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Absen Selesai</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Catatan Masuk</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Catatan Selesai</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Total Jam Kerja</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Lembur</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="align-top fw-semibold">Catatan Lembur</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-end border-0">
                    <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="downloadReport" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="loadingMessage">
                        <div class="d-flex align-items-center">
                            <strong>Loading...</strong>
                            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end border-0">
                    <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>