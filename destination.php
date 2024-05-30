<?php include_once 'header.php' ?>
<title>Desti</title>
<link rel="stylesheet" href="./assets/styles/desti.css" />

<?php
require_once('./entities/destination.class.php');
require_once('./entities/country.class.php');
require_once('./entities/area.class.php');

$destinationList = array_slice(Destination::list_destination(), 0, 12);
$countryList = Country::list_country();
$areaList = Area::list_area();

if (isset($_GET['country'])) {
  $country = $_GET['country'];
  $destinationList = Destination::get_destination_by_country($country);
}

if (isset($_GET['area'])) {
  $area = $_GET['area'];
  $destinationList = Destination::get_destination_by_area($area);
}
?>

<body>
  <div class="desti-hero">
    <div>
      <h1 class="desti__heading">Địa điểm nổi tiếng</h1>
      <p class="desti__desc">Khám phá các địa điểm du lịch nổi tiếng</p>
    </div>
  </div>
  <main>
    <div class="container">
      <div class="tour_wrapper">
        <!-- Filter bar -->
        <asdie class="filter-bar">
          <p class="subTitle">Danh mục quốc gia</p>
          <ul>
            <?php foreach ($countryList as $item) { ?>
              <li>
                <a href="./destination.php?country=<?php echo $item['maQuocGia'] ?>">
                  <?php echo $item['tenQuocGia'] ?>
                </a>
              </li>
            <?php } ?>
          </ul>

          <p class="subTitle" style="margin-top: 30px;">Danh mục khu vực</p>
          <ul>
            <?php foreach ($areaList as $item) { ?>
              <li>
                <a href="./destination.php?area=<?php echo $item['maKhuVuc'] ?>">
                  <?php echo $item['tenKhuVuc'] ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        </asdie>

        <div class="desti__list">
          <?php foreach ($destinationList as $item) { ?>
            <div class="desti__item">
              <img src="<?php echo $item['thumbnail'] ?>" alt="" class="desti__thumb" />
              <h2 class="desti__name"><?php echo $item['tenDiaDiem'] ?></h2>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>
</body>

<?php include_once 'footer.php' ?>