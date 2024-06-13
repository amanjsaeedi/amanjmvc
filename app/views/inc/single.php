<section>
    <div class="container">
        <div class="col col-lg-8 bg-white mx-auto shadow-sm my-2">
            <div class="p-2">
                <div id="newsHeader" class="row">
                    <div class="col-md-8">
                        <div>
                            <span>کدخبر: 102536 |</span>
                            <span><?php echo $data['post']->date; ?> |</span>
                            <span><?php echo $data['post']->time; ?> |</span>
                            <span>15 دیدگاه</span>
                        </div>
                        <h3 class="text-muted mt-2">
                            <small>ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</small>
                        </h3>
                        <h2 class="my-auto">
                            <?php echo $data['post']->title; ?>
                        </h2>
                    </div>
                    <div class="col-md-4">
                        <img src="img/news1.jpg" class="img-fluid float-end" alt="" />
                    </div>
                </div>
                <div id="newsBody">
                    <p class="lead mt-2">
                        <?php echo $data['post']->description; ?>
                    </p>
                </div>
                <div id="newsFooter">فوتر خبر</div>
            </div>
        </div>
    </div>
</section>