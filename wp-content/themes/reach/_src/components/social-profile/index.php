<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class = 'social-profile__container'>
        <div class="social-profile__inner">
            <div class ='social-profile__title'>
                <h2 class="social-profile__title">Hosted By</h2>
            </div>
            <div class="social-profile__list">
                <?php foreach ($args['profile'] as $profile){ ?>
                    <div class = 'social-profile__item'>
                        <div class = 'social-profile__top'>
                            <p class="social-profile__item-name"><?= $profile['name']; ?></p>
                            <div class='social-profile__social-icons'>
                                <a href="<?= $profile['linkedin_link']; ?>"> <?= \Reach\Image::get('/social/linkedin.svg') ?></a>
                                <a href="<?= $profile['instagram_link']; ?>"> <?= \Reach\Image::get('/social/instagram.svg') ?></a>
                            </div>
                        </div>
                        <div class = 'social-profile__image'>
                            <img src="<?= $profile['image']; ?>">
                        </div>
                        <div class = 'social-profile__description'>
                            <p class="social-profile__item-description"><?= $profile['description']; ?></p>
                        </div>
                    </div>
                <?php }?>
        </div>
</section>