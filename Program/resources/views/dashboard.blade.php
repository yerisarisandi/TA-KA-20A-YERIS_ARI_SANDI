<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    
    {{-- <p>Selamat Datang, {{$isi_session}}</p> --}}
    <button id="btn_logout">Logout</button>

    <!--- kode js -->
    <script>
        //deklarasi variabel komponen
        let btn_logout = document.querySelector("#btn_logout");

        //event untuk "btn_logout"
        btn_logout.addEventListener("click",function(){
            //alihkan ke halaman logout
            location.href = "{{url('logout')}}";
        });
    </script>



</body>
</html>