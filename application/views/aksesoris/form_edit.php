<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Edit Barang</h4>
                  <form class="forms-sample" method="POST" action="<?= site_url('CAksesoris/edit')?>" enctype="multipart/form-data">
                  <input type="hidden" name="id_produk" value="<?= $aksesoris->id_produk; ?>">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Edit Barang</label>
                      <div class="col-sm-9">
                        <input type="text" name="jenis_produk" class="form-control" id="exampleInputUsername2" placeholder="Nama Barang" value="<?= $aksesoris->jenis_produk; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Harga</label>
                      <div class="col-sm-9">
                        <input type="text" name="harga_produk" class="form-control" id="exampleInputEmail2" placeholder="Harga" value="<?= $aksesoris->harga_produk; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
                      <div class="col-sm-9">
                        <input type="text" name="desc_produk" class="form-control" id="exampleInputEmail2" placeholder="Deskripsi" value="<?= $aksesoris->desc_produk; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Stok</label>
                      <div class="col-sm-9">
                        <input type="text" name="stok" class="form-control" id="exampleInputMobile" placeholder="Stok" value="<?= $aksesoris->stok; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Gambar</label>
                      <div class="col-sm-9">
                        <input type="file" name="img_produk" class="form-control" id="exampleInputMobile" placeholder="Stok" value="<?= $aksesoris->img_produk; ?>">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success me-3">Submit</button>
                  </form>
                </div>
              </div>
            </div>