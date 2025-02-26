<header <?= \Reach\Helpers::buildAttributes($args['attributes']) ?>>
    <div class="site-header__inner">
        <div class="site-header__top">
            <?= \Reach\Component::get('link', [
                'url' => home_url('/'),
                'classes' => ['site-header__logo', 'img-fit'],
                'content' => \Reach\Image::get('download.svg', [
                    'alt' => get_bloginfo('name'),
                    'loading' => false,
                    'attributes' => [
                        'data-spai-eager' => class_exists('\\ShortPixelAI') ? 'true' : null,
                    ],
                ]),
                'content_filter' => false,
            ]); ?>



            <?= \Reach\Component::get('burger', [
                'classes' => [
                    'site-header__burger',
                    'js-site-header-toggle',
                ],
                'attributes' => [
                    'aria-label' => __('Main menu button', 'reach'),
                    'aria-controls' => 'main-menu',
                    'aria-expanded' => 'false',
                ],
            ]); ?>
        </div>

        <div class="site-header__bottom">
            <?= \Reach\Component::get('menu', [
                'theme_location' => 'header',
                'menu_id' => 'main-menu', // Required for 'aria-controls' in burger component.
                'classes' => [
                    'site-header__navigation',
                ],
            ]); ?>


            <div class= 'site-header__icon-row'>
                <a href="https://www.facebook.com/">
                    <?= \Reach\Image::get('/social/youtube.svg') ?>
                </a>
                <a href="https://www.instagram.com/">
                     <?= \Reach\Image::get('/social/spotify.svg') ?> 
                </a>
                <a href="https://www.twitter.com/">
                    <?= \Reach\Image::get('/social/apple.svg') ?>
                </a>
                <a href="https://www.linkedin.com/">
                    <?= \Reach\Image::get('/social/amazon.svg') ?>
                </a>
            </div>

    </div>
</header>