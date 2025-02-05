<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
<div class='hero__container'>
    <div class="hero__inner">

    <div class='hero__title'>  
        <?php if(!empty($args['heading'])): ?>
            <h1 class='hero__heading'><?= $args['heading']; ?></h1>
        </div>     
        <?php endif; ?>

        <?php if(!empty($args['content'])): ?>
            <div class='hero__content'>
                <h2><?= $args['content']; ?></h2>
            </div>
        <?php endif; ?>

    </div>
</div>
</section>