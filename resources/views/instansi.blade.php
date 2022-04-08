<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">selamat datang, {{Session::get('username')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="float-left">
        <a class="btn btn-outline-success" type="submit" href="{{ route('user.logout') }}">Logout</a>
      </form>
    </div>
  </div>
</nav>
<div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>
                <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Instansi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="formCreate" method="POST">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Instansi</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="instansi" class="form-control form-control-sm" id="instansi" placeholder="masukkan jabatan..." >
                                            <span class="text-danger small" id="instansierror"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <textarea name="deskripsi" class="form-control form-control-sm" id="deskripsi" placeholder="masukkan jabatan..." ></textarea>
                                            <span class="text-danger small" id="deskripsierror"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display" id="instansiTable" width="100%;">
                        <thead>
                            <tr>
                                <th>Instansi</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Instansi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="formUpdate" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Instansi</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="instansi" class="form-control form-control-sm" id="instansiEdit">
                                            <span class="text-danger small" id="instansierroredit"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <textarea name="deskripsi" class="form-control form-control-sm" id="deskripsiEdit"></textarea>
                                            <span class="text-danger small" id="deskripsierroredit"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="buttonUpdate" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var table = $('#instansiTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength : 6,
                lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']],
                ajax: {
                    url: "{{ route('instansi.index') }}",
                    type: 'GET'
                },
                columns: [
                    { data: 'instansi', name: 'instansi' },
                    { data: 'deskripsi', name: 'deskripsi' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                order: [[0, 'desc']]
            });


            $(document).on('submit', '#formCreate', function(event){  
                event.preventDefault();  
                var instansi = $('#instansi').val();    
                var deskripsi = $('#deskripsi').val();    
                $.ajax({
                    url: "{{ route('instansi.create') }}",
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
                        });
                        $('#formCreate')[0].reset(); 
                        $('#modalCreate').modal('hide');  
                        $('#instansiTable').DataTable().ajax.reload( null, false ); 
                    },
                    error:function (response) {
                        $("#instansierror").hide().text(response.responseJSON.errors.instansi).fadeIn('slow').delay(2000).hide(1);
                        $("#deskripsierror").hide().text(response.responseJSON.errors.deskripsi).fadeIn('slow').delay(2000).hide(1);
                    }
                })
            }); 

            $(document).on("click", ".editInstansi", function () {
                var id = $(this).data('id');
                $.ajax({
                    type:"GET",
                    url: "{{ url('/instansi/edit') }}"+'/'+id,
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                        $('#modalEdit').modal('show');
                        $('#id').val(res.id);
                        $('#instansiEdit').val(res.instansi);
                        $('#deskripsiEdit').val(res.deskripsi);
                    }
                });
            });

            $(document).on('click', '#buttonUpdate', function(event){  
                event.preventDefault(); 
                var instansi = $('#instansiEdit').val();    
                var deskripsi = $('#deskripsiEdit').val();    
                var id = $('#id').val();  
                $.ajax({
                    url: "{{ url('/instansi/update') }}"+'/'+id,
                    cache: false,
                    method:"POST",
                    data: $('#formUpdate').serialize(),
                    success: function(data){
                        Swal.fire({
                            title: 'data berhasil diupdate',
                            text: "sukses",
                            icon: 'success',
                            confirmButtonColor: '#004028',
                            confirmButtonText: 'Oke',
                            allowOutsideClick: false
                        });
                        $('#formUpdate')[0].reset(); 
                        $('#modalEdit').modal('hide');
                        $('#instansiTable').DataTable().ajax.reload( null, false );      
                    },
                    error:function (response) {
                        $("#instansierroredit").hide().text(response.responseJSON.errors.instansi).fadeIn('slow').delay(2000).hide(1);
                        $("#deskripsierroredit").hide().text(response.responseJSON.errors.deskripsi).fadeIn('slow').delay(2000).hide(1);
                    }
                })
            });  

            $(document).on('click', '.delete', function(){  
                var id = $(this).attr("data-id");  
                Swal.fire({
                    title: 'Apakah anda yakin untuk menghapus data ini ?',
                    text: "data akan dihapus secara permanen !",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#004028',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('/instansi/delete') }}"+'/'+id,
                            cache: false,
                            method:"DELETE",  
                            data: { id: id },
                            success: function(data){
                                $('#instansiTable').DataTable().ajax.reload( null, false );       
                            },
                            error: function(){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Maaf...',
                                    text: 'Ada Kesalahan !',
                                })
                            }
                        }),
                        Swal.fire({
                            title: 'Terhapus',
                            text: "Data berhasil dihapus",
                            icon: 'success',
                            confirmButtonColor: '#004028',
                            allowOutsideClick: false
                        })
                    }
                });
            });  
        });
        </script>
  </body>

</html>