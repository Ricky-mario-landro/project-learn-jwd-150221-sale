<?php

require './resources/models/Categories.php';

$categories = new Categories('./resources/json/item.json');

?>

<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Items</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Items</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- End-Content-Header -->

<!-- Main-Content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-solid">
      <!-- Card-Body -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center" style="width:5%">No</th>
              <th>Category</th>
              <th>Item</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories->index() as $index => $category) : ?>
              <tr>
                <td class="text-center"><?= $index + 1; ?></td>
                <td><?= $category->category; ?></td>
                <td>
                  <?php foreach ($category->items as $item) : ?>
                    <div class="card">
                      <div class="card-body">
                        <?= $item->name; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
<!-- Main-End-Content -->