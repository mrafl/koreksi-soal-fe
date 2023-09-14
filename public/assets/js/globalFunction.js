// Dapatkan tanggal hari ini dalam format 'YYYY-MM-DD'
const dateNow = new Date().toISOString().split('T')[0];

function formatTanggal(tanggalString) {
    // Mengonversi tanggal string ke objek Date
    let tanggal = new Date(tanggalString);

    // Menggunakan metode toLocaleDateString() untuk memformat tanggal
    let options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return tanggal.toLocaleDateString('id-ID', options);
}

$(document).ready(function () {
    const elements = [
        '#kontenBahasaIndonesia',
        '#kontenBahasaInggris',
        '#deskripsiDesaIndonesia',
        '#deskripsiDesaInggris',
        '#deskripsiRotanBahasaIndonesia',
        '#deskripsiRotanBahasaInggris',
        '#deskripsiHayatiBahasaIndonesia',
        '#deskripsiHayatiBahasaInggris',
        '#deskripsiEkowisataBahasaIndonesia',
        '#deskripsiEkowisataBahasaInggris',
        '#deskripsiPelatihanBahasaIndonesia',
        '#deskripsiPelatihanBahasaInggris',
    ];

    elements.forEach(element => {
        $(element).summernote();
    });
});

function goBack() {
    window.history.back();
}

function uploadFoto(endpoint, id) {
    return async function (event) {
        event.preventDefault();

        const formData = new FormData();
        formData.append('file', document.getElementById('file').files[0]);

        try {
            const response = await axios.post(`${window.apiEndpoint}/${endpoint}/${id}`, formData, {
                    headers: {
                        "Authorization": `Bearer ${accessToken}`,
                        "Content-Type": "multipart/form-data",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                });

            if (response.status === 200) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.data.message,
                }).then(() => {
                    window.location.reload();
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
                icon: "error",
                title: "Gagal",
                text: error.response.data.message,
            });
        }
    }
}

function deleteData(url, id, type) {
    Swal.fire({
        title: 'Konfirmasi',
        text: `Apakah Anda yakin ingin menghapus ${type} ini?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f5365c',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await axios.delete(
                    `${window.apiEndpoint}/${url}/${id}`, {
                        headers: {
                            "Authorization": `Bearer ${accessToken}`,
                        }
                    });

                if (response.status === 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.data.message,
                    }).then(() => {
                        window.location.reload();
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
                    icon: "error",
                    title: "Gagal",
                    text: error.response.data.message,
                });
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                icon: "error",
                title: "Batal",
                text: `Batal menghapus ${type}`,
            });
        }
    });
}

function restoreData(url, id, type) {
    Swal.fire({
        title: 'Konfirmasi',
        text: `Apakah Anda yakin ingin mengembalikan ${type} ini?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f5365c',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Ya, kembalikan!',
        cancelButtonText: 'Batal'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await axios.put(
                    `${window.apiEndpoint}/${url}/${id}`, {}, {
                        headers: {
                            "Authorization": `Bearer ${accessToken}`,
                        }
                    });

                if (response.status === 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.data.message,
                    }).then(() => {
                        window.location.reload();
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
                    icon: "error",
                    title: "Gagal",
                    text: error.response.data.message,
                });
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                icon: "error",
                title: "Batal",
                text: `Batal mengembalikan ${type}`,
            });
        }
    });
}

async function addRotan() {
    const dataRotan = document.getElementById('dataRotan').value;
    const potensiDesa = document.getElementById('potensiDesa').value;
    const jumlahRotan = document.getElementById('jumlahRotan').value;
    const rotanTerpakai = document.getElementById('rotanTerpakai').value;
    const sisaRotan = document.getElementById('sisaRotan').value;

    const payload = {
        dataRotan,
        potensiDesa,
        jumlahRotan,
        rotanTerpakai,
        sisaRotan
    }

    try {
        const response = await axios.post(`${window.apiEndpoint}/rotan`, payload, {
            headers: {
                "Authorization": `Bearer ${accessToken}`,
            }
        });

        if (response) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message,
            }).then(() => {
                window.location.reload();
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
            icon: "error",
            title: "Gagal",
            text: error.response.data.message,
        });
    }
}

async function addHayati() {
    const potensiDesa = document.getElementById('potensiDesa').value;
    const nama = document.getElementById('nama').value;
    const namaIlmiah = document.getElementById('namaIlmiah').value;
    const deskripsiHayatiBahasaIndonesia = $('#deskripsiHayatiBahasaIndonesia').summernote('code');
    const deskripsiHayatiBahasaInggris = $('#deskripsiHayatiBahasaInggris').summernote('code');
    const lokasi = document.getElementById('lokasi').value;
    const jenis = document.getElementById('jenis').value;

    const payload = {
        potensiDesa: potensiDesa,
        nama: nama,
        namaIlmiah: namaIlmiah,
        deskripsi: [{
                language: 'id',
                text: deskripsiHayatiBahasaIndonesia
            },
            {
                language: 'en',
                text: deskripsiHayatiBahasaInggris
            }
        ],
        lokasi: lokasi,
        jenis: jenis
    }

    console.log(payload);

    try {
        const response = await axios.post(`${window.apiEndpoint}/hayati`, payload, {
            headers: {
                "Authorization": `Bearer ${accessToken}`,
            }
        });

        if (response) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message,
            }).then(() => {
                window.location.reload();
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
            icon: "error",
            title: "Gagal",
            text: error.response.data.message,
        });
    }
}

async function addEkowisata() {
    const potensiDesa = document.getElementById('potensiDesa').value;
    const namaEkowisata = document.getElementById('namaEkowisata').value;
    const deskripsiEkowisataBahasaIndonesia = $('#deskripsiEkowisataBahasaIndonesia').summernote('code');
    const deskripsiEkowisataBahasaInggris = $('#deskripsiEkowisataBahasaInggris').summernote('code');
    const lokasiEkowisata = document.getElementById('lokasiEkowisata').value;

    const payload = {
        potensiDesa: potensiDesa,
        nama: namaEkowisata,
        deskripsi: [
            {
                language: 'id',
                text: deskripsiEkowisataBahasaIndonesia
            },
            {
                language: 'en',
                text: deskripsiEkowisataBahasaInggris
            }
        ],
        lokasi: lokasiEkowisata,
    }

    try {
        const response = await axios.post(`${window.apiEndpoint}/eko-wisata`, payload, {
            headers: {
                "Authorization": `Bearer ${accessToken}`,
            }
        });

        if (response) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message,
            }).then(() => {
                window.location.reload();
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
            icon: "error",
            title: "Gagal",
            text: error.response.data.message,
        });
    }
}
