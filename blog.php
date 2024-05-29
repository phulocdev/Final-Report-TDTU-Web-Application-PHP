<?php include_once 'header.php' ?>
<title>Blog</title>
<link rel="stylesheet" href="./assets/styles/blog.css" />

<body>
  <div class="blog-hero">
    <h1 class="blog__heading">Welcome to our Travel Blog</h1>
  </div>

  <main>
    <div class="container">
      <div class="blog__content">
        <div class="blog__row">
          <div class="blog__single">
            <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__single__thumb" />
            <h2 class="blog__single__heading subTitle">
              Exploring Argentina and Chile by Bus
            </h2>
          </div>

          <div class="blog__search">
            <form action="">
              <input type="text" name="" id="" placeholder="Tìm kiếm bài viết" class="blog__search__input" />
              <button class="btn blog__search-btn">Tìm</button>
            </form>

            <p style="
                  margin-top: 30px;
                  color: #2d3134;
                  font-size: 2.4rem;
                  font-weight: 600;
                  line-height: 1.33em; /* 133.333% */
                ">
              Recent Blog
            </p>

            <div class="blog__search-list">
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  7 Tips For Nomads On A Budget Trips
                </h3>
              </div>
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  7 Tips For Nomads On A Budget Trips
                </h3>
              </div>
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  7 Tips For Nomads On A Budget Trips
                </h3>
              </div>
            </div>
          </div>
        </div>

        <!-- Blog list -->
        <div class="blog__list">
          <div class="blog__item">
            <img src="https://images.unsplash.com/photo-1716718405779-79c152f0f831?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              On the Shores of a Pink Lake in Australia
            </h3>
            <p class="blog__item-desc">
              Meh synth Schlitz, tempor duis single-origin coffee ea next
              level ethnic fingerstache fanny pack nostrud. Photo booth anim
              8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse
              nihil...
            </p>

            <a href="#!" class="blog__item-more">Read more</a>
          </div>
          <div class="blog__item">
            <img src="https://images.unsplash.com/photo-1716718405779-79c152f0f831?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              On the Shores of a Pink Lake in Australia
            </h3>
            <p class="blog__item-desc">
              Meh synth Schlitz, tempor duis single-origin coffee ea next
              level ethnic fingerstache fanny pack nostrud. Photo booth anim
              8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse
              nihil...
            </p>

            <a href="#!" class="blog__item-more">Read more</a>
          </div>
          <div class="blog__item">
            <img src="https://images.unsplash.com/photo-1716718405779-79c152f0f831?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              On the Shores of a Pink Lake in Australia
            </h3>
            <p class="blog__item-desc">
              Meh synth Schlitz, tempor duis single-origin coffee ea next
              level ethnic fingerstache fanny pack nostrud. Photo booth anim
              8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse
              nihil...
            </p>

            <a href="#!" class="blog__item-more">Read more</a>
          </div>
        </div>

        <div style="text-align: center">
          <button class="btn blog-btn">Xem thêm</button>
        </div>
      </div>
    </div>
  </main>
</body>
<?php include_once 'footer.php' ?>