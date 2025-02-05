<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class="collapsible__inner">
        <?php if (!empty($args['items'])) { ?>
            <div class="collapsible__items">
                <?php foreach ($args['items'] as $key => $item) { ?>
                    <div class="collapsible__item<?= $item['open_by_default'] ? ' active' : ''; ?>">
                        <div class="collapsible__item__title">
                            <?= $item['title']; ?>
                            <div class="collapsible__item__title__toggle">
                                <?= Reach\SVG::get('icons/PlusIcon.svg'); ?>
                            </div>
                        </div>
                        <div class="collapsible__item__content">
                            <?= $item['content']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>