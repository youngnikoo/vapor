     <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
              <?php echo $this->session->flashdata('mssg') ?>
                <div class="card-body">
                  <h4 class="card-title">Data Aksesoris</h4>
                  <p class="card-description">
                    <a href="<?= site_url('CAksesoris/addbarang') ?>"class="btn btn-warning">Tambah Barang</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th>Gambar</th>
                          <th>Nama Aksesoris</th>
                          <th>Harga</th>
                          <th>Stok</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $n = 1;
                        foreach ($aksesoris as $item) { ?>
                          <tr>
                            <td><?= $n; ?></td>
                            <td><img src="<?= base_url() ?>assets_frontend/images/<?= $item->img_produk ?>" alt="<?= $item->img_produk ?>"></td>
                            <td><?= $item->jenis_produk; ?></td>
                            <td><?= $item->harga_produk; ?></td>
                            <td><?= $item->stok; ?></td>
                            <td>
                              <a class="btn btn-warning" href="<?= site_url('CAksesoris/getid/' . $item->id_produk); ?>"> Edit </a> 
                              <a class="btn btn-danger del-btn" href="<?= site_url('CAksesoris/del/' . $item->id_produk); ?>"> Hapus </a>
                            </td>
                          </tr>
                        <?php $n++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>