<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $data['title'] ?></h4>
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
                    <th>Nama Peserta</th>
                    <th>Jumlah Peserta</th>
                    <th>Asal </th>
                    <th>Tujuan</th>
                    <th>Transportasi</th>
                    <th>KTP</th>
                    <th>Tanggal Berangkat</th>
                    <th>Verifikasi</th>
                    <th>Status Verivikasi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data['result'] as $key)  {?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $key->peserta; ?></td>
                        <td><?php echo $key->jumlah_peserta; ?></td>
                        <td><?php echo $key->asal; ?></td>
                        <td><?php echo $key->tujuan; ?></td>
                        <td><?php echo $key->name_transportasi; ?></td>
                        <td> 
                              <a  data-toggle="modal" data-target="#detail_ktp" onclick="detail_ktp(<?php echo $key->id_peserta; ?>)">DETAIL</a>
                        </td>
                        <td><?php echo $key->tanggal_berangkat; ?></td>
                        <td>
                                <?php echo ($key->verifikasi == 'yes') ? 
                                        "-" 
                                        : "<button class='btn btn-sm btn-primary' value='$key->id_transaksi_berangkat' onclick='verifikasi(this.value)'> Belum di verifikasi </button>"  ; 
                                ?>
                        </td>
                        <td>
                                <?php echo ($key->verifikasi == 'yes') ? 
                                        "<button class='btn btn-sm btn-success'  value='ON'> Done Verifikasi </button>" 
                                        : "<button class='btn btn-sm btn-warning' value='OFF'> Belum di verifikasi </button>"  ; 
                                ?>
                                </td>
                    </tr>  
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<div class="modal" id="detail_ktp">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Detail KTP & Foto </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">      
        <div id="show_ktp">
        </div>
      </div>
     

    </div>
  </div>
</div>


