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
                    <th>Asal </th>
                    <th>Tujuan </th>
                    <th>Transportasi </th>
                    <th>Kapasitas </th>
                    <th>Jumlah Peserta </th>
                    <th>Sisa Slot </th>
                    <th>Tanggal Berangkat</th>
                    <th>Status </th>
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
                        <td><?php echo ($key->status == 1) ? "<button class='btn btn-sm btn-success'  value='ON'> ON </button>" : "<button class='btn btn-sm btn-warning' value='OFF'> OFF </button>"  ; ?></td>
                       
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
        <h4 class="modal-title">Add Jenis</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    Jenis Transportasi
                </div>
                <div class="col-md-1">
                    :
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" id="name_jenis_transportasi">
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


