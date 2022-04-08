<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"/>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Register Page</title>
    </head>
    <body>
        <section class="text-center">
            <div class="p-5 bg-image" style="
                background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
                height: 300px;">
            </div>
            <div class="card mx-4 mx-md-5 shadow-5-strong" style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
                <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-5">Register Akun</h2>
                            <form id="formCreate" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="username" id="username" class="form-control" />
                                            <label class="form-label" for="form3Example1">Username</label>
                                            <span class="text-danger small" id="usernameerror"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="number" name="nik" id="nik" class="form-control" />
                                            <label class="form-label" for="form3Example2">Nik</label>
                                            <span class="text-danger small" id="nikerror"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control" />
                                    <label class="form-label" for="form3Example3">Email</label>
                                    <span class="text-danger small" id="emailerror"></span>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password" class="form-control" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <span class="text-danger small" id="passworderror"></span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4">Registrasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#formCreate', function(event){  
                event.preventDefault();  
                var username = $('#username').val();    
                var nik = $('#nik').val(); 
                var email = $('#email').val(); 
                var password = $('#password').val(); 
                $.ajax({
                    url: "{{ url('/register/success') }}",
                    cache: false,  
                    method:'POST',  
                    data:  $(this).serialize(),
                    success: function(data){
                        Swal.fire({
                            title: 'data berhasil ditambahkan',
                            text: "sukses",
                            icon: 'success',
                            confirmButtonColor: '#004028',
                            confirmButtonText: 'Yes',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "/";
                            }
                        });
                    },
                    error:function (response) {
                        $("#usernameerror").hide().text(response.responseJSON.errors.username).fadeIn('slow').delay(2000).hide(1);
                        $("#nikerror").hide().text(response.responseJSON.errors.nik).fadeIn('slow').delay(2000).hide(1);
                        $("#emailerror").hide().text(response.responseJSON.errors.email).fadeIn('slow').delay(2000).hide(1);
                        $("#passworderror").hide().text(response.responseJSON.errors.password).fadeIn('slow').delay(2000).hide(1);
                    }
                })
            }); 
    </script>
  </body>
</html>