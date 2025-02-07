<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>
    <div class="bottom-text__container">
        <div class="bottom-text__inner">

            <div class='bottom-text__left'></div>
            <div class='bottom-text__right'>


                <div class="bottom-text__content">
                    <?php if (!empty($args['content'])){
                        foreach($args['content'] as $content){?>

                            <div class = 'bottom-text__content__item'>
                                <h3><?= $content['paragraph'] ?></h3>
                                <p><?= $content['text'] ?></p>
                            </div>


                      <?php  }

                    } ?>


            </div>
                
        </div>

        </div>
    </div>
</section>