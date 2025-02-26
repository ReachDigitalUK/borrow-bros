<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class='season__container'>
        <div class="season__inner">

            <div class='season__top-content'>
                <div class='season__info'>
                    <h2><?= $args['title']; ?></h2>
                    <img src='/wp-content/themes/reach/_src/images/quote.svg' alt='quote'>
                    <h3><?= $args['description']; ?></h3>
                    <p><?= $args['content']; ?></p>
                </div>
                <div class='season__featured-episode'>
                    <div class='season__number-top'>
                        <div class='season__number'>
                            <p>Ep.</p>
                            <h2><?= $args['last_item']['title']; ?></h2>
                        </div>
                        <img src='<?= $args['last_item']['image']; ?>' alt='episode image'>
                    </div>
                    <div class='season__episode_description'>
                        <p class='season__featured-date'><?= $args['last_item']['date']; ?></p>
                        <p class='season__featured-description'><?= $args['last_item']['description']; ?></p>
                        <a><?= $args['last_item']['duration']; ?></a>
                    </div>
                </div>
            </div>

            <div class='season__middle-content'>
                <div class='season__episode-spacer'></div>
                <div class='season__episodes-list'>
                    <?php foreach($args['middle'] as $episode){ ?>
                    <div class='season__episode'>
                        <div class='season__episode-number'>
                            <div class='season__episode-number-top'>
                                <p>Ep.</p>
                                <h2><?= $episode['title']; ?></h2>
                            </div>
                            <img src='<?= $episode['image']; ?>' alt='episode image'>
                        </div>
                        <div class='season__episode-description'>
                            <p><?= $episode['description']; ?></p>
                            <div class='season__episode-description-bottom'>
                                <a><?= $episode['duration']; ?></a>
                                <p><?= $episode['date']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

          
            </div>

            <?php 

            $components = [];

            $components[] = \Reach\Component::get('slider', [
                'slider_type' => 'Seasons',
                'episodes' => $args['items'],
                'limit' => 14,
                'break_container' => true,
                'background_colour' => '#A41B1A',
                'padding' => ['5rem', '0rem', '5rem', '0rem'],
                'margin' => ['0', '0', '0', '0'],
                'text_colour' => '#FFF',
                'show_navigation' => false,
                'card_color' => '#980100',
                
            ],
            );


         echo implode($components);

?>
</section>