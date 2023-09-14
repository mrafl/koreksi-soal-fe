const emailInput = document.getElementById('email');
const emailError = document.getElementById('emailError');

emailInput.addEventListener('input', function () {
    const emailValue = this.value.trim();

    if (!isValidEmail(emailValue)) {
        emailError.style.display = 'block';
        this.classList.add('is-invalid');
    } else {
        emailError.style.display = 'none';
        this.classList.remove('is-invalid');
    }
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

const noTelpInput = document.getElementById('noTelp');
const noTelpError = document.getElementById('noTelpLengthError');

noTelpInput.addEventListener('input', function () {
    const noTelpValue = this.value.trim();

    if (noTelpValue.length <= 10) {
        noTelpError.style.display = 'block';
        this.classList.add('is-invalid');
    } else {
        noTelpError.style.display = 'none';
        this.classList.remove('is-invalid');
    }
});

const usernameInput = document.getElementById('username');
const usernameError = document.getElementById('usernameError');

usernameInput.addEventListener('input', function () {
    const usernameValue = this.value.trim();

    if (!isUsernameValid(usernameValue)) {
        usernameError.style.display = 'block';
        this.classList.add('is-invalid');
    } else {
        usernameError.style.display = 'none';
        this.classList.remove('is-invalid');
    }
});

function isUsernameValid(username) {
    return username.length >= 6;
}

const namaLengkapInput = document.getElementById('namaLengkap');
const namaLengkapError = document.getElementById('namaLengkapError');

namaLengkapInput.addEventListener('input', function () {
    const namaLengkapValue = this.value.trim();

    if (namaLengkapValue.length < 3) {
        namaLengkapError.style.display = 'block';
        this.classList.add('is-invalid');
    } else {
        namaLengkapError.style.display = 'none';
        this.classList.remove('is-invalid');
    }
});

document.getElementById("registerForm").addEventListener("submit", function (e) {
     e.preventDefault();

     const payload = {
            email: document.getElementById("email").value,
            noTelp: document.getElementById("noTelp").value,
            username: document.getElementById("username").value,
            namaLengkap: document.getElementById("namaLengkap").value,
            password: document.getElementById("password").value,
            retype_password: document.getElementById("retype_password").value,
     }

     // Kirim data form ke REST API menggunakan axios
     axios.post(`${window.apiEndpoint}/auth/register`, payload)
     .then((response) => {
          //tampilkan pesan sukses dan redirect ke halaman login
          Swal.fire({
               icon: "success",
               title: "Berhasil",
               text: response.data.message,
          }).then(() => {
               window.location.href = "/auth/login";
          });
     })
     .catch((error) => {
          Swal.fire({
               icon: "error",
               title: "Oops...",
               text: error.response.data.message,
          });
     });
});

const passwordInput = document.getElementById('password');
const retypePasswordInput = document.getElementById('retype_password');
const passwordError = document.getElementById('passwordError');
const retypePasswordError = document.getElementById('retypePasswordError');

passwordInput.addEventListener('input', function () {
    const passwordValue = this.value.trim();

    if (!isPasswordValid(passwordValue)) {
        passwordError.style.display = 'block';
        this.classList.add('is-invalid');
    } else {
        passwordError.style.display = 'none';
        this.classList.remove('is-invalid');
    }
});

retypePasswordInput.addEventListener('input', function () {
    const passwordValue = passwordInput.value.trim();
    const retypePasswordValue = this.value.trim();

    if (passwordValue !== retypePasswordValue) {
        retypePasswordError.style.display = 'block';
        this.classList.add('is-invalid');
    } else {
        retypePasswordError.style.display = 'none';
        this.classList.remove('is-invalid');
    }
});

function isPasswordValid(password) {
    return password.length >= 8;
}

const registerButton = document.getElementById('btn-signup'); // Tombol "Daftar"
const formInputs = document.querySelectorAll('input'); // Semua elemen input dalam form

// Buat fungsi untuk memeriksa apakah semua input sudah valid
function checkAllInputsValidity() {
    for (const input of formInputs) {
        if (input.classList.contains('is-invalid') || input.value.trim() === '') {
            return false;
        }
    }
    return true;
}

// Tambahkan event listener pada setiap input untuk memeriksa validitas saat input berubah
for (const input of formInputs) {
    input.addEventListener('input', function () {
        if (this.value.trim() === '') {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
        // Periksa validitas semua input dan aktifkan/tidak tombol "Daftar"
        registerButton.disabled = !checkAllInputsValidity();
    });
}

// Tambahkan event listener pada form saat submit untuk memastikan validasi terakhir
document.getElementById("registerForm").addEventListener("submit", function (e) {
    // Jika validasi belum terpenuhi, hentikan pengiriman form
    if (!checkAllInputsValidity()) {
        e.preventDefault();
    }
});
