<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $data['title'] ?></h4>
        <div class="pull-right">
            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#add_transportasi" > Add </button>
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
                    <th>Action </th>
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
                        <td> 
                                <button class="btn btn-danger btn-sm" value="<?php echo $key->id_transportasi; ?>" onclick="return delete_(this.value)"> Delete </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<div class="modal" id="add_transportasi">
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
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="text" class="form-control" id="kode_transportasi_txt">
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
                    <input type="text" class="form-control" id="name_transportasi_txt" >
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
                    <select name="jenis" class="form-control" id="jenis_transportasi_txt">
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
                    <input type="text" class="form-control" id="slot_txt" >
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
                <select name="status" class="form-control" id="status_txt">
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
    var kode_transportasi    = $('#kode_transportasi_txt').val();
    var name_transportasi   = $('#name_transportasi_txt').val();
    var jenis_transportasi  = $('#jenis_transportasi_txt').val();
    var slot                = $('#slot_txt').val();
    var status              = $('#status_txt').val();

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

function delete_(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                url : "<?php echo base_url().'dashboard/Transportasi/delete'; ?>",
                   data : {
                       id : id
                   },
                   type : 'POST',
                   dataType : 'JSON',
                   success:function(res){
    
                    if (res.status == 'success')  {
                        swal({title: "Good job", text: res.message, type: 
                            "success"}).then(function(){ 
                            location.reload();
                            }
                        );
                    } 
                   }
               })
            } else {
                swal("Data cancelled delete");
            }
            });
    }


</script>