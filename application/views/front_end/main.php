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
            <h6> <?php echo $list['indo_positif_covid'] ?></h6>
        </div>
    <div class="container-fluid">
        <div class="box_search">
            <div class="row">
                <div class="col-md-2">
                    <select name="type_kendaraan" id="type_kendaraan" class="form-control">
                        <option value=""> Type Kendaraan </option>
                        <option value="kapal"> Kapal </option>
                        <option value="bis"> Bis </option>
                    </select>
                </div>


                <div class="col-md-2">
                    <select name="rute_perjalanan" id="rute_perjalanan" class="form-control">
                        <option value=""> Rute ASAL </option>
                        <option value=""> Pilih Rute</option>
                        <option> Makasar  </option>
                        <option> Jakarta  </option>
                        <option> Bandung  </option>
                        <option> Jakarta  </option>
                        <option> Jakarta  </option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select name="rute_perjalanan" id="rute_perjalanan" class="form-control">
                        <option value=""> Rute TUJUAN </option>
                        <option value=""> Pilih Rute</option>
                        <option> Makasar  </option>
                        <option> Jakarta  </option>
                        <option> Bandung  </option>
                        <option> Jakarta  </option>
                        <option> Jakarta  </option>
                    </select>
                </div>

                <div class="col-md-2" style="margin-top:15px">
                   <h6>Tanggal Berangkat</h6>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" placeholder='Tanggal Berangkat'>
                </div>

                <div class="col-md-1">
                   <button class="btn btn-info btn-sm search_btn" style="width:100%; padding-bottom:30px"> SEARCH </button>
                </div>
            </div>
        </div>


        
        <div class="box_search">
            <div class="row">
                <div class="col-md-12">
                <center>
                <div class="row" style="margin-left:30px">
                    <?php for($x=1; $x<=8; $x++) {?>
                        <div class="col-sm-6 col-sm-6 col-md-3" style="margin-top:40px; margin-left:-17px">
                            <img src="<?php echo base_url().'assets/images/bus1.jpg'; ?>" width="230px" height="150px">
                            <p> KAPAL INDO54 <br><b> Jakarta - Surabaya </b><br>
                             <h6> 06:00 - 08:00 </h6>
                            <hr>
                         
                            <button class="btn btn-success btn-sm img_content" data-toggle="modal" data-target="#booking"> Booking </button>
                        </div> 
                    <?php } ?>
                </div>
                </center>
                </div>

             
            </div>
        </div>
    </div>
    <div class="box_footer">
            @copyright Perusahaan Gas Negara 
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
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
       
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
