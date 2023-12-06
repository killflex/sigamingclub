<?php $ingfo = mysqli_query($koneksi, "SELECT * FROM games"); ?>

<div class="content-header">
  <div class="container-fluid px-lg-5">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><i class="fa fa-gamepad"></i> List Game</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right"></ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid px-lg-5">
    <div class="row">
      <?php 
        $info = mysqli_fetch_array($ingfo);
        $no = 1;
        foreach (mysqli_query($koneksi, "SELECT * FROM games") as $card): 
      ?>
      <div class="col-lg-3 col-12">
        <div class="card h-80">
          <?= '<img src="data:image/webp;base64,'.base64_encode($card['thumbnail']).'" height="225px" class="card-img-top fit" alt="">' ?>
          <div class="card-body">
            <h5 class="fs-1"><?= $card['nama_game'] ?></h5>
            <p class="card-text text-justify"><?= $card['deskripsi_game'] ?>.</p>
            <a href="?page=dashboard_game&id_game=<?= $card['id_game'] ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <?php 
        $no++;
        endforeach; 
      ?>
    </div>
    <?php ?>
  </div>
</section>

<aside class="control-sidebar control-sidebar-dark"></aside>