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
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data['result'] as $key)  {?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $key->asal; ?></td>
                        <td><?php echo $key->tujuan; ?></td>
                        <td><?php echo ($key->aktif == 1) ? "<button class='btn btn-sm btn-success'  value='ON'> ON </button>" : "<button class='btn btn-sm btn-warning' value='OFF'> OFF </button>"  ; ?></td>
                        <td>
                        <button class="btn btn-danger btn-sm" value="<?php echo $key->id_rute; ?>" onclick="return delete_(this.value)"> Delete </button>
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
                    Asal 
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" id="asal">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                   Tujuan
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" id="tujuan" >
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                   Tujuan
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                  <select name="status" id="status">
                    <option value="1"> Aktif </option>
                    <option value="0"> Non Aktif </option>
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
   
    let asal    = $('#asal').val();
    let tujuan   = $('#tujuan').val();
    let status  = $('#status').val();


    $.ajax({
        url : "<?php echo base_url().'dashboard/Rute/store'; ?>",
        data : {
            asal : asal,
            tujuan : tujuan,
            status : status,
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
            title: "",
            text: "Are you delete this data ?!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                url : "<?php echo base_url().'dashboard/Rute/delete'; ?>",
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