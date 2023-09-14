@extends('layouts.dashboard')

@section('container')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-tigerEyes btn-block" data-bs-toggle="modal"
                        data-bs-target="#modalAddKunciJawaban">
                        <span class="btn-inner--icon">
                            <i class="fa fa-plus me-2" aria-hidden="true"></i>
                        </span>
                        <span class="btn-inner--text">Tambah Kunci Jawaban</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="tableKunciJawaban">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Kode Soal</th>
                                    <th>Tipe Soal</th>
                                    <th>Jumlah Soal</th>
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

    <div class="modal fade" id="modalAddKunciJawaban" tabindex="-1" role="dialog" aria-labelledby="AddFAQ" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder color-tigerEyes">Tambah Kunci Jawaban</h3>
                        </div>
                        <div class="card-body pb-3">
                            <form role="form text-left">
                                <label>Kode Soal<span style="color: red;">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan kode soal anda" id="kodeSoal" name="kodeSoal">
                                </div>

                                <label>Tipe Soal<span style="color: red;">*</span></label>
                                <select class="form-control" name="tipeSoal" id="tipeSoal">
                                    <option value="" disabled selected>-- Pilih Tipe Soal --</option>
                                    <option value="punishmentScore"> Punishment Score </option>
                                    <option value="correctScore"> Correct Score </option>
                                </select>

                                <hr class="mt-4">

                                <table class="table align-items-center mb-0" id="tableStoreKunciJawaban">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nomor
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kunci Jawaban
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-primary mt-2" onclick="addRow()">Tambah</button>
                                
                                <div class="text-center">
                                    <button type="button" onclick="addKunciJawaban()" class="btn btn-tigerEyes btn-lg btn-rounded w-100 mt-4 mb-0">@lang('dashboard.button.save')</button>
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
                    <h4 class="modal-title font-weight-bolder color-tigerEyes">Detail Kunci Jawaban [ <span id="kodeSoalDetailText"></span> ]</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-body pb-3">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="kodeSoalDetail" class="form-label">Kode Soal</label>
                                    <input type="text" class="form-control" id="kodeSoalDetail" name="kodeSoalDetail" disabled value="">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="tipeSoalDetail" class="form-label">Tipe Soal</label>
                                    <input type="text" class="form-control" id="tipeSoalDetail" name="tipeSoalDetail" disabled value="">
                                </div>
                            </div>
                            <table class="table align-items-center mb-0 mt-4" id="detailDataKunciJawaban">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kunci Jawaban
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
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
                url: `${window.apiEndpoint}/kunci-jawaban`,
                type: 'GET',
                headers: {
                    "Authorization": `Bearer ${accessToken}`
                },
                success: function(result) {
                    console.log(result);
                    $('#tableKunciJawaban tbody').empty();
                    
                    result.data.forEach((item, index) => {
                        $('#tableKunciJawaban tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.kodeSoal}</td>
                                <td>${item.tipeSoal == 'correctScore' ? 'Correct Score' : 'Punishment Score'}</td>
                                <td>${item.kunciJawaban.length}</td>
                                <td>
                                    <button class="btn btn-outline-info btn-sm" onclick="showDetail('${item._id}')">
                                        <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    new simpleDatatables.DataTable("#tableKunciJawaban", {
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

        let idDetailData = '';

        function showDetail(id) {
            idDetailData = id;
            $.ajax({
                url: `${window.apiEndpoint}/kunci-jawaban?id=${idDetailData}`,
                type: 'GET',
                headers: {
                    "Authorization": `Bearer ${accessToken}`
                },
                success: function(result) {
                    $('#kodeSoalDetailText').text(result.data.kodeSoal);
                    $('#kodeSoalDetail').val(result.data.kodeSoal);
                    $('#tipeSoalDetail').val(result.data.tipeSoal == 'punishmentScore' ? 'Punishment Score' : 'Correct Score');

                    $('#detailDataKunciJawaban tbody').empty();
                    result.data.kunciJawaban.forEach((item, index) => {
                        $('#detailDataKunciJawaban tbody').append(`
                            <tr>
                                <td class="text-center">${item.nomor}</td>
                                <td class="text-center">${item.kunci}</td>
                            </tr>
                        `);
                    });

                    $('#modalDetail').modal('show');
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message
                    })
                }
            })
        }

        function closeDetail() {
            $('#modalDetail').modal('hide');
        }


        function addRow() {
            const table = document.getElementById('tableStoreKunciJawaban');
            var newRow = table.insertRow(table.rows.length);

            console.log(table.rows.length);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);

            cell1 = cell1.innerHTML = `<input type="number" class="form-control" name="nomor[]" placeholder="Nomor" value="${table.rows.length - 1}" disabled>`;
            cell2 = cell2.innerHTML = `<input type="text" class="form-control" name="kunci[]" placeholder="Kunci Jawaban">`;
        }

        async function addKunciJawaban() {
            const kodeSoal = $('#kodeSoal').val();
            const tipeSoal = $('#tipeSoal').val();
            const nomor = $('input[name="nomor[]"]').map(function(){return $(this).val();}).get();
            const kunci = $('input[name="kunci[]"]').map(function(){return $(this).val();}).get();

            const payload = {
                kodeSoal,
                tipeSoal,
                kunciJawaban: []
            }

            for (let i = 0; i < nomor.length; i++) {
                payload.kunciJawaban.push({
                    nomor: nomor[i],
                    kunci: kunci[i]
                });
            }

            try {
                const response = await axios.post(`${window.apiEndpoint}/kunci-jawaban`, payload, {
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
                        $('#kodeSoal').val('');
                        $('#tipeSoal').val('');
                        $('#tableStoreKunciJawaban tbody').empty();
                        $('#modalAddKunciJawaban').modal('hide');

                        $.ajax({
                            url: `${window.apiEndpoint}/kunci-jawaban`,
                            type: 'GET',
                            headers: {
                                "Authorization": `Bearer ${accessToken}`
                            },
                            success: function(result) {
                                console.log(result);
                                $('#tableKunciJawaban tbody').empty();
                                
                                result.data.forEach((item, index) => {
                                    $('#tableKunciJawaban tbody').append(`
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${item.kodeSoal}</td>
                                            <td>${item.tipeSoal == 'correctScore' ? 'Correct Score' : 'Punishment Score'}</td>
                                            <td>${item.kunciJawaban.length}</td>
                                            <td>
                                                <button class="btn btn-outline-info btn-sm" onclick="showDetail('${item._id}')">
                                                    <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    `);
                                });

                                new simpleDatatables.DataTable("#tableKunciJawaban", {
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
