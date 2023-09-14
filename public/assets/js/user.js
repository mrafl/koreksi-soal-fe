async function activateAccount(id) {
    try {
        const activate = await axios.put(`${window.apiEndpoint}/admin/activate-account/${id}`, {}, {
            headers: {
                "Authorization": `Bearer ${accessToken}`
            }
        })

        if (activate) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: activate.data.message,
            }).then(() => {
                window.location.href = "/dashboards/users";
            });
        }
    } catch (err) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: err.response.data.message,
        })
    }
}

$(document).ready(function() {
    // Function to show/hide pilih-pendamping-container
    function togglePilihPendampingContainer() {
        var selectedRole = $("#pilih-roles").val();
        if (selectedRole === 'perotan') {
            $("#pilih-pendamping-container").show();
            $("#pilih-desa-container").show();
        } else {
            // If the selected role is not "perotan," hide the container and set the value to an empty string
            $("#pilih-pendamping-container").hide();
            $("#pilih-pendamping").val(''); // Set the value to empty
            $("#pilih-desa-container").hide();
            $("#pilih-desa").val(''); // Set the value to empty
        }
    }

    // Call the function on page load
    togglePilihPendampingContainer();

    // Call the function whenever the roles selection changes
    $("#pilih-roles").on('change', function() {
        togglePilihPendampingContainer();
    });
});

document.getElementById("adminMemilihPendampingForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const idPerotan = document.getElementById("idPerotan").value;
    const selectedPendamping = document.getElementById("pilih-pendamping").value;

    const postData = {
        pendamping: selectedPendamping
    };

    axios.put(`${window.apiEndpoint}/admin/activate-account/${idPerotan}`, postData, {
        headers: {
            "Authorization": `Bearer ${accessToken}`
        }
    }).then((response) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: response.data.message,
        }).then(() => {
            window.location.href = "/dashboards/users";
        });
    }).catch((error) => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    });
})

function selectPendamping(idPerotan, namaPerotan) {
    document.getElementById('idPerotan').value = idPerotan;
    document.getElementById('namaPerotan').value = namaPerotan;
    const selectPendampingModal = new bootstrap.Modal(document.getElementById('selectPendampingModal'));
    selectPendampingModal.show();
}

async function deactivateAccount(id) {
    try {
        const deactivate = await axios.put(`${window.apiEndpoint}/admin/deactivate-account/${id}`, {}, {
            headers: {
                "Authorization": `Bearer ${accessToken}`
            }
        })

        if (deactivate) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: deactivate.data.message,
            }).then(() => {
                window.location.href = "/dashboards/users";
            });
        }
    } catch (err) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: err.response.data.message,
        })
    }
}

function showKTPModal(namaLengkap, nik, imageSrc) {
    const ktpModal = document.getElementById('showKTPModal');
    const ktpImageElement = document.getElementById('ktpImage');
    const labelElement = document.getElementById('labelShowKTP');
    const nikElement = ktpModal.querySelector('.modal-nik');

    ktpImageElement.src = imageSrc;
    labelElement.textContent = 'Foto KTP - ' + namaLengkap;
    nikElement.textContent = 'NIK: ' + nik;

    const bootstrapModal = new bootstrap.Modal(ktpModal);
    bootstrapModal.show();
}


document.getElementById('btn-addUser').addEventListener('click', async function (event) {
    event.preventDefault();

    const formData = new FormData();

    formData.append("nik", document.getElementById("nik").value);
    formData.append("namaLengkap", document.getElementById("namaLengkap").value);
    formData.append("noTelp", document.getElementById("noTelp").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("username", document.getElementById("username").value);
    formData.append("tanggalLahir", document.getElementById("tanggalLahir").value);
    formData.append("fotoKTP", document.getElementById("fotoKTP").files[0]);
    formData.append("roles", document.getElementById("pilih-roles").value);
    formData.append("pendamping", document.getElementById("pilih-pendamping2").value);
    formData.append("desa", document.getElementById("pilih-desa").value);
    formData.append("password", document.getElementById("password").value);
    formData.append("retype_password", document.getElementById("retype_password").value);

    try {
        const response = await axios.post(`${window.apiEndpoint}/admin/register-account`, formData, {
            headers: {
                "Authorization": `Bearer ${accessToken}`,
                "Content-Type": "multipart/form-data",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        });

        if (response) {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message,
            }).then(() => {
                axios.get(`${window.apiEndpoint}/users`, {
                    headers: {
                        "Authorization": `Bearer ${accessToken}`,
                    }
                })
                window.location.href = "/dashboards/users";
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: response.data.message,
            })
        }
    } catch (err) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: err.response.data.message,
        })
    }
});

