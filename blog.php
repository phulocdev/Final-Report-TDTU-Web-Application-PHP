<?php include_once 'header.php' ?>
<title>Blog</title>
<link rel="stylesheet" href="./assets/styles/blog.css" />

<body>
  <div class="blog-hero">
    <h1 class="blog__heading">Travel Blog</h1>
  </div>

  <main>
    <div class="container">
      <div class="blog__content">
        <div class="blog__row">
          <div class="blog__single">
            <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__single__thumb" />
            <h2 class="blog__single__heading subTitle">
              7 Điểm Đến Thú Vị Nhất Ở Châu Á Bạn Không Thể Bỏ Lỡ
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
              Bài viết vừa xem
            </p>

            <div class="blog__search-list">
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  Khám Phá Văn Hóa Độc Đáo
                </h3>
              </div>
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  Chinh Phục Đỉnh Cao
                </h3>
              </div>
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1716547286288-df00f829a799?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  Trải Nghiệm Văn Hóa Ẩm Thực
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
              Du Lịch Mạo Hiểm: Khám Phá Những Vùng Đất Hoang Dã Nhất Thế Giới
            </h3>
            <p class="blog__item-desc">
              Đối mặt với thách thức và khám phá những vùng đất hoang dã hùng vĩ nhất thế giới, từ sa mạc nóng bỏng đến rừng nhiệt đới sâu thẳm.
            </p>

            <a href="#!" class="blog__item-more">Xem thêm</a>
          </div>
          <div class="blog__item">
            <img src="https://images.unsplash.com/photo-1716718405779-79c152f0f831?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              Hòa Mình Trong Thiên Nhiên: 7 Địa Điểm Cắm Trại Lý Tưởng
            </h3>
            <p class="blog__item-desc">
              Lấy lại cân bằng bản thân và tận hưởng sự yên bình của thiên nhiên với danh sách 7 địa điểm cắm trại lý tưởng trên khắp thế giới.
            </p>

            <a href="#!" class="blog__item-more">Xem thêm</a>
          </div>
          <div class="blog__item">
            <img src="https://images.unsplash.com/photo-1716718405779-79c152f0f831?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              Bí Mật Đằng Sau Những Điểm Đến Du Lịch Phổ Biến Trên Thế Giới
            </h3>
            <p class="blog__item-desc">
              Khám phá những bí mật, câu chuyện lịch sử và những điều thú vị đằng sau những điểm đến du lịch nổi tiếng trên thế giới, từ Đông sang Tây
            </p>

            <a href="#!" class="blog__item-more">Xem thêm</a>
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