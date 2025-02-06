<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class='season__container'>
        <div class="season__inner">

            <div class = 'season__top-content'>
                <div class = 'season__info'>
                    <h2><?= $args['title']; ?></h2>
                    <img src = '/wp-content/themes/reach/_src/images/quote.svg' alt = 'quote'>
                    <h3><?= $args['description']; ?></h3>
                    <p><?= $args['content']; ?></p>
                </div>
                
                <div class = 'season__featured-episode'>
                    <div class='season__number-top'>
                        <div class='season__number'>
                            <p>Ep.</p>
                            <h2><?= $args['last_item']['title']; ?></h2>
                        </div>
                        <img src = '<?= $args['last_item']['image']; ?>' alt = 'episode image'>  
                    </div>
                    <div class='season_episode_description'>
                        <div class='season_episode_description_date'>
                            <p><?= $args['last_item']['date']; ?></p>
                            <p><?= $args['last_item']['description']; ?></p>
                            <a><?= $args['last_item']['duration']; ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class = 'season__middle-content'>
                <div class='season__episode-spacer'></div>
                <div class = 'season__episodes-list'>
                    <?php foreach($args['middle'] as $episode){ ?>
                        <div class = 'season__episode'>
                            <div class = 'season__episode-number'>
                                <p>Ep.</p>
                                <h2><?= $episode['title']; ?></h2>
                                <img src = '<?= $episode['image']; ?>' alt = 'episode image'>
                            </div>
                            <div class = 'season__episode-description'>
                                <p><?= $episode['date']; ?></p>
                                <p><?= $episode['description']; ?></p>
                                <a><?= $episode['duration']; ?></a>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
    </div>
</section>