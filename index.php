<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="./assets/styles/home.css" />

<?php
require_once('./entities/tour.class.php');
$tourList = Tour::list_tour();
$tourListPopular = array_slice($tourList, 0, 3);

require_once('./entities/country.class.php');
$countryList = Country::list_country();
?>

<!-- MAIN CONTENT -->
<main class="main-content">
  <div class="container">
    <!-- HERO -->
    <section class="hero">
      <div class="hero__wrapper">
        <section class="hero__content">
          <h1 class="hero__title" style="text-transform: capitalize;">Du lịch thỏa thích cùng Safe tour</h1>
          <p class="hero__desc desc">
            Lập kế hoạch và đặt chuyến đi hoàn hảo của bạn với lời khuyên của chuyên gia, mẹo du lịch,
            thông tin điểm đến và nguồn cảm hứng từ chúng tôi.
          </p>
          <div class="hero__actions">
            <a href="#!" class="btn hero-discover__btn">Khám phá ngay</a>
          </div>
        </section>
        <div class="hero__decoration">
          <div class="hero__wrapper-img">
            <img style="width: 380px; height: 510px; object-fit: cover" src="./assets/images/hero-img.png" alt="Let's Make Your Best Trip Ever" class="hero__image" />
          </div>

          <div class="hero_card">
            <div class="hero__card-icon">
              <p class="hero__card-number">39</p>
              <p class="hero__card-desc">Số lần du lịch</p>
            </div>

            <div class="hero__card-total">
              <p class="hero__card-count">224</p>
              <p class="hero-card__desc-total">Chuyến đi/tháng</p>
            </div>
          </div>
        </div>

        <section class="hero__stat" style="flex: 1 0">
          <ul class="hero__stat-list">
            <li class="hero__stat-item">
              <div class="hero__stat__wrapper-image">
                <img src="./assets/icon/hero-stat-1.png" alt="" class="hero__stat-img" />
              </div>
              <div style="flex-grow: 1">
                <p class="hero_stat-number">12</p>
                <p class="hero_stat-desc">Năm kinh nghiệm</p>
              </div>
            </li>

            <li class="hero__stat-item">
              <div class="hero__stat__wrapper-image">
                <img src="./assets/icon/hero-stat-2.png" alt="" class="hero__stat-img" />
              </div>
              <div style="flex-grow: 1">
                <p class="hero_stat-number">29</p>
                <p class="hero_stat-desc">Giải thưởng</p>
              </div>
            </li>

            <li class="hero__stat-item">
              <div class="hero__stat__wrapper-image">
                <img src="./assets/icon/hero-stat-3.png" alt="" class="hero__stat-img" />
              </div>
              <div style="flex-grow: 1">
                <p class="hero_stat-number">725+</p>
                <p class="hero_stat-desc">Khu du lịch</p>
              </div>
            </li>
          </ul>
        </section>
      </div>
      <div class="search-bar">
        <div class="search-bar__wrapper">
          <div class="search-bar__item">
            <h3 class="search-bar__title">Địa điểm</h3>
            <p class="search-bar__choose">Vịnh Hạ Long</p>
          </div>

          <div class="search-bar__item">
            <h3 class="search-bar__title">Tỉnh</h3>
            <p class="search-bar__choose">Quảng Bình</p>
          </div>

          <div class="search-bar__item">
            <h3 class="search-bar__title">Khách du lịch</h3>
            <p class="search-bar__choose">8 người</p>
          </div>

          <a href="#!" class="btn search-bar__action">
            <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm</a>
        </div>
      </div>
    </section>

    <!-- BEST TOUR -->
    <section class="best-tour">
      <div class="best-tour__row">
        <div>
          <h2 class="best-tour__title subTitle">Chuyến đi tốt nhất</h2>
          <p class="best-tour__desc desc">
            Những tour du lịch hấp dẫn nhất mà chúng tôi đem lại cho quý khách hàng. Nhằm đem lại trải nghiệm tốt nhất với chi phí hợp lí
          </p>
        </div>
        <a href="#!" class="btn best-tour__action">Xem tất cả</a>
      </div>

      <!-- BEST TOUR LIST -->
      <ul class="best-tour__list">
        <?php
        foreach ($tourListPopular as $item) {
        ?>
          <article class="best-tour__item">
            <div class="best-tour__wrapper-img">
              <img src="<?php echo $item['thumbnail'] ?>" alt="" class="best-tour__thumb" />
            </div>

            <div class="best-tour__body">
              <h3 class="best-tour__price"><?php
                                            $pricePerDay = round(($item['price'] / $item['soNgay']), 0, PHP_ROUND_HALF_UP);
                                            $formatted_price = number_format($pricePerDay, 0, ',', '.');
                                            echo $formatted_price
                                            ?> / ngày
              </h3>
              <p class="best-tour__name"><?php echo $item['tourName'] ?></p>

              <span class="best-tour__address">
                <i style="margin-right: 8px" class="fa-solid fa-location-dot"></i><?php echo $item['videoDesc'] ?></span>
              <div class="best-tour__desc" style="display: flex; column-gap: 28px">
                <span class="best-tour__date">
                  <i style="margin-right: 8px" class="fa-solid fa-calendar-days"></i><?php echo $item['ngayKhoiHanh'] ?></span>
                <span class="best-tour__time"><i style="margin-right: 8px" class="fa-solid fa-clock"></i> <?php echo $item['soNgay'] ?>
                  ngày</span>
              </div>
            </div>
          </article>
        <?php
        }
        ?>
      </ul>
    </section>

    <!-- CHOOSE -->
    <section class="choose">
      <div class="choose__wrapper">
        <div class="choose__decoration">
          <img src="./assets/images/why-img" alt="" class="choose__img" />
        </div>

        <div class="choose__content">
          <h2 class="choose__title">Ưu điểm của Safe Tour</h2>
          <p class="choose__desc">
            Dịch vụ du lịch mang lại nhiều ưu điểm như: giúp bạn khám phá những địa điểm mới lạ, trải nghiệm văn hóa đa dạng, và thư giãn sau những ngày làm việc căng thẳng.
          </p>
          <ul class="choose__list">
            <article class="choose__item">
              <div class="choose__wrapper-icon">
                <img src="./assets/icon/choose-icon-1.svg" alt="" class="choose__item-icon" />
              </div>
              <div>
                <h3 class="choose__sub-title">Mọi thứ trở nên dễ dàng</h3>
                <p class="choose__sub-desc">
                  Các tour du lịch chuyên nghiệp còn cung cấp hướng dẫn viên am hiểu địa phương, đảm bảo an toàn
                </p>
              </div>
            </article>

            <article class="choose__item">
              <div class="choose__wrapper-icon">
                <img src="./assets/icon/choose-icon-2.svg" alt="" class="choose__item-icon" />
              </div>
              <div>
                <h3 class="choose__sub-title">Riêng tư - Du lịch thỏa thích</h3>
                <p class="choose__sub-desc">
                  Tiện nghi và tối ưu hóa chi phí. Ngoài ra, bạn còn có cơ hội gặp gỡ, kết bạn và tạo nên những kỷ niệm đáng nhớ.
                </p>
              </div>
            </article>

            <article class="choose__item">
              <div class="choose__wrapper-icon">
                <img src="./assets/icon/choose-icon-3.svg" alt="" class="choose__item-icon" />
              </div>
              <div>
                <h3 class="choose__sub-title">Hỗ trợ khách hàng tốt nhất</h3>
                <p class="choose__sub-desc">
                  Bạn được tận hưởng sự tiện lợi với mọi chi tiết chuyến đi được sắp xếp chu đáo, từ chỗ ở, phương tiện di chuyển đến các hoạt động tham quan
                </p>
              </div>
            </article>
          </ul>
        </div>
      </div>
    </section>

    <!-- TRENDING -->
    <section class="trending">
      <div class="trending-row">
        <div>
          <h2 class="trending__title subTitle">Tour nổi bật 2024</h2>
          <p class="trending__desc desc">
            Những chuyến đi được nhiều khách hàng ưa thích nhất ❣️
          </p>
        </div>
        <div class="trending__arrows">
          <div class="trending__arrow">
            <i class="fa-solid fa-arrow-left"></i>
          </div>
          <div class="trending__arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
      </div>

      <div class="trending-list">
        <?php
        foreach ($tourList as $item) {
        ?>
          <article class="trending-item">
            <div class="trending__wrapper-thumb">
              <img src=<?php echo $item['thumbnail'] ?> alt="" class="trending__thumb" />
            </div>
            <div class="trending__body">
              <h3 class="trending__sub-title"><?php echo $item['tourName'] ?></h3>
              <p class="trending__desc"><?php echo $item['soDiemDen'] ?> Địa điểm | <?php echo $item['soCho'] ?> Hoạt động</p>

              <div class="trending__book">
                <p class="trending__price">
                  <?php
                  $price = $item['price'];
                  $formatted_price = number_format($price, 0, ',', '.');
                  echo $formatted_price;
                  ?>
                  (VNĐ)
                </p>
                <form style="margin-bottom: 0;" method="post" action="./book_tour.php">
                  <input type="hidden" name="tour_id" value="<?php echo $item['tourID'] ?>">
                  <button class="btn trending__book-action" style="cursor: pointer">Đặt Tour</button>
                </form>
              </div>

              <div class="trending__last-row">
                <div class="trending__wrapper-icon">
                  <img src="./assets/icon/trending-logo.png" alt="" class="trending__brand" />
                </div>
                <span class="trending__brand-name desc">Safe Tour Agency</span>
              </div>
            </div>
          </article>
        <?php
        }
        ?>
      </div>
    </section>

    <!-- DESTINATION -->
    <section class="country">
      <div class="country__row">
        <div>
          <h2 class="subTitle country__title">Điểm đến hàng đầu</h2>
          <p class="desc country__desc">
            Mang lại cho bạn những trải nghiệm tuyệt vời nhất ❣️
          </p>
        </div>
        <a href="#!" class="btn country__action">Xem tất cả</a>
      </div>

      <ul class="country__list">
        <?php foreach (array_slice($countryList, 0, 6) as $item) { ?>
          <a href="#!" class="country__link" style="background-image: url(<?php echo $item['thumbnail'] ?>);">
            <li>
              <span class="country__label"><?php echo $item['danhGia'] ?><i style="font-size: 1.1rem; margin-left: 2px;" class="fa-solid fa-star"></i></span>
              <div class="coutry__body">
                <h3 class="country__name"><?php echo $item['tenQuocGia'] ?></h3>
              </div>
            </li>
          </a>
        <?php } ?>
      </ul>
    </section>

    <!-- TOUR -->
    <section class="tour">
      <h2 class="subTitle tour__title">Loại hình du lịch</h2>
      <div class="tour__list">
        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-1.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Thành phố</h3>
          <p class="tour__desc">
            5 tours - chỉ từ <span class="tour__price"><?php echo number_format(5000000, 0, ',', '.') ?>(vnđ)</span>
          </p>
        </div>

        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-2.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Biển</h3>
          <p class="tour__desc">
            10 tours - chỉ từ <span class="tour__price"><?php echo number_format(2000000, 0, ',', '.') ?>(vnđ)</span>
          </p>
        </div>

        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-3.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Bảo tàng</h3>
          <p class="tour__desc">
            7 tours - chỉ từ <span class="tour__price"><?php echo number_format(2500000, 0, ',', '.') ?>(vnđ)</span>
          </p>
        </div>

        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-4.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Du thuyền</h3>
          <p class="tour__desc">
            3 tours - chỉ từ <span class="tour__price"><?php echo number_format(8500000, 0, ',', '.') ?>(vnđ)</span>
          </p>
        </div>
      </div>
    </section>

    <!-- COMMENT   -->
    <section class="comment">
      <div class="comment__wrapper">
        <div class="comment__decoration">
          <img src="./assets/images/comment-img.png" alt="" class="comment__img" />
        </div>
        <section class="comment__content">
          <h3 class="comment__title subTitle">Đánh giá khách hàng</h3>
          <div class="comment__quotes">
            <p class="comment__say">
              "Dịch vụ du lịch của công ty thật tuyệt vời! Từ khâu lên kế hoạch cho đến lúc trở về, mọi thứ đều được sắp xếp chu đáo và chuyên nghiệp. Hướng dẫn viên rất nhiệt tình, am hiểu địa phương và luôn sẵn sàng hỗ trợ chúng tôi. Chúng tôi đã có cơ hội khám phá những địa điểm tuyệt đẹp và trải nghiệm văn hóa độc đáo.
            </p>
            <div class="comment__actor">
              <div class="actor__wrapper-avatar">
                <img src="https://plus.unsplash.com/premium_photo-1670360042659-a8637a2fd60e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4fHx8ZW58MHx8fHx8" alt="" class="actor__avatar" />
              </div>

              <div style="flex: 1 0">
                <h4 class="actor__name">Nguyễn Ngọc Linh</h4>
                <p class="actor__job" style="margin-top: 7px;">Khách hàng thân thiết</p>
                <div class="actor__rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>

    <!-- GUIDES -->
    <section class="guide">
      <h2 class="subTitle guide__title">
        Bài viết & Hướng dẫn du lịch</h2>
      <p class="desc guide__desc">
        Du lịch đã giúp chúng ta hiểu được ý nghĩa của cuộc sống và nó đã giúp chúng ta trở thành những người tốt hơn. Mỗi lần đi du lịch, chúng ta nhìn thế giới bằng con mắt mới.
      </p>

      <section class="guide__content">
        <div class="guide__wrapper">
          <section class="guide__main-content">
            <img src="https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHRyYXZlbGluZ3xlbnwwfHwwfHx8MA%3D%3D" alt="" class="guide__main-img" />
            <div class="guide__main-row">
              <h3 class="guide__subTitle">
                Cuộc hành trình thực sự không bao gồm việc tìm kiếm cái mới
              </h3>
              <span class="guide__date">Jun 1, 2024</span>
            </div>
            <p class="guide__subDesc">
              Mọi chi tiết đều được chăm chút kỹ lưỡng, từ chỗ ở, phương tiện di chuyển đến các hoạt động tham quan. Hướng dẫn viên không chỉ am hiểu mà còn rất tận tâm, giúp tôi cảm nhận được văn hóa và con người địa phương một cách chân thực nhất
            </p>
          </section>
          <ul class="guide__sub-list">
            <li class="guide__item">
              <img src="https://plus.unsplash.com/premium_photo-1687653079484-12a596ddf7a9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dHJhdmVsaW5nfGVufDB8fDB8fHww" alt="" class="guide__thumb" />
              <div>
                <h3 class="guide__subTitle" style="font-size: 2rem; margin-bottom: 12px; max-width: 255px">
                  Những lưu ý khi đi du lịch
                </h3>
                <p class="guide__subDesc" style="font-size: 1.4rem; max-width: 255px">
                  Bài viết đem lại những lưu ý quan trọng khi bạn đi du lịch
                </p>
                <span class="guide__date" style="margin-top: 52px; display: inline-block">Jun 1, 2024</span>
              </div>
            </li>
            <li class="guide__item">
              <img src="https://images.unsplash.com/photo-1583452924150-c86772c4fab6?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dHJhdmVsaW5nfGVufDB8fDB8fHww" alt="" class="guide__thumb" />
              <div>
                <h3 class="guide__subTitle" style="font-size: 2rem; margin-bottom: 12px; max-width: 255px">
                  Biển và núi đem lại cho ta cảm giác thật thoải mái
                </h3>
                <p class="guide__subDesc" style="font-size: 1.4rem; max-width: 255px">
                  Những lợi ích khi bạn đi du lịch biển và núi
                </p>
                <span class="guide__date" style="margin-top: 52px; display: inline-block">Jun 1, 2024</span>
              </div>
            </li>

            <li class="guide__item">
              <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8dHJhdmVsaW5nfGVufDB8fDB8fHww" alt="" class="guide__thumb" />
              <div>
                <h3 class="guide__subTitle" style="font-size: 2rem; margin-bottom: 12px; max-width: 255px">
                  Những lợi ích khi bạn đi du lịch
                </h3>
                <p class="guide__subDesc" style="font-size: 1.4rem; max-width: 255px">
                  Du lịch khiến ta mang lại cảm giác thoải mái
                </p>
                <span class="guide__date" style="margin-top: 52px; display: inline-block">Jun 1, 2024</span>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </section>

    <!-- SUBSCRIBE -->
    <section class="subscribe">
      <div class="subscribe__wrapper">
        <h3 class="subscribe__title">Đăng ký bản tin của chúng tôi</h3>
        <p class="subscribe__desc">
          Nhận tin tức, cập nhật mới nhất và nhiều thứ khác mỗi tuần.
        </p>
        <form class="subscribe__form">
          <input class="subscribe__email" type="email" name="user-email" id="email" placeholder="Nhập email của bạn" />
          <button type="submit" class="subscribe__submit">
            <i class="fa-solid fa-paper-plane"></i>
          </button>
        </form>
      </div>
    </section>
  </div>
</main>
<?php include_once 'footer.php'; ?>