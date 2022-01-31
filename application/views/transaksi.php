<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Transaksi Produk</h4>

      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>gambar</th>
              <th>Nama user</th>
              <th>Produk</th>
              <th>Qty</th>
              <th>Harga</th>
            </tr>
            <?php $n = 1;
            foreach ($transaksi as $key) : ?>
              <tr>
                <td><?= $n++ ?></td>
                <td><img src="<?= base_url() ?>assets_frontend/images/<?= $key->img_produk ?>" alt="<?= $key->img_produk ?>"></td>
                <td><?= $key->nama ?></td>
                <td><?= $key->jenis_produk ?></td>
                <td><?= $key->jumlah ?></td>
                <td><?= $key->subtotal ?></td>
              </tr>
            <?php endforeach ?>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>