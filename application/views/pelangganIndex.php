<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>
<body style="margin: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <b class="col-md-10">Data Pelanggan</b>
            <center><button data-toggle="modal" data-target="#addModal" class="btn btn-success">Tambah Data</button></center>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Umur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
 
    <!-- Modal Tambah-->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control"></input>
					<div class="invalid-feedback nama-error">
						<span id="name_error" class="text-danger"></span>
                	</div>
                </div>
                <div class="form-group">
                    <label for="alamat">Tempat, Tanggal Lahir</label>
                    <input type="text" name="tempatLahir" class="form-control"></input>
					<div class="invalid-feedback tempatLahir-error">
                    	<?= form_error('tempatLahir') ?>
                	</div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control"></input>
					<div class="invalid-feedback alamat-error">
                    	<?= form_error('alamat') ?>
                	</div>
                </div>
                <div class="form-group">
                    <label for="hobi">Umur</label>
                    <input type="text" name="umur" class="form-control"></input>
					<div class="invalid-feedback umur-error">
					<?= form_error('alamat') ?>
					</div>
                </div>
 
            </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-success" id="btn_add_data">Simpan</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>
 
    <!-- Modal Edit-->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Edit Data</h4>
          </div>
          <div class="modal-body">
            <form>
				<input type="hidden" name="id_edit" class="form-control"></input>
                <div class="form-group">
                    <label >Nama</label>
                    <input type="text" name="nama_edit" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label >Tempat Tanggal Lahir</label>
                    <input type="text" name="tempatLahir_edit" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label >Alamat</label>
                    <input type="text" name="alamat_edit" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label >Umur</label>
                    <input type="text" name="umur_edit" class="form-control"></input>
                </div>
 
            </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-success" id="btn_update_data">Update</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>
 
</html>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data();
        //Menampilkan Data di tabel
        function tampil_data(){
            $.ajax({
                url: '<?php echo base_url(); ?>PelangganController/ambilData',
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var i;
                    var no = 0;
                    var html = "";
                    for(i=0;i < response.length ; i++){
                        no++;
                        html = html + '<tr>'
                                    + '<td>' + no  + '</td>'
                                    + '<td>' + response[i].id  + '</td>'
                                    + '<td>' + response[i].nama  + '</td>'
                                    + '<td>' + response[i].tempatLahir  + '</td>'
                                    + '<td>' + response[i].alamat  + '</td>'
                                    + '<td>' + response[i].umur  + '</td>'
                                    + '<td style="width: 16.66%;">' + '<span><button data-id="'+response[i].id+'" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="'+response[i].id+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
                                    + '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
 
            });
        }
        //Hapus Data dengan konfirmasi
        $("#tbl_data").on('click','.btn_hapus',function(){
            var id = $(this).attr('data-id');
            var status = confirm('Yakin ingin menghapus?');
            if(status){
                $.ajax({
                    url: '<?php echo base_url(); ?>PelangganController/hapusData',
                    type: 'POST',
                    data: {id:id},
                    success: function(response){
                        tampil_data();
                    }
                })
            }
        })
        //Menambahkan Data ke database
        $("#btn_add_data").on('click',function(){
            var nama = $('input[name="nama"]').val();
            var tempatLahir = $('input[name="tempatLahir"]').val();
            var alamat = $('input[name="alamat"]').val();
            var umur = $('input[name="umur"]').val();
            $.ajax({
                url: '<?php echo base_url(); ?>PelangganController/tambahData',
                type: 'POST',
                data: {nama:nama,tempatLahir:tempatLahir,alamat:alamat,umur:umur},
                success: function(response){
					if (response != true){
						console.log(response)
						$('#name_error').html(response.name_error);
						// $('.tempatLahir"]').html(response.tempatLahir);
						// $('.alamat-error"]').html(response.alamat);
						// $('.umur-error"]').html(response.umur);
					}else{
						$('input[name="nama"]').val("");
						$('input[name="tempatLahir"]').val("");
						$('input[name="alamat"]').val("");
						$('input[name="umur"]').val("");
						$("#addModal").modal('hide');
						tampil_data();
					}
                }
            })
 
        });
        //Memunculkan modal edit
        $("#tbl_data").on('click','.btn_edit',function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo base_url(); ?>PelangganController/ambilDataById',
                type: 'POST',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $("#editModal").modal('show');
                    $('input[name="id_edit"]').val(response[0].id);
                    $('input[name="nama_edit"]').val(response[0].nama);
                    $('input[name="tempatLahir_edit"]').val(response[0].tempatLahir);
                    $('input[name="alamat_edit"]').val(response[0].alamat);
                    $('input[name="umur_edit"]').val(response[0].umur);
                }
            })
        });
 
        //Meng-Update Data
        $("#btn_update_data").on('click',function(){
            var id = $('input[name="id_edit"]').val();
            var nama = $('input[name="nama_edit"]').val();
            var tempatLahir = $('input[name="tempatLahir_edit"]').val();
            var alamat = $('input[name="alamat_edit"]').val();
            var umur = $('input[name="umur_edit"]').val();
			console.log(id, nama, tempatLahir, alamat, umur);
            $.ajax({
                url: '<?php echo base_url(); ?>PelangganController/perbaruiData',
                type: 'POST',
                data: {id:id,nama:nama,tempatLahir:tempatLahir,alamat:alamat,umur:umur},
                success: function(response){
                    $('input[name="id_edit"]').val("");
                    $('input[name="nama_edit"]').val("");
                    $('input[name="tempatLahir_edit"]').val("");
                    $('input[name="alamat_edit"]').val("");
                    $('input[name="umur_edit"]').val("");
                    $("#editModal").modal('hide');
                    tampil_data();
                }
            })
        });
    });
</script>
