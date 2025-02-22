<article <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class="g-card__inner">
        <?php if (!empty($args['content']['heading']) || !empty($args['content']['text'])) { ?>
            <div class="g-card__header">
                <?php if (!empty($args['content']['heading'])) { ?>
                    <?= \Reach\Component::get('heading', $args['content']['heading']); ?>
                <?php } ?>

                <?php if (!empty($args['content']['text'])) { ?>
                    <div class="g-card__content">
                        <?= wp_kses_post($args['content']['text']); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (!empty($args['content']['meta'])) { ?>
            <div class="g-card__meta">
                <?= wp_kses_post($args['content']['meta']); ?>
            </div>
        <?php } ?>

        <?php if (!empty($args['content']['labels'])) { ?>
            <div class="g-card__labels">
                <div class="g-card__labels__items">
                    <?php foreach ($args['content']['labels'] as $label) {
                        echo \Reach\Component::get('link', [
                            'title' => $label['name'],
                            'url' => $label['url'],
                            'classes' => ['reach-button', 'reach-button--label']
                        ]);
                    } ?>
                </div>
            </div>
        <?php } ?>

        <?php if ($args['show_read_more'] && !empty($args['content']['read_more'])) {
            echo \Reach\Component::get('link', $args['content']['read_more']);
        } ?>
    </div>

    <?php if (!empty($args['content']['image'])) { ?>
        <div class="g-card__image">
            <div class="g-card__image-inner img-fit">
                <?= \Reach\Component::get('image', $args['content']['image']); ?>
            </div>
        </div>
    <?php } ?>
</article>