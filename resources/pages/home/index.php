<?php

require './resources/models/Categories.php';
require './resources/models/Sales.php';

$categories = new Categories('./resources/json/item.json');
$sales = new Sales('./resources/json/sales.json', './resources/txt/sales.txt');

?>

<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- End-Content-Header -->

<!-- Main-Content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small-Boxes -->
    <div class="row">
      <div class="col-lg-6 col-6">
        <div class="small-box bg-light">
          <div class="inner">
            <h3><?= count($categories->index()); ?></h3>
            <p>Categories</p>
          </div>
          <div class="icon">
            <i class="fas fa-box"></i>
          </div>
          <a href="./index.php?pref=item&page=index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-6">
        <div class="small-box bg-light">
          <div class="inner">
            <h3><?= count($sales->index()); ?></h3>
            <p>Sales</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <a href="./index.php?pref=sale&page=index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- End-Small-Boxes -->
  </div>
</section>
<!-- End-Main-Content -->