<div class="travel-wrapper">
    <p><img src="<?php bloginfo('template_directory') ;?>/images/rail.png" alt=""></p>
    <?php if( $train = get_field('train', 'options') ): ;?>
        <?php echo '<p class="">'.$train['intro'].'</p>' ;?>
        <div class="travel-table" uk-grid>
            <div class="dest uk-width-1-2"><?php echo $train['destination'] ;?></div>
            <div class="dist uk-width-1-2"><?php echo $train['distance'] ;?></div>    
        </div>
    <?php endif ;?>
</div>
        
<div class="travel-wrapper">
    <p><img src="<?php bloginfo('template_directory') ;?>/images/road.png" alt=""></p>
    <?php if( $road = get_field('road', 'options') ): ;?>
        <?php echo '<p class="">'.$road['intro'].'</p>' ;?>
        <div class="travel-table" uk-grid>
            <div class="dest uk-width-1-2"><?php echo $road['destination'] ;?></div>
            <div class="dist uk-width-1-2"><?php echo $road['distance'] ;?></div>    
        </div>
    <?php endif ;?>
</div>