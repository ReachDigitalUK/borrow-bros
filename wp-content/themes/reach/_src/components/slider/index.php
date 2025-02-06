<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class="slider__inner">

    <?php if(!empty($args['top_header_slider'])) { ?>
            <div class="slider__top-header">
                <h2><?= $args['top_header_slider']; ?></h2>
            </div>
        <?php } ?>

        <?php if($args['show_navigation'] === true) { ?>
            <div class="slider__navigation">
                <div class="left-nav"><?= \Reach\SVG::get('slider-left.svg'); ?></div>
                <div class="right-nav"><?= \Reach\SVG::get('slider-right.svg'); ?></div>
            </div>
        <?php } ?>


<?php  if($args['slider_type'] === 'Seasons') {?>

          <div class="swiper cards-slider">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($args['items'] as $key => $card) {?>
                            <div class="swiper-slide season-card">
                                <div class="swiper_inner" style=background-color:<?= $card['card_color']; ?>;>
                                    <div class='season-card__infomation'>
                                        <div class='season-card__title'>
                                            <p>EP.</p>
                                            <h3><?= $card['title']; ?></h3>
                                        </div>
                                        <div class='season-card__description'>
                                            <p><?= $card['description']; ?></p>
                                        </div>
                                        <div class='season-card__link'>
                                            <p>Watch</p>
                                            <a href="<?php if(!empty($card['link'])){ echo $card['link'];}else{echo '/';}; ?>"><?php if(!empty($card['duration'])){ echo $card['duration'];}else{echo 'No Time Set';}; ?> </a>
                                         </div>
                                    </div>
                                    <div class='season-card__details'>
                                    <div class="season-card__image">
                                        <img src="<?= $card['image']; ?>">
                                    </div>
                                    <div class='season-card__date'>
                                        <p><?= $card['date']; ?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
</section>

<?php } 

if($args['slider_type'] === 'Icon'){?>

<div class="swiper cards-slider">
    <div class="swiper-wrapper">
        <?php
            foreach ($args['icon_images'] as $logo) {?>
                <div class="swiper-slide icon-logo">
                    <img src="<?= $logo['image']; ?>">
                </div>
            <?php } ?>
    </div>
</div>

<?php } ?>















