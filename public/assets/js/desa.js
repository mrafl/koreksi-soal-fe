document.getElementById('btnHapusFotoDesa').addEventListener('click', function () {
    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus foto ini?',
        icon: 'warning',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
    }).then((result) => {
        if (result.isConfirmed) {
            // Lakukan permintaan DELETE ke endpoint untuk menghapus foto
            axios.delete(`${window.apiEndpoint}/upload-foto/potensi-desa/${document.querySelector('input[name="idFoto"]').value}`, {
                    headers: {
                        "Authorization": `Bearer ${accessToken}`
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: 'Foto berhasil dihapus!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });

                })
                .catch(error => {
                    console.error(error);
                    Swal.fire({
                        title: error.response.data.message,
                        icon: 'error'
                    });
                });
        }
    });
});
