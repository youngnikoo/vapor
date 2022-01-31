     <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
              <?php echo $this->session->flashdata('mssg') ?>         
                <div class="card-body">
                  <h4 class="card-title">Data Kurir</h4>
                  <p class="card-description">
                    <a href="<?= site_url('CJasaKirim/addbarang') ?>"class="btn btn-warning">Tambah Kurir</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th>Nama Kurir</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $n = 1;
                        foreach ($kurir as $item) { ?>
                          <tr>
                            <td><?= $n; ?></td>
                            <td><?= $item->nama_kurir; ?></td>
                            <td>
                              <a class="btn btn-warning" href="<?= site_url('CJasaKirim/getid/' . $item->id_kurir); ?>"> Edit </a> 
                              <a class="btn btn-danger del-btn" href="<?= site_url('CJasaKirim/del/' . $item->id_kurir); ?>"> Hapus </a>
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