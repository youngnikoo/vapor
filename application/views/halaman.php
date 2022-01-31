<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>assets_frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?= base_url()?>assets_frontend/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="<?= base_url()?>assets_frontend/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="<?= site_url('CHalaman')?>"><h2>Kongkow <em>Vapor</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('CHalaman')?>">Home</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('CProduk')?>">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" a href="https://www.instagram.com/kongkow.vapor/">Social Media</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Login')?>">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Banner Ends Here -->
    <?= $this->session->flashdata('mssg')?>
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="<?= site_url('CProduk')?>">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php foreach ($produk as $item) { ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="<?= base_url() ?>assets_frontend/images/<?= $item->img_produk ?>" alt="<?= $item->img_produk ?>"></a>
              <div class="down-content">
                <a href="#"><h4><?= $item->jenis_produk; ?></h4></a>
                <h6>Rp. <?= number_format($item->harga_produk,2,',','.'); ?></h6>
                <p><?= $item->desc_produk; ?></p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout<?= $item->id_produk ?>">Checkout</button>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <?php foreach ($produk as $item) { ?>
<div class="modal fade" id="checkout<?= $item->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('CHalaman/pesanan')?>" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama</span>
            <input name="nama" type="text" class="form-control" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
            <input name="id" type="hidden" name="id" value="<?= $item->id_produk?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Alamat</span>
            <input name="alamat" type="text" class="form-control" placeholder="Alamat" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Kota</span>
            <input name="kota" type="text" class="form-control" placeholder="Kota" aria-label="Username">
            <span class="input-group-text">Kode Pos</span>
            <input name="kode_pos" type="text" class="form-control" placeholder="Kode Pos" aria-label="Server">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">No.HP</span>
            <input name="no_hp" type="text" class="form-control" placeholder="No.Hp/Whatsapp" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kurir</span>
                    <select name="kurir" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <?php foreach ($kurir as $key) { ?>
                      <option value="<?= $key->id_kurir ?>"><?= $key->nama_kurir?></option>
                      <?php } ?>
                    </select>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="<?= base_url() ?>assets_frontend/images/<?= $item->img_produk ?>" alt="<?= $item->img_produk ?>">
            <div class="card-body">
              <h5 class="card-title" ><?= $item->jenis_produk; ?></h5>
              <p class="card-text">Rp. <?= number_format($item->harga_produk,2,',','.'); ?></p>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Jumlah</span>
              <input name="jumlah" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
              <input name="harga_produk" type="hidden" name="id" value="<?= $item->harga_produk?>">
            </div>
          </div>  
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Bayar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url()?>assets_frontend/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Additional Scripts -->
    <script src="<?= base_url()?>assets_frontend/js/custom.js"></script>
    <script src="<?= base_url()?>assets_frontend/js/owl.js"></script>
    <script src="<?= base_url()?>assets_frontend/js/slick.js"></script>
    <script src="<?= base_url()?>assets_frontend/js/isotope.js"></script>
    <script src="<?= base_url()?>assets_frontend/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
