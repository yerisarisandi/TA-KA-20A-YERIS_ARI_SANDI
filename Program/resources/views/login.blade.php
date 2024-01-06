<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- menambahkan csrf token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- gunakan CDN tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-sky-500">
    <!-- tampilan login -->
    <main id="main_login" class="flex items-center justify-center h-screen">
        <!-- frame login -->
        <section id="section_frame" class="w-1/3 border-2 border-indigo-100 rounded-xl p-5 bg-indigo-100">
            <!-- area judul -->
            <section id="section_judul" class="mb-5 text-center">
                Login Aplikasi
            </section>

            <!-- area input -->
            <section id="section_input" class="flex flex-col">
                <!-- buat komponen textfield username dan password -->
                <input type="text" name="txt_username" id="txt_username"
                    class="h-10 border-solid border-2 border-cyan-700 rounded-xl focus:outline-none focus:ring focus:border-blue-500 mb-2.5 p-2.5" placeholder="Isi Username" onkeypress="return setFilterInput(event)" onpaste="return false" oncut="return false" oncopy="return false">

                <input type="password" name="txt_password" id="txt_password"
                    class="h-10 border-solid border-2 border-cyan-700 rounded-xl focus:outline-none focus:ring focus:border-blue-500 p-2.5" placeholder="Isi Password" onkeypress="return setFilterInput(event)" onpaste="return false" oncut="return false" oncopy="return false">
            </section>

            <!-- area checkbox -->
            <section id="section_checkbox" class="mt-2">
                <input type="checkbox" name="chk_ingat" id="chk_ingat">
                <label for="chk_ingat">Ingat Saya</label>
            </section>

            <!-- area tombol-->
            <section id="section_tombol" class="mt-5 text-center">
                <button id="btn_login" class="bg-teal-400 h-8 w-32 rounded-xl" onclick="setLogin()">Login</button>
                <button id="btn_batal" class="bg-teal-400 h-8 w-32 rounded-xl">Batal</button>
            </section>

        </section>
    </main>

    <!-- buat kode dengan js -->
    <script>
        // buat variabel untuk komponen
        // tahap deklarasi dan definisi
        let txt_username = document.getElementById("txt_username");

        // tahap deklarasi
        let txt_password;
        // tahap definisi
        txt_password = document.querySelector("#txt_password");

        let btn_login = document.querySelector("#btn_login");
        let btn_batal = document.querySelector("#btn_batal");
        let chk_ingat = document.querySelector("#chk_ingat");
        
        //variabel untuk cek nilai chk_ingat
        let ingat = 0;

        //buat event untuk chk_ingat
        chk_ingat.addEventListener("click",function(){
            //jika chk_ingat = check
            if(chk_ingat.checked == true)
            {
                ingat = 1;
            }
            //jika chk_ingat = uncheck
            else
            {
                ingat = 0;
            }
            // alert(ingat);
        });


        // buat fungsi untuk proses login
        function setLogin() {
            // ambil nilai dari txt_username dan txt_password
            // jika txt_username atau txt_password tidak diisi
            if (txt_username.value == "" || txt_password.value == "") {
                // tampilkan pesan error
                alert("Username / Password Harus Diisi !");
            }
            // jika txt_username atau txt_password diisi
            else {
                // alert("Username / Password Sudah Diisi");

                // collecting data ke dalam form
                let form = new FormData();
                form.append("username", txt_username.value);
                form.append("password", txt_password.value);
                form.append("ingat", ingat);

                // proses cek data (dengan konsep asyncronous/async JS)
                // 1. promise (fetch)
                // 2. async
                // fetch = untuk mengirim data ke url yang akan memproses data input (form)
                fetch("{{ url('/login/get') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf_token"]').content
                        },
                        body: form
                    })
                    // berfungsi untuk merespon data hasil dari proses fetch
                    .then((response) => response.json())
                    // berfungsi untuk membaca hasil dari response (then yang pertama)
                    .then((result) => {
                        // jika hasil "result" = 1
                        if (result.output == 1) {
                            // alihkan ke halaman dashboard
                            location.href = "{{ url('/') }}";
                        }
                        // jika hasil "result" != 1
                        else {
                            alert("Username / Password Tidak Ditemukan !");
                        }
                    })
                    // jika proses "fetch" gagal
                    .catch((error) => {
                        alert("Data Gagal Dikirim !")
                    });

            }


        }

        // event untuk btn_batal
        // btn_batal.addEventListener('click',
        // function(){
        //     alert("Klik Tombol Batal");
        // })
        btn_batal.addEventListener('click', setRefresh);

        function setRefresh() {
            location.href = "{{ url('/login') }}";
        }
        function setFilterInput(e)
       {
            // inisialisasi variabel 
            let key_code = document ? e.keyCode : e.which;


            // Blok character "=","space","(")","(')",
            if(key_code == 61 || key_code == 32 || key_code == 34 || key_code == 39)
            {
                return false;
            }
            else
            {
                return true;
            }

       } 
       
    </script>
</body>

</html>
