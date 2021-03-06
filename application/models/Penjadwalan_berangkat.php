<?php


class Penjadwalan_berangkat extends CI_Model {
    
    public function getBerangkat() {
        $query = "select 	
                    a.tanggal_berangkat,
                    IF(z.jumlah_peserta IS NULL, 0, z.jumlah_peserta) as 'jumlah_peserta',
                    b.slot as 'kapasitas_transportasi',
                    b.name_transportasi,
                    IF( (b.slot-z.jumlah_peserta) IS NULL, b.slot, (b.slot-z.jumlah_peserta)) as 'sisa_slot',
                    c.asal,
                    c.tujuan,
                    a.status 
                from tbl_jadwal_berangkat AS a 
                    inner join (
                            SELECT  
                                x.id_transportasi, 
                                x.name_transportasi, 
                                x.slot
                            from tbl_master_transportasi as x inner join tbl_master_jenis_transportasi as y 
                                        on x.jenis_transportasi = y.id_jenis_transportasi
                                    ) as b on a.id_transportasi = b.id_transportasi  
                    inner join tbl_master_rute as c on a.id_rute = c.id_rute
                    left join (select 
                        id_jadwal_berangkat, 
                        sum(jumlah_peserta)  as jumlah_peserta 
                   from tbl_transaksi_berangkat where verifikasi = 'yes' group by id_jadwal_berangkat) as z 
                   on a.id_berangkat = z.id_jadwal_berangkat";

            $jadwal_berangkat = $this->db->query($query)->result();
            return $jadwal_berangkat;
    }

    public function getTransaksiBerangkat() {
        $query  =  "SELECT 				
                        z.name as 'peserta',
                        j.name_transportasi,
                        a.jumlah_peserta,
                        j.asal,
                        j.tujuan,
                        a.verifikasi,
                        j.tanggal_berangkat,
                        a.id_transaksi_berangkat,
                        a.id_peserta,
                        j.tanggal_berangkat
                    FROM tbl_transaksi_berangkat AS a 
                            inner join tbl_peserta as z on z.id_peserta = a.id_peserta
                            inner join 
                                (
                                    select 
                                        x.id_berangkat,
                                        y.name_transportasi,
                                        u.asal, 
                                        u.tujuan,
                                        x.tanggal_berangkat
                                    from tbl_jadwal_berangkat as x
                                        inner join tbl_master_transportasi as y on y.id_transportasi = x.id_transportasi
                                        inner join tbl_master_rute as u on u.id_rute = x.id_rute
                                ) as j on a.id_jadwal_berangkat = j.id_berangkat";
        $transaksi = $this->db->query($query)->result();
        return $transaksi;
    }


    public function getVerifikasi($where) {
        $this->db->where('id_transaksi_berangkat', $where);
        $exec = $this->db->update('tbl_transaksi_berangkat', ["verifikasi" =>  "yes"]);
        return $exec;
    }

    public function getKTP($where) {
        $this->db->where($where);
        $exec = $this->db->get('tbl_peserta')->result();
        return $exec;
    }


    public function getCheckSlotKeberangkatan($jumlah_peserta, $id_berangkat) {
        $query = "SELECT 	
                    a.tanggal_berangkat,
                    IF(z.jumlah_peserta IS NULL, 0, z.jumlah_peserta) as 'jumlah_peserta',
                    b.slot as 'kapasitas_transportasi',
                    b.name_transportasi,
                    IF( (b.slot-z.jumlah_peserta) IS NULL, b.slot, (b.slot-z.jumlah_peserta)) as 'sisa_slot',
                    c.asal,
                    c.tujuan,
                    a.status 
                FROM tbl_jadwal_berangkat AS a 
                    INNER JOIN (
                            SELECT  
                                x.id_transportasi, 
                                x.name_transportasi, 
                                x.slot
                            FROM tbl_master_transportasi as x inner join tbl_master_jenis_transportasi as y 
                                        on x.jenis_transportasi = y.id_jenis_transportasi
                                    ) as b on a.id_transportasi = b.id_transportasi  
                    INNER JOIN tbl_master_rute as c on a.id_rute = c.id_rute
                    LEFT JOIN (SELECT 
                        u.id_jadwal_berangkat, 
                        sum(u.jumlah_peserta)  as jumlah_peserta 
                   FROM tbl_transaksi_berangkat as u inner join tbl_peserta as x on u.id_peserta = x.id_peserta GROUP BY u.id_jadwal_berangkat) as z 
                   ON a.id_berangkat = z.id_jadwal_berangkat
                   WHERE a.id_berangkat = $id_berangkat";
        $exec = $this->db->query($query)->result();
        
        if($jumlah_peserta > $exec[0]->sisa_slot) {
            $data = [
                "status" => true,
                "sisa_slot" => $exec[0]->sisa_slot
            ];
        }  else {
            $data = [
                "status" => false,
                "sisa_slot" => $exec[0]->sisa_slot
            ];
        }

        return $data;
        
    }

    public function getTransaksiBerangkatByPeserta($id_peserta) {
        $query  =  "SELECT 				
                        z.name as 'peserta',
                        j.name_transportasi,
                        a.jumlah_peserta,
                        j.asal,
                        j.tujuan,
                        a.verifikasi,
                        j.tanggal_berangkat,
                        a.id_transaksi_berangkat,
                        a.id_peserta,
                        j.tanggal_berangkat
                    FROM tbl_transaksi_berangkat AS a 
                            inner join tbl_peserta as z on z.id_peserta = a.id_peserta
                            inner join 
                                (
                                    select 
                                        x.id_berangkat,
                                        y.name_transportasi,
                                        u.asal, 
                                        u.tujuan,
                                        x.tanggal_berangkat
                                    from tbl_jadwal_berangkat as x
                                        inner join tbl_master_transportasi as y on y.id_transportasi = x.id_transportasi
                                        inner join tbl_master_rute as u on u.id_rute = x.id_rute
                                ) as j on a.id_jadwal_berangkat = j.id_berangkat where a.id_peserta=$id_peserta";
        $transaksi = $this->db->query($query)->result();
        return $transaksi;
    }

    public function insertJadwalBerangkat($data){
        $insert = $this->db->insert('tbl_jadwal_berangkat', $data);
        return $insert;
    }

    public function checkJadwal($tanggal, $id_transportasi) {
        $this->db->where(["tanggal_berangkat"=> $tanggal]);
        $this->db->where(["id_transportasi"=> $id_transportasi]);
        $result = $this->db->get('tbl_jadwal_berangkat')->result();
        return count($result);
    }   

    function checkExistEmail($email) {
        $whereEmail = [
            "email" => $email
        ];

        $this->db->where($whereEmail);
        $data =  $this->db->get('tbl_peserta')->num_rows();

        if ($data > 0 ){
            return true;
        } else {
            return false;
        }
    }

    


}


?>