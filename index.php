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
          <h1 class="hero__title">Let's Make Your Best Trip Ever</h1>
          <p class="hero__desc desc">
            Plan and book your perfect trip with expert advice, travel tips,
            destination information and inspiration from us.
          </p>
          <div class="hero__actions">
            <a href="#!" class="btn hero-discover__btn">Discover Now</a>
          </div>
        </section>
        <div class="hero__decoration">
          <div class="hero__wrapper-img">
            <img style="width: 380px; height: 510px; object-fit: cover" src="./assets/images/hero-img.png" alt="Let's Make Your Best Trip Ever" class="hero__image" />
          </div>

          <div class="hero_card">
            <div class="hero__card-icon">
              <p class="hero__card-number">39</p>
              <p class="hero__card-desc">Times traveled</p>
            </div>

            <div class="hero__card-total">
              <p class="hero__card-count">224</p>
              <p class="hero-card__desc-total">Total trip (month)</p>
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
                <p class="hero_stat-desc">Years Experience</p>
              </div>
            </li>

            <li class="hero__stat-item">
              <div class="hero__stat__wrapper-image">
                <img src="./assets/icon/hero-stat-2.png" alt="" class="hero__stat-img" />
              </div>
              <div style="flex-grow: 1">
                <p class="hero_stat-number">29</p>
                <p class="hero_stat-desc">Awards Gained</p>
              </div>
            </li>

            <li class="hero__stat-item">
              <div class="hero__stat__wrapper-image">
                <img src="./assets/icon/hero-stat-3.png" alt="" class="hero__stat-img" />
              </div>
              <div style="flex-grow: 1">
                <p class="hero_stat-number">725+</p>
                <p class="hero_stat-desc">Property Build</p>
              </div>
            </li>
          </ul>
        </section>
      </div>
      <div class="search-bar">
        <div class="search-bar__wrapper">
          <div class="search-bar__item">
            <h3 class="search-bar__title">Location</h3>
            <p class="search-bar__choose">Bali, Indonesia</p>
          </div>

          <div class="search-bar__item">
            <h3 class="search-bar__title">City</h3>
            <p class="search-bar__choose">Prambanan</p>
          </div>

          <div class="search-bar__item">
            <h3 class="search-bar__title">Guest</h3>
            <p class="search-bar__choose">8 Persons</p>
          </div>

          <a href="#!" class="btn search-bar__action">
            <i class="fa-solid fa-magnifying-glass"></i> Search</a>
        </div>
      </div>
    </section>

    <!-- BEST TOUR -->
    <section class="best-tour">
      <div class="best-tour__row">
        <div>
          <h2 class="best-tour__title subTitle">Our Best Tour</h2>
          <p class="best-tour__desc desc">
            These are also locations where it’s easy to feel healthier, happier
            and less stressed than in America. And for more destinations on the
            Global Retirement Index.
          </p>
        </div>
        <a href="#!" class="btn best-tour__action">See all tours</a>
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
          <img src="https://images.unsplash.com/photo-1522010675502-c7b3888985f6?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8dG91cnxlbnwwfHwwfHx8MA%3D%3D" alt="" class="choose__img" />
        </div>

        <div class="choose__content">
          <h2 class="choose__title">Why Choose Us?</h2>
          <p class="choose__desc">
            We make all the process easy. Dummy text ever since the is, when an
            unknown printer took.
          </p>
          <ul class="choose__list">
            <article class="choose__item">
              <div class="choose__wrapper-icon">
                <img src="./assets/icon/choose-icon-1.svg" alt="" class="choose__item-icon" />
              </div>
              <div>
                <h3 class="choose__sub-title">We make all the process easy</h3>
                <p class="choose__sub-desc">
                  A galley of type and scrambled it to make a type when an
                  unknown printer took
                </p>
              </div>
            </article>

            <article class="choose__item">
              <div class="choose__wrapper-icon">
                <img src="./assets/icon/choose-icon-2.svg" alt="" class="choose__item-icon" />
              </div>
              <div>
                <h3 class="choose__sub-title">Private & Customized Tours</h3>
                <p class="choose__sub-desc">
                  A galley of type and scrambled it to make a type when an
                  unknown printer took
                </p>
              </div>
            </article>

            <article class="choose__item">
              <div class="choose__wrapper-icon">
                <img src="./assets/icon/choose-icon-3.svg" alt="" class="choose__item-icon" />
              </div>
              <div>
                <h3 class="choose__sub-title">Immigration & Passport Help</h3>
                <p class="choose__sub-desc">
                  A galley of type and scrambled it to make a type when an
                  unknown printer took
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
          <h2 class="trending__title subTitle">Trending 2024</h2>
          <p class="trending__desc desc">
            Sost Brilliant reasons Entrada should be your one-stop-shop!
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
                <p class="trending__price"><?php
                                            $price = $item['price'];
                                            $formatted_price = number_format($price, 0, ',', '.');
                                            echo $formatted_price;
                                            ?> (VNĐ)</p>
                <form style="margin-bottom: 0;" method="post" action="./book_tour.php">
                  <input type="hidden" name="tour_id" value="<?php echo $item['tourID'] ?>">
                  <button class="btn trending__book-action" style="cursor: pointer">Book Now</button>
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
          <h2 class="subTitle country__title">Top Destination</h2>
          <p class="desc country__desc">
            Sost Brilliant reasons Entrada should be your one-stop-shop!
          </p>
        </div>
        <a href="#!" class="btn country__action">See all destination</a>
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
      <h2 class="subTitle tour__title">Tour Type</h2>
      <div class="tour__list">
        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-1.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">City Tours</h3>
          <p class="tour__desc">
            5 Tours- From <span class="tour__price">550$</span>
          </p>
        </div>

        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-2.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Beaches</h3>
          <p class="tour__desc">
            10 Tours- From<span class="tour__price">250$ </span>
          </p>
        </div>

        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-3.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Museum Tours</h3>
          <p class="tour__desc">
            5 Tours- From <span class="tour__price"> 399$</span>
          </p>
        </div>

        <div class="tour__item">
          <div class="tour__wrapper-icon">
            <img src="./assets/icon/tour-icon-4.svg" alt="" class="tour__icon" />
          </div>
          <h3 class="tour__type">Cruises</h3>
          <p class="tour__desc">
            8 Tours- From <span class="tour__price">850$</span>
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
          <h3 class="comment__title subTitle">What our user say</h3>
          <div class="comment__quotes">
            <p class="comment__say">
              “Adding live social proof was the #1 driver of increased revenue
              in all my experiments while at Airkey.” and the bran must survive
              atleast 1 year.
            </p>
            <div class="comment__actor">
              <div class="actor__wrapper-avatar">
                <img src="https://plus.unsplash.com/premium_photo-1670360042659-a8637a2fd60e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4fHx8ZW58MHx8fHx8" alt="" class="actor__avatar" />
              </div>

              <div style="flex: 1 0">
                <h4 class="actor__name">Raul van Sutoyo</h4>
                <p class="actor__job">UI Designer</p>
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
      <h2 class="subTitle guide__title">Articles & Travel Guidings</h2>
      <p class="desc guide__desc">
        Travel has helped us to understand the meaning of life and it has helped
        us become better people. Each time we travel, we see the world with new
        eyes.
      </p>

      <section class="guide__content">
        <div class="guide__wrapper">
          <section class="guide__main-content">
            <img src="https://images.unsplash.com/photo-1714052326919-de54dbc2ada4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw5fHx8ZW58MHx8fHx8" alt="" class="guide__main-img" />
            <div class="guide__main-row">
              <h3 class="guide__subTitle">
                The real voyage does not consist in seeking new
              </h3>
              <span class="guide__date">Jun 1, 2021</span>
            </div>
            <p class="guide__subDesc">
              Excited him now natural saw passage offices you minuter. At by
              asked being court hopes.
            </p>
          </section>
          <ul class="guide__sub-list">
            <li class="guide__item">
              <img src="https://plus.unsplash.com/premium_photo-1713962962200-e33e90cb2c60?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyMHx8fGVufDB8fHx8fA%3D%3D" alt="" class="guide__thumb" />
              <div>
                <h3 class="guide__subTitle" style="font-size: 2rem; margin-bottom: 12px; max-width: 255px">
                  Mountains is always right destination.
                </h3>
                <p class="guide__subDesc" style="font-size: 1.4rem; max-width: 255px">
                  Farther so friends am to detract forbade
                </p>
                <span class="guide__date" style="margin-top: 52px; display: inline-block">Jun 1, 2021</span>
              </div>
            </li>
            <li class="guide__item">
              <img src="https://plus.unsplash.com/premium_photo-1713962962200-e33e90cb2c60?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyMHx8fGVufDB8fHx8fA%3D%3D" alt="" class="guide__thumb" />
              <div>
                <h3 class="guide__subTitle" style="font-size: 2rem; margin-bottom: 12px; max-width: 255px">
                  Mountains is always right destination.
                </h3>
                <p class="guide__subDesc" style="font-size: 1.4rem; max-width: 255px">
                  Farther so friends am to detract forbade
                </p>
                <span class="guide__date" style="margin-top: 52px; display: inline-block">Jun 1, 2021</span>
              </div>
            </li>

            <li class="guide__item">
              <img src="https://plus.unsplash.com/premium_photo-1713962962200-e33e90cb2c60?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyMHx8fGVufDB8fHx8fA%3D%3D" alt="" class="guide__thumb" />
              <div>
                <h3 class="guide__subTitle" style="font-size: 2rem; margin-bottom: 12px; max-width: 255px">
                  Mountains is always right destination.
                </h3>
                <p class="guide__subDesc" style="font-size: 1.4rem; max-width: 255px">
                  Farther so friends am to detract forbade
                </p>
                <span class="guide__date" style="margin-top: 52px; display: inline-block">Jun 1, 2021</span>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </section>

    <!-- SUBSCRIBE -->
    <section class="subscribe">
      <div class="subscribe__wrapper">
        <h3 class="subscribe__title">Subscribe our newsletter</h3>
        <p class="subscribe__desc">
          Reciev latest news, update, and many other things every week.
        </p>
        <form class="subscribe__form">
          <input class="subscribe__email" type="email" name="user-email" id="email" placeholder="Enter Your email address" />
          <button type="submit" class="subscribe__submit">
            <i class="fa-solid fa-paper-plane"></i>
          </button>
        </form>
      </div>
    </section>
  </div>
</main>
<?php include_once 'footer.php'; ?>