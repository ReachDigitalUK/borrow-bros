<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class="social-profile__inner">
        <?php if (!empty($args['heading'])) { ?>
            <?= \Reach\Component::get('heading', $args['heading']); ?>
        <?php } ?>

        <?php if (!empty($args['content'])) { ?>
            <div class="social-profile__content">
                <?= wp_kses_post($args['content']); ?>
            </div>
        <?php } ?>

        <?php if (!empty($args['items'])) { ?>
            <div class="social-profile__items">
                <?php foreach ($args['items'] as $key => $item) { ?>
                    <div class="social-profile__item">
                        <?= esc_html($item['heading']); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>