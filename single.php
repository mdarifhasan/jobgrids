<?php
/**
 * Single blog template
 * 
 * @package JonGrids
 */
get_header();
get_template_part('/template-parts/breadcrumbs');

while(have_posts(  )){
  the_post();
?>
<section class="section blog-single">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1 col-12">
        <div class="single-inner">
          <!-- //Blog template entry header -->
          <?php get_template_part('/template-parts/blog/entry-header'); ?>
          <div class="post-details">
            <div class="detail-inner">
              <?php
                get_template_part('/template-parts/blog/entry-meta');
                get_template_part('/template-parts/blog/entry-content');
              ?>
             
              
              <!-- Related Tags  -->
              <div class="post-tags-media mt-5">
               <?php 
                get_template_part('/template-parts/related-tags');
               ?>

                <!-- Social share -->
                <div class="post-social-media">
                  <h5 class="share-title">Social Share</h5>

                  <ul class="custom-flex">
                    <li>
                      <a href="#">
                        <i class="lni lni-twitter-original"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="lni lni-facebook-original"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="lni lni-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="comment-form">
                <?php comments_template(  ); ?>
            </div>
            <div class="post-comments">
              <h3 class="comment-title">
                <span>3 comments on this post</span>
              </h3>
              <ul class="comments-list">
                <li>
                  <div class="comment-img">
                    <img
                      src="assets/images/blog/comment1.png"
                      class="rounded-circle"
                      alt="img"
                    />
                  </div>
                  <div class="comment-desc">
                    <div class="desc-top">
                      <h6>Rosalina Kelian</h6>
                      <span class="date">19th May 2023</span>
                      <a href="#" class="reply-link"
                        ><i class="lni lni-reply"></i>Reply</a
                      >
                    </div>
                    <p>
                      Donec aliquam ex ut odio dictum, ut consequat leo
                      interdum. Aenean nunc ipsum, blandit eu enim sed,
                      facilisis convallis orci. Etiam commodo lectus quis
                      vulputate tincidunt. Mauris tristique velit eu magna
                      maximus condimentum.
                    </p>
                  </div>
                </li>
                <li class="children">
                  <div class="comment-img">
                    <img
                      src="assets/images/blog/comment2.png"
                      class="rounded-circle"
                      alt="img"
                    />
                  </div>
                  <div class="comment-desc">
                    <div class="desc-top">
                      <h6>
                        Arista Williamson
                        <span class="saved"
                          ><i class="lni lni-bookmark"></i
                        ></span>
                      </h6>
                      <span class="date">15th May 2023</span>
                      <a href="#" class="reply-link"
                        ><i class="lni lni-reply"></i>Reply</a
                      >
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim.
                    </p>
                  </div>
                </li>
                <li>
                  <div class="comment-img">
                    <img
                      src="assets/images/blog/comment3.png"
                      class="rounded-circle"
                      alt="img"
                    />
                  </div>
                  <div class="comment-desc">
                    <div class="desc-top">
                      <h6>Arista Williamson</h6>
                      <span class="date">12th May 2023</span>
                      <a href="#" class="reply-link"
                        ><i class="lni lni-reply"></i>Reply</a
                      >
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam.
                    </p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="comment-form">
              <h3 class="comment-reply-title">
                <span>Leave a comment</span>
              </h3>
              <form action="#" method="POST">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-box form-group">
                      <input
                        type="text"
                        name="#"
                        class="form-control form-control-custom"
                        placeholder="Your Name"
                      />
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-box form-group">
                      <input
                        type="email"
                        name="#"
                        class="form-control form-control-custom"
                        placeholder="Your Email"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-box form-group">
                      <input
                        type="email"
                        name="#"
                        class="form-control form-control-custom"
                        placeholder="Your Subject"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-box form-group">
                      <textarea
                        name="#"
                        rows="6"
                        class="form-control form-control-custom"
                        placeholder="Your Comments"
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="button">
                      <button type="submit" class="btn mouse-dir white-bg">
                        Post Comment <span class="dir-part"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}
get_footer( );
?>
