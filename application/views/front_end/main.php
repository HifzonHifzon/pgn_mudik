<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan Gas Negara - Mudik</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>"> 
</head>
<style>
    img {
        border-radius : 10px;
    }
    body{
        background-color:#e9e8e3;
    }
    .box_header{
        background-color:#17a2b8;
        padding-top:5px;
        width:95%;
        border-radius:10px;
    }

    .box_footer{
        background-color:#17a2b8;
        color:white;
        width:95%;
        border-radius:10px;
        margin-top:20px;
        font-weight:bold;
    }
    .box_search{
        background-color:white;
        padding:12px;
        width:90%;
        border-radius:10px;
        margin-top:10px;
    }
    .container_fluid {
        text-align:center;
        vertical-align: middle;
    }

    .box_content{
        background-color:white;
        width:90%;
        border-radius:10px;
        margin-top:10px;
    }

    .content{
        background-color:white;
        width:90%;
        border-radius:10px;
        margin-top:10px;
    }

    input, select {
        margin-top:10px;
    }

    .search_btn {
        margin-top:10px;
        padding:12px;
        height:30px;
        width:400px;
        padding-bottom:10px;
        font-weight:bold;

    }

    .img_content {
        margin-top:5px;
    }

    H3 {
        color:white;
        padding-bottom:13px;
    
    }
</style>
<body>
<center>
        <div class="box_header">
            <H3>   Bersama PGN Mudik Bersama  </H3> 
            <h6> </h6>
        </div>
    <div class="container-fluid">
        <div class="box_search">
        <form action="<?php echo site_url('main/index/'); ?>" method="post">

            <!-- list refrensi dari tbl_master_jenis_transportasi -->
            <div class="row">
                <div class="col-md-2">
                    <select name="name_transportasi" id="type_kendaraan" class="form-control">
                        <option value=""> Name Transportasi </option>
                        <?php foreach($list_transportasi as $key) {?>
                                <option value="<?php echo $key->id_transportasi; ?>">
                                    <?php echo $key->name_transportasi; ?>
                                </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- List Asal dan Tujuan sudah ditentukan berdasarkan Kota yang telah dijadwalkan admin -->
                <div class="col-md-2">
                    <select name="rute_perjalanan" id="rute" class="form-control">
                        <option value=""> Rute ASAL </option>
                        <?php foreach($list_kota_berangkat as $keys) { ?>
                            <option value="<?php echo $keys->id_rute; ?>">
                                <?php echo $keys->asal. " - ".$keys->tujuan; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>

               
                <div class="col-md-2">
                    <input type="date" class="form-control" name="tanggal_berangkat" placeholder='Tanggal Berangkat'>
                </div>

                <div class="col-md-2">
                   <button class="btn btn-info btn-sm search_btn" name="q" style="width:100%; padding-bottom:30px"> SEARCH </button>
                </div>

                <div class="col-md-4">
                  <h6> Info Kesembuhan Covid-19 Indonesia : </h6> <h4> <?php echo $data_covid[0]->sembuh; ?> </h4>
                  <h6> API <i> : https://api.kawalcorona.com/indonesia/ </i></h6>
                </div>
            </div>
        </div>

        </form>
        
        <div class="box_search">
            <div class="row">
                <div class="col-md-12">
                <center>
                <div class="row" style="margin-left:30px">
                <?php
				if (count((array)$ListBerita) > 0) {
					foreach($ListBerita as $row)
					{ ?>
                        <div class="col-sm-6 col-sm-6 col-md-3" style="margin-top:40px; margin-left:-17px">
                            <img src="<?php echo base_url().'assets/bis/'.$row['image']; ?>" width="230px" height="150px">
                            <p> <?php echo $row['name_transportasi']; ?> <br><b> <?php echo $row['asal']. " - ".$row['tujuan'];?> </b><br>
                             <h6> <?php echo $row['tanggal_berangkat']; ?> </h6>
                            <hr>
                        
                            <button class="btn btn-success btn-sm img_content" data-toggle="modal" data-target="#booking" onclick="booking(<?php echo $row['id_berangkat']; ?>)">
                             Daftar </button>
                            <hr>
                        </div> 
                    
                  <?php
					}
					echo "<center> <h2 margin-bottom:10px; text-align:center>".$this->pagination->create_links()."</h2> </center>";
				} else {
					echo "<center> <h4> Rute perjalanan yang dicari tidak ada </h4> </center>";
				}
				?>
                </div>
                </center>
                </div>          
            </div>
        </div>
    </div>
    
    <div class="box_footer">
            Perusahaan Gas Negara 
    </div>
</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.js' ?>"></script>
<script src="<?php echo base_url().'assets/sweetalertjs/sweetAlert.min.js' ?>" type="text/javascript"></script>
</body>
</html>




<div class="modal" id="booking">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Booking Mudik Gratis</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">

      <form class="form-horizontal" action="<?php echo base_url().'main/do_upload_images'?>"  method="POST" enctype='multipart/form-data'>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    Nama Lengkap 
                </div>
                <div class="col-xs-3 col-md-1">
                    :
                </div>
                <div class="col-xs-3 col-md-3">
                    <input type="hidden" class="form-control id_berangkat" name="id_berangkat" value="">
                    <input type="text" class="form-control" name="nama_lengkap">
                </div>
            </div>


            <div class="row">
                <div class="col-xs-3 col-md-3">
                    Jenis Kelamin
                </div>
                <div class="col-xs-3 col-md-1">
                    :
                </div>
                <div class="col-xs-3 col-md-3">
                    <input type="radio"  name="jeniskelamin" value="pria" checked> Pria
                    <input type="radio"  name="jeniskelamin" value="perempuan"> Perempuan
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-md-3">
                    Email
                </div>
                <div class="col-xs-3 col-md-1">
                    :
                </div>
                <div class="col-xs-3 col-md-3">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-md-3">
                   Upload KTP & Foto 
                </div>
                <div class="col-xs-3 col-md-1">
                    :
                </div>
                <div class="col-xs-3 col-md-3">
                    <input type="file" name="files[]" multiple="">
                </div>
            </div>


            <div class="row">
                <div class="col-xs-3 col-md-3">
                    Jumlah yang didaftarkan
                </div>
                <div class="col-xs-3 col-md-1">
                    :
                </div>
                <div class="col-xs-3 col-md-3">
                    <input type="text" name="jumlah_peserta" class="form-control">
                </div>
            </div>
      </div>


      <div class="modal-footer">
      <input type="submit" name="submit" id="submit" />
      </div>

      </form>

    </div>
  </div>
</div>


<script>
    $('input[name="ktp"]').keyup(function(e) {
        if (/\D/g.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
    $('input[name="jumlah_orang"]').keyup(function(e) {
        if (/\D/g.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });

    function booking(id_berangkat) {
        $('.id_berangkat').val(id_berangkat);
        $('#upload_file').submit(function(e) {
            e.preventDefault();
            $.ajaxFileUpload({
                url 			:'<?php echo base_url().'main/booking' ?>', 
                secureuri		:false,
                fileElementId	:'userfile',
                dataType		: 'json',
                data			: {
                    id : id_berangkat 
                },
                success	: function (res)
                {
                    alert('assad');
                }
            });
            return false;
	});

    }

  
    
</script>