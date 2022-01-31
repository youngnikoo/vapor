<?php
class Mcrud extends CI_Model
{
    public function get_all_data($tabel){
        return $this->db->get($tabel);
    }

    public function get_by_ktgr($where){
        $this->db->where('kategori', $where);
        return $this->db->get('produk');
    }

    public function insert($tabel, $data){
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id){
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id){
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);  
    }

    public function cek_data($tabel, $field1, $data1, $field2, $data2)
    {
        return $this->db->query('SELECT * FROM '.$tabel.' WHERE '.$field1.' = '.$data1.' AND '.$field2.' != '.$data2);

    }

    public function del_data($tabel ,$id_produk)
    {
        $this->db->where($id_produk);
        $this->db->delete($tabel);
    }

    public function transaksi() 
    {
        $this->db->select('nama, img_produk, jenis_produk, jumlah, subtotal');
        $this->db->from('detail_transaksi');
        $this->db->join('produk', 'produk.id_produk=detail_transaksi.id_produk');
        $this->db->join('pelanggan', 'detail_transaksi.id_pelanggan=pelanggan.id_pelanggan');
        return $this->db->get();
    }
}
?>