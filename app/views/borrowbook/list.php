<link rel="stylesheet" href="/public/stylesheets/borrowbook-list.css">
<div class="site-content">
  <div class="c-page-content style-2">
    <div class="content-area">
      <div class="container">
        <div class="entry-header">
          <div class="entry-header_wrap">
            <div class="entry-title">
              <h2 class="item-title">Danh sách các truyện đã thuê</h2>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-12 col-sm-12">
            <div class="main-col-inner">
              <div class="page-content-listing single-page">
                <div class="listing-chapters_wrap show-more show">

                  <ul class="main version-chap active">

                    <?php foreach($listBorrow as $key => $value){ ?>
                      <li class="has-thumb wp-manga-chapter  free" data-id="6966">

                        <div class="chapter-thumb">
                          <a href="/book/<?php echo $value['isbn_no'] ?>">
                            <img width="1000" height="300" src="/image/<?php echo $value['subclass_3'] ?>" class="attachment-768 size-768" alt="<?php echo $value['title'] ?>" /> </a>
                          </div>

                          <div class="chapter-title">

                            <a href="/book/<?php echo $value['isbn_no'] ?>" class="chapter-name"><?php echo $value['title'] ?></a>

                            <span class="chapter-extend-name"><?php echo $value['author'] ?>
                            </span>

                            <span class="chapter-release-date start-date">
                              <i><?php echo $value['start_renting_date'] ?></i>
                            </span>
                            <span class="chapter-release-date delimeter">
                              <i>-&gt</i>
                            </span>
                            <span class="chapter-release-date end-date">
                              <i><?php echo $value['expire_renting_date'] ?></i>
                            </span>

                          </div>

                          <div class="chapter-meta">

                            <a href="#" data-book-id="<?php echo $value['book_id'] ?>" class="chapter-sell-type extend-borrow-book">
                              <i class="ion-android-calendar"></i>
                              <span class="chapter-price">Gia hạn</span>
                            </a>

                          </div>

                        </li>
                      <?php }?>

                      </ul>

                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
