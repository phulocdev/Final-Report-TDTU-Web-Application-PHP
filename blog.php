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
            <img src="https://plus.unsplash.com/premium_photo-1677343210638-5d3ce6ddbf85?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dHJhdmVsfGVufDB8fDB8fHww" alt="" class="blog__single__thumb" />
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
                <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8dHJhdmVsfGVufDB8fDB8fHww" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  Khám Phá Văn Hóa Độc Đáo
                </h3>
              </div>
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dHJhdmVsfGVufDB8fDB8fHww" alt="" class="blog__search-thumb" />
                <h3 class="blog__search-name">
                  Chinh Phục Đỉnh Cao
                </h3>
              </div>
              <div class="blog__search-item">
                <img src="https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8dHJhdmVsfGVufDB8fDB8fHww" alt="" class="blog__search-thumb" />
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
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjJ8fHRyYXZlbHxlbnwwfHwwfHx8MA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              Du Lịch Mạo Hiểm: Khám Phá Những Vùng Đất Hoang Dã Nhất Thế Giới
            </h3>
            <p class="blog__item-desc">
              Đối mặt với thách thức và khám phá những vùng đất hoang dã hùng vĩ nhất thế giới, từ sa mạc nóng bỏng đến rừng nhiệt đới sâu thẳm.
            </p>

            <a href="#!" class="blog__item-more">Xem thêm</a>
          </div>
          <div class="blog__item">
            <img src="https://plus.unsplash.com/premium_photo-1679917737897-9b373261ad57?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHRyYXZlbHxlbnwwfHwwfHx8MA%3D%3D" alt="" class="blog__thumb" />
            <h3 class="blog__item-heading subTitle">
              Hòa Mình Trong Thiên Nhiên: 7 Địa Điểm Cắm Trại Lý Tưởng
            </h3>
            <p class="blog__item-desc">
              Lấy lại cân bằng bản thân và tận hưởng sự yên bình của thiên nhiên với danh sách 7 địa điểm cắm trại lý tưởng trên khắp thế giới.
            </p>

            <a href="#!" class="blog__item-more">Xem thêm</a>
          </div>
          <div class="blog__item">
            <img src="https://images.unsplash.com/photo-1528543606781-2f6e6857f318?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHRyYXZlbHxlbnwwfHwwfHx8MA%3D%3D" alt="" class="blog__thumb" />
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