document.getElementById('LoginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let getid = document.getElementById('id').value;
    let getpassword = document.getElementById('password').value;

    if(getid == 'user' && getpassword == 'user1234'){
        window.location.href = 'index.html';
    }
    if(getid == 'admin' && getpassword == 'admin1234'){
        window.location.href = 'admin.php';
    }
    // menampilkan pesan error dan mengubah warna border menjadi merah
    else{
        document.getElementById('errorMessage').style.display = 'block';
        document.getElementById('errorMessage').innerText = 'Error: ID tidak ditemukan.';
        document.getElementById('id').style.borderColor = 'red';
        document.getElementById('password').style.borderColor = 'red';
    }

    //mengembalikan warna border kembali normal setelah waktu yang ditentukan
    setTimeout(function() {
        document.getElementById('id').style.borderColor = '';
        document.getElementById('password').style.borderColor = '';
    }, 7000);
    setTimeout(function(){
        document.getElementById('errorMessage').style.display = 'none';
    }, 7000);
});