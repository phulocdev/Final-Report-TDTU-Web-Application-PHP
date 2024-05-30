<?php include_once 'header.php' ?>
<title>Tour</title>
<link rel="stylesheet" href="./assets/styles/tour.css" />

<?php
require_once('./entities/tour.class.php');
$tourList = Tour::list_tour();
$tourListPopular = array_slice($tourList, 0, 8);
?>

<body>
  <div class="tour__hero">
    <h1 class="subTitle tour__heading">Tours</h1>
  </div>

  <div class="container">
    <div class="tour-list-wrapper">
      <div class="tour-list">
        <?php foreach ($tourListPopular as $item) { ?>
          <div class="tour-item">
            <img src="<?php echo $item['thumbnail'] ?>" alt="" class="tour-item__thumb" />
            <div class="tour-item__row">
              <h2 class="tour__item__name"><?php echo $item['tourName'] ?></h2>
              <div>
                <span class="tour-item__days"><?php echo $item['soNgay'] ?> ngày</span>
                <p class="tour-item__price">
                  <?php
                  $price = $item['price'];
                  echo Number_format($price, 0, ',', '.') . '  vnđ';
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>


<?php include_once 'footer.php' ?>