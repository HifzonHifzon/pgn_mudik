<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $data['title'] ?></h4>
        <h6> <i style="color:red"> SISA SLOT akan berkurang jika sudah di APPROVAL oleh admin di Menu Transaksi Keberangkatan  </i> </h6>
        <div class="pull-right">
            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#add_jadwal_berangkat" > Add </button>
        </div>
        <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="table-responsive">
        <table class="table table-bordered list_data" style="margin:5px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Asal </th>
                    <th>Tujuan </th>
                    <th>Transportasi </th>
                    <th>Kapasitas </th>
                    <th>Jumlah Peserta </th>
                    <th>Sisa Slot </th>
                    <th>Tanggal Berangkat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data['result'] as $key)  {?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $key->asal; ?></td>
                        <td><?php echo $key->tujuan; ?></td>
                        <td><?php echo $key->name_transportasi; ?></td>
                        <td><?php echo $key->kapasitas_transportasi; ?></td>
                        <td><?php echo $key->jumlah_peserta; ?></td>
                        <td><?php echo $key->sisa_slot; ?></td>
                        <td><?php echo $key->tanggal_berangkat; ?></td>
                       
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<div class="modal" id="add_jadwal_berangkat">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Add Jenis</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">

            <div class="row">
                <div class="col-md-4">
                    Asal 
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <select name="id_rute" id="id_rute" class="form-control">
                        <option value="">Pilih Rute </option>
                        <?php for($x=0; $x<sizeof($data['list_rute']); $x++) { ?>
                            <option value="<?php echo $data['list_rute'][$x]->id_rute; ?>"><?php echo $data['list_rute'][$x]->asal. " - ".$data['list_rute'][$x]->tujuan ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Transportasi 
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <select name="id_transportasi" id="id_transportasi" class="form-control">
                        <option value="">Pilih Transportasi </option>
                        <?php for($x=0; $x<sizeof($data['list_transportasi']); $x++) { ?>
                            <option value="<?php echo $data['list_transportasi'][$x]->id_transportasi; ?>"><?php echo $data['list_transportasi'][$x]->name_transportasi; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Tanggal Berangkat 
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="date" id="tanggal_berangkat" class="form-control">
                </div>
            </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="add()">Submit</button>
      </div>

    

    </div>
  </div>
</div>

<script>

function add() {
   
    let id_transportasi    = $('#id_transportasi').val();
    let id_rute   = $('#id_rute').val();
    let tanggal_berangkat  = $('#tanggal_berangkat').val();


    alert(id_transportasi+id_rute+tanggal_berangkat)


    $.ajax({
        url : "<?php echo base_url().'dashboard/JadwalBerangkat/insertJadwalBerangkat'; ?>",
        data : {
            id_transportasi : id_transportasi,
            id_rute : id_rute,
            tanggal_berangkat : tanggal_berangkat,
        },
        type : 'POST',
        dataType:"JSON",
        success:function(res) {
            swal({title: res.status, text: res.message, type: 
                "success"}).then(function(){ 
                location.reload();
                }
            );
        },
        error:function() {
            alert('erro')
        }
    })
}

</script>


