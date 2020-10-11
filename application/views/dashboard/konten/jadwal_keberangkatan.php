<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $data['title'] ?></h4>
        <div class="pull-right">
            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#add_jadwal_keberangkatan" > Add </button>
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
                    <th>Kode Transportasi</th>
                    <th>Name Transportasi</th>
                    <th>Jenis Transportasi</th>
                    <th>Slot </th>
                    <th>Status Aktif </th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data['result'] as $key)  {?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $key->kode_transportas; ?></td>
                        <td><?php echo $key->name_transportasi; ?></td>
                        <td><?php echo $key->name_jenis; ?></td>
                        <td><?php echo $key->slot; ?></td>
                        <td><?php echo ($key->status_aktif == 1) ? "<button class='btn btn-sm btn-success'  value='ON'> ON </button>" : "<button class='btn btn-sm btn-warning' value='OFF'> OFF </button>"  ; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<div class="modal" id="add_jadwal_keberangkatan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Add Trasnportasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    Kode Transportasi
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" id="kode_transportasi">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Nama Transportasi
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" id="name_transportasi" >
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Jenis Transportasi
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <select name="jenis" id="jenis_transportasi" class="form-control" id="jenis_transportasi">
                       <?php foreach($data['jenis_transportasi'] as $key) {?>
                                <option value="<?php echo $key->id_jenis_transportasi; ?>"> <?php echo $key->name_jenis; ?> </option>
                       <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    SLOT Penumpang
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" id="slot" >
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-4">
                    Status
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                <select name="status" class="form-control" id="status">
                        <option value="1">ON</option>
                        <option value="0">OFF</option>
                </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onClick="return add()">Submit</button>
      </div>

    </div>
  </div>
</div>


<script>

function add() {
   
    let kode_transportasi    = $('#kode_transportasi').val();
    let name_transportasi   = $('#name_transportasi').val();
    let jenis_transportasi  = $('#jenis_transportasi').val();
    let slot                = $('#slot').val();
    let status              = $('#status').val();

    $.ajax({
        url : "<?php echo base_url().'dashboard/Transportasi/store'; ?>",
        data : {
            name_transportasi : name_transportasi,
            slot : slot,
            jenis_transportasi : jenis_transportasi,
            status : status,
            kode_transportasi : kode_transportasi
        },
        type : 'POST',
        dataType:"JSON",
        success:function(res) {
            swal({title: "Good job", text: res.message, type: 
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