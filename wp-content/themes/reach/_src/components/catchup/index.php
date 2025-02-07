<section <?= \Reach\Helpers::buildAttributes($args['attributes']); ?>>

    <div class = 'catchup__container'>
        <div class="catchup__inner">

        <div class  = 'catchup__header'>
            <h2><?= $args['header']; ?></h2>
        </div>

        </div>
        <div class = 'catchup__content'>

        <?php 

        $components = [];

       foreach($args['slider_content'] as $content){

            $components[] = \Reach\Component::get('slider', [
                    'top_header_slider' => $content['title'],
                    'slider_type' => 'Seasons',
                    'season' => $content['category'],
                    'limit' => 14,
                    'break_container' => true,
                    'background_colour' => '#1F1F1F',
                    'padding' => ['2rem', '0rem', '2rem', '0rem'],
                    'margin' => ['0', '0', '0', '0'],
                    'text_colour' => '#FFF',
                    'show_navigation' => false,
                    'card_color' => '#000',
                    
                    ],
                );
            }

            echo implode($components);


            ?>





  
    </div>
</section>