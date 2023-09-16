@extends('layouts.dashboard')

@section('container')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-tigerEyes btn-block" data-bs-toggle="modal"
                        data-bs-target="#modalAddJawabanSiswa">
                        <span class="btn-inner--icon">
                            <i class="fa fa-plus me-2" aria-hidden="true"></i>
                        </span>
                        <span class="btn-inner--text">Tambah Jawaban Siswa</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="tableJawabanSiswa">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Siswa</th>
                                    <th>Kode Soal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddJawabanSiswa" tabindex="-1" role="dialog" aria-labelledby="AddFAQ"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder color-tigerEyes">Tambah Jawaban Siswa</h3>
                        </div>
                        <div class="card-body pb-3">
                            <form role="form text-left">
                                <label>Nama Siswa<span style="color: red;">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Siswa"
                                        id="namaSiswa" name="namaSiswa">
                                </div>

                                <label>Pilih Kode Soal<span style="color: red;">*</span></label>
                                <select class="form-control mb-3" name="idKunciJawaban" id="idKunciJawaban">
                                    <option value="" disabled selected>-- Pilih Kode Soal --</option>
                                    @foreach ($listKodeSoal as $data)
                                        <option value="{{ $data['_id'] }}">
                                            {{ $data['kodeSoal'] }}
                                        </option>
                                    @endforeach
                                </select>

                                <hr class="mt-4">

                                <table class="table align-items-center mb-0" id="tableStoreJawabanSiswa">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nomor
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jawaban Siswa
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <button type="button" onclick="addJawabanSiswa()"
                                        class="btn btn-tigerEyes btn-lg btn-rounded w-100 mt-4 mb-0">@lang('dashboard.button.save')</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-sm-4 px-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bolder color-tigerEyes">Detail Jawaban Siswa [ <span
                            id="namaSiswaText"></span> ]</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-body pb-3">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="namaSiswaDetail" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="namaSiswaDetail" name="namaSiswaDetail" disabled value="">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="kodeSoalDetail" class="form-label">Kode Soal</label>
                                    <input type="text" class="form-control" id="kodeSoalDetail" name="kodeSoalDetail" disabled value="">
                                </div>
                            </div>
                            <table class="table align-items-center mb-0 mt-4" id="detailJawabanSiswa">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jawaban Siswa
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kunci Jawaban
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="row mt-3">
                                <div class="col-12 col-md-4">
                                    <label for="jawabanBenar" class="form-label">Jawaban Benar</label>
                                    <input type="text" class="form-control" id="jawabanBenar" name="jawabanBenar" disabled value="">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="jawabanSalah" class="form-label">Jawaban Salah</label>
                                    <input type="text" class="form-control" id="jawabanSalah" name="jawabanSalah" disabled value="">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="jawabanTidakDiIsi" class="form-label">Jawaban Tidak di Isi</label>
                                    <input type="text" class="form-control" id="jawabanTidakDiIsi" name="jawabanTidakDiIsi" disabled value="">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="font-weight-bolder color-tigerEyes">Punishment Score</h4>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="point" class="form-label">Score</label>
                                    <input type="text" class="form-control" id="punishmentScorePoint" name="punishmentScorePoint" disabled value="">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="nilai" class="form-label">Nilai</label>
                                    <input type="text" class="form-control" id="punishmentScoreNilai" name="punishmentScoreNilai" disabled value="">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="font-weight-bolder color-tigerEyes">Correct Score</h4>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="point" class="form-label">Score</label>
                                    <input type="text" class="form-control" id="correctScorePoint" name="correctScorePoint" disabled value="">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="nilai" class="form-label">Nilai</label>
                                    <input type="text" class="form-control" id="correctScoreNilai" name="correctScoreNilai" disabled value="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end pt-0 px-sm-4 px-1">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="closeDetail()" class="btn btn-tigerEyes mb-0">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptAddon')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                url: `${window.apiEndpoint}/jawaban-siswa`,
                type: 'GET',
                headers: {
                    "Authorization": `Bearer ${accessToken}`
                },
                success: function(result) {
                    console.log(result);
                    $('#tableJawabanSiswa tbody').empty();

                    result.data.forEach((item, index) => {
                        $('#tableJawabanSiswa tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.namaSiswa}</td>
                                <td>${item.idKunciJawaban.kodeSoal}</td>
                                <td>
                                    <button class="btn btn-outline-info btn-sm" onclick="showDetail('${item._id}')">
                                        <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    new simpleDatatables.DataTable("#tableJawabanSiswa", {
                        searchable: true,
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message
                    })
                }
            })
        });

        //choices
        if (document.getElementById('idKunciJawaban')) {
            var idKunciJawaban = document.getElementById('idKunciJawaban');
            const example = new Choices(idKunciJawaban);
        }

        let idDetailData = '';

        function showDetail(id) {
            idDetailData = id;
            $.ajax({
                url: `${window.apiEndpoint}/jawaban-siswa?id=${idDetailData}`,
                type: 'GET',
                headers: {
                    "Authorization": `Bearer ${accessToken}`
                },
                success: function(result1) {
                    $.ajax({
                        url: `${window.apiEndpoint}/nilai-siswa?id=${idDetailData}`,
                        type: 'GET',
                        headers: {
                            "Authorization": `Bearer ${accessToken}`
                        },
                        success: function(result2) {
                            $('#namaSiswaText').html(result1.data.namaSiswa);
                            $('#namaSiswaDetail').val(result1.data.namaSiswa);
                            $('#kodeSoalDetail').val(result1.data.idKunciJawaban.kodeSoal);

                            $('#jawabanBenar').val(result2.data.benar);
                            $('#jawabanSalah').val(result2.data.salah);
                            $('#jawabanTidakDiIsi').val(result2.data.tidakDiisi);

                            $('#punishmentScorePoint').val(result2.data.punishmentScore.point.toFixed(1));
                            $('#punishmentScoreNilai').val(result2.data.punishmentScore.nilai.toFixed(1));

                            $('#correctScorePoint').val(result2.data.correctScore.point.toFixed(1));
                            $('#correctScoreNilai').val(result2.data.correctScore.nilai.toFixed(1));

                            const tbody = $('#detailJawabanSiswa tbody');
                            tbody.empty();

                            const jawabanSiswa = result1.data.jawabanSiswa;
                            const kunciJawaban = result1.data.idKunciJawaban.kunciJawaban;

                            for (let i = 0; i < jawabanSiswa.length; i++) {
                                const row = `<tr>
                                        <td class="text-center">${i + 1}</td>
                                        <td class="text-center">${jawabanSiswa[i].jawaban || '-'}</td>
                                        <td class="text-center">${kunciJawaban[i].kunci}</td>
                                    </tr>`;
                                tbody.append(row);
                            }

                            $('#modalDetail').modal('show');
                        },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: xhr.responseJSON.message
                                })
                            }
                        });

                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message
                    })
                }
            });
        }


        function closeDetail() {
            $('#modalDetail').modal('hide');
        }

        $('#idKunciJawaban').on('change', function() {
            // Ambil nilai yang dipilih
            var selectedValue = $(this).val();

            // Periksa jika nilai yang dipilih tidak kosong
            if (selectedValue !== "") {
                // Lakukan permintaan AJAX ke server untuk mengambil data berdasarkan nilai yang dipilih
                $.ajax({
                    url: `${window.apiEndpoint}/kunci-jawaban?id=${selectedValue}`, // Gantilah dengan URL sebenarnya ke endpoint server Anda
                    method: 'GET', // Atur metode permintaan yang sesuai
                    headers: {
                        "Authorization": `Bearer ${accessToken}`
                    },
                    success: function(data) {
                        $('#tableStoreJawabanSiswa tbody').empty();

                        data['data']['kunciJawaban'].forEach((item, index) => {
                            $('#tableStoreJawabanSiswa tbody').append(`
                                <tr>
                                    <td class="text-center">
                                        <input type="number" class="form-control" name="nomor[]" placeholder="Nomor" value="${item.nomor}" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="jawaban[]" placeholder="Jawaban Siswa">
                                    </td>
                                </tr>
                            `);
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                // Kosongkan elemen jika nilai yang dipilih kosong
                $('#dataRencanaPanen').html("");
            }
        })

        async function addJawabanSiswa() {
            const namaSiswa = $('#namaSiswa').val();
            const idKunciJawaban = $('#idKunciJawaban').val();
            const nomor = $('input[name="nomor[]"]').map(function() {
                return $(this).val();
            }).get();
            const jawaban = $('input[name="jawaban[]"]').map(function() {
                return $(this).val();
            }).get();

            const payload = {
                idKunciJawaban,
                namaSiswa,
                jawabanSiswa: []
            }

            for (let i = 0; i < nomor.length; i++) {
                if (jawaban[i] == '') {
                    jawaban[i] = null;
                }
                payload.jawabanSiswa.push({
                    nomor: nomor[i],
                    jawaban: jawaban[i]
                });
            }

            try {
                const response = await axios.post(`${window.apiEndpoint}/jawaban-siswa`, payload, {
                    headers: {
                        "Authorization": `Bearer ${accessToken}`,
                    }
                })

                if (response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.data.message,
                    }).then(() => {
                        $('#namaSiswa').val('');
                        $('#idKunciJawaban').val('').trigger('change');
                        $('#tableStoreJawabanSiswa tbody').empty();


                        $.ajax({
                            url: `${window.apiEndpoint}/jawaban-siswa`,
                            type: 'GET',
                            headers: {
                                "Authorization": `Bearer ${accessToken}`
                            },
                            success: function(result) {
                                console.log(result);
                                $('#tableJawabanSiswa tbody').empty();

                                result.data.forEach((item, index) => {
                                    $('#tableJawabanSiswa tbody').append(`
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${item.namaSiswa}</td>
                                            <td>${item.idKunciJawaban.kodeSoal}</td>
                                            <td>
                                                <button class="btn btn-outline-info btn-sm" onclick="showDetail('${item._id}')">
                                                    <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    `);
                                });

                                new simpleDatatables.DataTable("#tableJawabanSiswa", {
                                    searchable: true,
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: xhr.responseJSON.message
                                })
                            }
                        })

                        $('#modalAddJawabanSiswa').modal('hide');
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: response.data.message,
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.response.data.message
                })
            }
        }
    </script>
@endsection
