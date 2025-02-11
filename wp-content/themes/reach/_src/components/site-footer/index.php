<footer <?= \Reach\Helpers::buildAttributes($args['attributes']) ?>>
    <div class="site-footer__inner">
        <div class="site-footer__top alignwide">

            <div class="site-footer__logo">
                <?= \Reach\Component::get('link', [
                    'url' => home_url('/'),
                    'content' => \Reach\Image::get('logo-alt.svg', [
                        'alt' => get_bloginfo('name'),
                    ]),
                    'content_filter' => false,
                ]); ?>
            </div>

            <div class = 'site-footer__short-description'>
               <p>Available on all your favourite channels</p>
            </div>

            <div class="site-footer__icon-row">
                <a href="https://www.facebook.com/">
                    <?= \Reach\Image::get('/social/youtube-white.svg') ?>
                </a>
                <a href="https://www.instagram.com/">
                     <?= \Reach\Image::get('/social/spotify-white.svg') ?> 
                </a>
                <a href="https://www.twitter.com/">
                    <?= \Reach\Image::get('/social/apple-white.svg') ?>
                </a>
                <a href="https://www.linkedin.com/">
                    <?= \Reach\Image::get('/social/amazon-white.svg') ?>
                </a>
            </div>

            <div class='site-footer__motto'>
                <h3>We've got you covered.</h3>
            </div>

    </div>
</footer>