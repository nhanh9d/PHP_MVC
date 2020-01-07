<div class="site-content">
  <div class="c-page-content style-2">
    <div class="content-area">
      <div class="container">
        <div class="row ">
          <div class="col-md-12 col-sm-12">
            <div class="main-col-inner">
              <div id="post-90651" class="c-blog-post post-90651 page type-page status-publish hentry">
                <div class="entry-header">
                  <div class="entry-header_wrap">
                    <div class="entry-title">
                      <h2 class="item-title"><?php echo $bookDetail['title'] ?></h2>
                    </div>
                  </div>
                </div>
                <div class="entry-content">
                  <div class="entry-content_wrap">
                    <div class="vc_row wpb_row vc_row-fluid mpc-row">
                      <div class="wpb_column vc_column_container vc_col-sm-12 mpc-column" data-column-id="mpc_column-275e082c7699341">
                        <div class="vc_column-inner ">
                          <div class="wpb_wrapper">
                            <div class="cover-image">
                              <img src='/image/<?php echo $bookDetail['cover_image'] ?>' class="img-responsive"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="vc_row wpb_row vc_row-fluid mpc-row">
                      <div class="wpb_column vc_column_container vc_col-sm-12 mpc-column">
                        <div class="vc_column-inner ">
                          <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element ">
                              <div class="wpb_wrapper">
                                <h1>Giới thiệu</h1>
                                <div class="detail-content">
                                  <?php echo $bookDetail['description'] ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="vc_row wpb_row vc_row-fluid mpc-row">
                      <div class="wpb_column vc_column_container vc_col-sm-12 mpc-column">
                        <div class="vc_column-inner ">
                          <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element ">
                              <div class="wpb_wrapper">
                                <div class="detail-action">
                                  <a href="#" class="btn-detail-page" id="btn-borrow-book" data-book-id="<?php echo $bookDetail['book_id'] ?>">Thuê</a>
                                  <a href="#" class="btn-detail-page" id="btn-feedback">Phản hồi</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<input type="hidden" id="feedback_book-id" value="<?php echo $bookDetail['book_id'] ?>"/>
