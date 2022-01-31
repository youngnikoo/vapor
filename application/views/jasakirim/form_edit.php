<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Edit Data Kurir</h4>
                  <form class="forms-sample" method="POST" action="<?= site_url('CJasaKirim/edit')?>" enctype="multipart/form-data">
                  <input type="hidden" name="id_kurir" value="<?= $kurir->id_kurir; ?>">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Edit Kurir</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_kurir" class="form-control" id="exampleInputUsername2" placeholder="Nama Kurir" value="<?= $kurir->nama_kurir; ?>">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success me-3">Submit</button>
                  </form>
                </div>
              </div>
            </div>