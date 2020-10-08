<html>
<head>
    <title>Perusahaan Gas Negara - Mudik</title>
     <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>"> 
</head>
<style>
    body{
        background-color:#e9e8e3;
    }
    .box_header{
        background-color:white;
        height:15%;
        width:90%;
        border-radius:10px;
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
        height:50%;
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
        height:35px;
        padding-bottom:10px;
    }
</style>
<body>
<img src="<?php echo base_url().'assets/image/pgn.png' ?>" alt="">
<center>
    <div class="container-fluid">
        <div class="box_header">
        </div>

        <div class="box_search">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-3">
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-3">
                    <select name="" class="form-control">
                        <option value=""> Pilih Rute</option>
                        <option> Makasar - Depok  </option>
                        <option> Jakarta - Bandung </option>
                        <option> Bandung - Surabaya </option>
                        <option> Jakarta - Bogor </option>
                        <option> Jakarta - Tanggerang </option>
                    </select>
                </div>

                <div class="col-md-3">
                   <button class="btn btn-info btn-sm search_btn" style="width:100%"> Searcg </button>
                </div>
            </div>
        </div>

        <div class="box_content">

        </div>
    </div>
</center>
</body>
</html>