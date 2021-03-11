<?php

require './resources/models/Categories.php';
require './resources/models/Sales.php';
require './resources/models/Utilities.php';

$categories = new Categories('./resources/json/item.json');
$sales = new Sales('./resources/json/sales.json', './resources/txt/sales.txt');
$utility = new Utilities();

if (isset($_POST['save'])) {
  $sales->store($_POST, $sales->index());
}

?>

<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Sales</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Sales</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- End-Content-Header -->

<!-- Main-Content -->
<section class="content">
  <div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Sales
        </button>
      </div>
    </div>
    <div class="card card-solid">
      <!-- Card-Body -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center" style="width:5%">No</th>
              <th>Invoice</th>
              <th>Category</th>
              <th>Item</th>
              <th>Price</th>
              <th>Condition</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sales->index() as $index => $sale) : ?>
              <tr>
                <td class="text-center"><?= $index + 1; ?></td>
                <td><?= $sale->invoice; ?></td>
                <td><?= $sale->item; ?></td>
                <td><?= $sale->category; ?></td>
                <td class="text-right"><?= $utility->currency($sale->price); ?></td>
                <td><?= $sale->condition; ?></td>
                <td><?= $sale->created_at; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
<!-- End-Main-Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
              <option value="">Choose Category</option>
              <?php foreach ($categories->index() as $category) : ?>
                <option value="<?= $category->_id; ?>,<?= $category->category; ?>" <?php foreach ($category->items as $index => $item) : ?> data-item<?= $index; ?>="<?= $item->_id; ?>,<?= $item->name; ?>" <?php endforeach; ?>>
                  <?= $category->category; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="item">Item</label>
            <select class="form-control" id="item" name="item" required disabled>
              <option value="">Not available data</option>
            </select>
          </div>
          <div class="form-group">
            <label for="condition">Condition</label>
            <select class="form-control" id="condition" name="condition" required>
              <option value="">Choose Condition</option>
              <option value="new,New">New</option>
              <option value="scnd,Second">Second</option>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" aria-describedby="price" placeholder="Enter price">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="save">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End-Modal -->

<script>
  $(document).ready(function() {
    //-------------
    //- SHOW ITEMS -
    //--------------
    $("#category").change(function() {
      let item1 = $(this).find(":selected").data("item0").split(",");
      let item2 = $(this).find(":selected").data("item1").split(",");

      $("#item").removeAttr("disabled");
      $("#item")
        .find("option")
        .remove()
        .end();
      $("#item").append(new Option("Choose Item", ""));
      $("#item").append(new Option(item1[1], item1.join()));
      $("#item").append(new Option(item2[1], item2.join()));
    });

    //-------------
    //- CURRENCY PRICE -
    //--------------
    $("#price").keyup(function() {
      let number_string = $("#price").val().replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        theRest = split[0].length % 3,
        rupiah = split[0].substr(0, theRest),
        thousand = split[0].substr(theRest).match(/\d{3}/gi);

      if (thousand) {
        separator = theRest ? '.' : '';
        rupiah += separator + thousand.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      $("#price").val('Rp. ' + rupiah);
    });

  });
</script>