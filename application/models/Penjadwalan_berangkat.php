<?php


class Penjadwalan_berangkat extends CI_Model {
    
    public function getBerangkat() {
        $query = "SELECT 	
                    a.tanggal_berangkat as 'tanggal_berangkat',
                    IF(z.jumlah_peserta IS NULL, 0, z.jumlah_peserta) as 'jumlah_peserta',
                    b.slot as 'kapasitas_transportasi',
                    b.name_transportasi as 'name_transportasi',
                    -- (b.slot-z.jumlah_peserta) as 'sisa_slot',
                    IF( (b.slot-z.jumlah_peserta) IS NULL, b.slot, (b.slot-z.jumlah_peserta)) as 'sisa_slot',
                    c.asal as 'asal',
                    c.tujuan as 'tujuan',
                    a.status as 'status' 
                FROM tbl_jadwal_berangkat AS a 
                    inner join (
                                        select 
                                            x.id_transportasi, 
                                            x.name_transportasi, 
                                            x.slot
                                        from tbl_master_transportasi as x inner join tbl_master_jenis_transportasi as y 
                                        on x.jenis_transportasi = y.id_jenis_transportasi
                                    ) as b on a.id_transportasi = b.id_transportasi  
                    inner join tbl_master_rute as c on a.id_rute = c.id_rute
                    left join (SELECT 
                        id_jadwal_berangkat, 
                        sum(jumlah_peserta)  as jumlah_peserta 
                   FROM db_pgn.tbl_transaksi_berangkat group by id_jadwal_berangkat) as z 
                   on a.id_berangkat = z.id_jadwal_berangkat";

            $jadwal_berangkat = $this->db->query($query)->result();
            return $jadwal_berangkat;
    }

    public function list_transaksi() {
        $list = $this->db->query('select * from tbl_transaksi_berangkat')->result();
        return $list;
    }
}


?>