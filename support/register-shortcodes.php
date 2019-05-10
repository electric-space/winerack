<?php 

/**
 * Get the quarter content
 * usage: [quarters]
 */

function get_quarters($args=null){
    
    $ar = array(669, 671, 673, 675);
    $quart = '';

    $quart .= '<div class="uk-child-width-1-4@l uk-child-width-1-2@m" uk-grid>';
    
    foreach( $ar as $quarter ){
        
        $url =  get_permalink($quarter);
        
        $img = get_field('quarter_logo', $quarter);
        
        if( $is_sold = get_field('is_sold', $quarter) ){
            $is_sold = ' is_sold';    
            
        };
        $quart .= '<div>';
        $quart .= '<div class="module quarter'.$is_sold.'">';
        $quart .= '<a href="'.$url.'" class="quarter-wrapper-link">';
        $quart .= '<span style="background-image: url('.$img['url'].')"></span>';
        $quart .= get_field('quarter_copy', $quarter);
        $quart .= '</a></div>';
        $quart .= '</div>';
        
    }
    
    $quart .= '</div>';

    return $quart;
    
}

add_shortcode('quarters', 'get_quarters');


/**
 * Travel table
 * usage = [traveltable]
 * just a shortcode for: <?php get_template_part('support/partials/travletable');?>
 */

function travel_func(){
    
    $table = '
    
        <div class="travel-wrapper">
        <p><img src="'.get_bloginfo('template_directory') .'/images/rail.png" alt=""></p>';
        
        if( $train = get_field('train', 'options') ):
            $table .= '<p class="">'.$train['intro'].'</p>';
            
            $table .= 
            '<div class="travel-table">
                <div class="dest ">'.$train['destination'] .'</div>
                <div class="dist">'.$train['distance'].'</div>
            </div>';
        
        endif;
        
        $table .= '</div>';
        
        
    
    $table .= '
        
            <div class="travel-wrapper">
            <p><img src="'.get_bloginfo('template_directory').'/images/road.png" alt=""></p>';
            if( $road = get_field('road', 'options') ):
                $table.= '<p class="">'.$road['intro'].'</p>';
                $table .='
                <div class="travel-table">
                    <div class="dest">'.$road['destination'].'</div>
                    <div class="dist ">'.$road['distance'].'</div>    
                </div>';
            endif;
            
            $table .='</div>';
    
    
    return $table;
    
}

add_shortcode('traveltable', 'travel_func');


/**
 * Plan icons, this gets the icons from the Apartments page usoing the 'quad cols' custom field
 */

function plan_func(){
    
    if( $columns = get_field('columns', 8) ){
        
        foreach( $columns as $column ){
         
            // quad
            if( $column['acf_fc_layout'] == 'quad_columns'):
            
                $plan = '
                <h2>The full collection</h2>
                <div class="uk-grid uk-margin-top uk-text-center" uk-grid>
                    <div class="uk-width-1-4@m">
                        '.$column['col1'].'
                    </div>
                    <div class="uk-width-1-4@m">
                        '.$column['col2'].'
                    </div>
                    <div class="uk-width-1-4@m">
                        '.$column['col3'].'
                    </div>
                    <div class="uk-width-1-4@m">
                        '.$column['col4'].'
                    </div>                
                </div>';
            
            endif;
            
        } 
        
        
    }
    
    return $plan; 
    
    
}


add_shortcode('plan_icons', 'plan_func');






/**
 * contact
 * usage = [contact text="{display text}" class="{}"]
 */

function contact_func($atts){
    
    $args = shortcode_atts( array(
            'text'  => '',
            'class' => '',
            'size'  => ''
        ), $atts);
        
        
        if( $args['text'] ){
            $meta = '<a href="'.home_url().'/contact/" class="button '.$args['class'].sizing_matrix($args['size']).'">'.$args['text'].'</a>';    
        }else{
            $meta = '<a href="'.home_url().'/contact/" class="button '.$args['class'].sizing_matrix($args['size']).'">Register your interest</a>';
        }
        
        

    return $meta;
    
}

add_shortcode('contact', 'contact_func');






/**
 * View property details
 * usage = [view text="{display text}" page="{page slug}" class="{class, coz you never know}"]
 */

function view_func($atts){
    
    extract( shortcode_atts( array(
            'text'  => '',
            'page'  => '',
            'class' => ''
        ), $atts) );
        
        $meta = '<a href="'.home_url().'/'.$page.' " class="button '.$class.'">'.$text.'</a>';

    return $meta;
    
}

add_shortcode('view', 'view_func');




/**
 * Floor plans
 */

 
function plans_func($atts){
    
    $args = shortcode_atts( array(
            'text'  => '',
            'class' => ''
            
        ), $atts);
        
    if( !$args['text'] ){
        $text = 'View PDF';
    }else{
        $text = $args['text'];
    }

    $pdf = '';
    $pdf .= '<div class="uk-grid uk-child-width-1-2@s uk-margin-top floor-plan-downloads uk-text-center" uk-grid>';
    if( $plans = get_field('floor_plan') ){
        
        foreach( $plans as $plan){
            
            $nicename = ucwords( str_ireplace('-', ' ', $plan['file']['title'] ) );
            $pdf .= '<div>
                <h3 class="uk-text-center">'.$nicename.'</h3>
                <a class="button" href="'.$plan['file']['url'].'" target="_blank">'.$text.'</a>';
                
            if( $plan['floor_diagram']){
                
                $pdf .= '<img src="'.$plan['floor_diagram']['url'].'" width="220" class="uk-text-center uk-margin-top" alt="'.$plan['floor_diagram']['alt'].'" />';
                
            }
            
            
            
            $pdf .="</div>";
        }
    }

    $pdf .= "</div>";

    return $pdf;

}

add_shortcode('floorplans', 'plans_func');








/**
 * Dowload brochure
 * usage = [brochure text="{display text}"  class="{class, coz you never know}"]
 */

function brochure_func($atts){
    
    $args =  shortcode_atts( array(
        'text'  => '',
        'class' => '',
        'url'   => '',
        'size'  => ''
    ), $atts);
    
    // default brochure set in theme options
    $pdf = get_field('pdf', 'options');
    
    
    
    
    
    
    if( $args['url'] ){

        $nicename = str_ireplace('-', ' ', $args['url'] );

        
        $meta = '<a href="'.home_url().'/.pdf. " target="_blank" class="button '.$args['class'].sizing_matrix($args['size']).'">Download '.$nicename.' pdf</a>';

    }else{
        if( $args['text'] ){
            $meta = '<a href="'.$pdf['url'].' " target="_blank" class="button '.$args['class'].sizing_matrix($args['size']).'">'.$args['text'].'</a>';
        }else{
            $meta = '<a href="'.$pdf['url'].' " target="_blank" class="button '.$args['class'].sizing_matrix($args['size']).'">Download brochure</a>';
        }
    }

    return $meta;
    
}

add_shortcode('brochure', 'brochure_func');






/**
 * Social list, includes all accounts in a UL with icons
 * Usage [social_list]
 */

function social_list_func($atts){
    
    if( $accounts = get_field('social_accounts', 'option') ):

        $list = '<ul class="social-list clear uk-align-right@s">';
            	
        $social = explode("\n", $accounts);
        
        foreach( $social as $link )
        {
           $account = array_filter( explode('/', $link) );
           $account = str_ireplace( array('www.','.com','.co.uk'), '', $account[2]);
           $list .= '<li class="'.$account.'"><a href="'.$link.'" class="social_icons fade" target="_blank" uk-icon="icon: '.$account.'"></a></li>';
        
        };
        
        
        $list .= '</ul>';
        
        return $list;

    endif;
}


add_shortcode( 'social_list', 'social_list_func');




/**
 * social
 * Usage [instagram]
 * Accounts are added in the theme settings page, then select which account you want to print
 */

function inst_func($atts) {
    
    
    if( $account = get_field('social_accounts', 'option') ):
        
        $inst = array_filter( explode('/', $account) );
            
        $provider = str_ireplace( array('www.','.com'), '', $inst[2]);
            
        $user = $inst[3];
        
    
            
                $inst = '<div class="wrapper uk-text-center">';
                $inst .= '<a href="'.$account.'"><i  class="uk-icon" uk-icon="icon: instagram; ratio:2"></i></a>';
                $inst .= '<p><a href="'.$account.'">Follow us on Instagram @'.$user.'</a></p>';
                $inst .= '</div>';

                //return '<a href="'.$link.'"  target="_blank">'.$user.'</a>';
                return $inst;

        
        //print_r( $account);
        
        
    endif;
}

add_shortcode('instagram', 'inst_func');






/**
 * Phone shortcode
 * Usage [phone icon="true/false"]
 */    

function phone_func( $atts ) {
    $args = shortcode_atts( array(
        'icon' => ''
    ), $atts, 'phone' );

    $args['icon'] = filter_var( $args['icon'], FILTER_VALIDATE_BOOLEAN );
    
    if( $telephone = get_field('phone_number', 'option') ):
    
    
        if ( $args['icon']   )         
        {
            $icon = '<span class="uk-icon-phone"></span>';
            return $icon.$telephone;
        }
        else
        {
            return $telephone;    
        }
        
    endif;
}

add_shortcode('phone', 'phone_func');



/**
 * email shortcode
 * Usage [email icon="true/false"]
 */    

function email_func( $atts ) {
    $args = shortcode_atts( array(
        'icon' => ''
    ), $atts, 'email' );

    $args['icon'] = filter_var( $args['icon'], FILTER_VALIDATE_BOOLEAN );
    
    if( $email = get_field('email', 'option') );
    
    if ( $args['icon']   )         
    {
        $icon = '<span class="uk-icon-envelope"></span>';
        return '<a href="mailto:'.$email.'">'.$icon.$email.'</a>';
    }
    else
    {
        return '<a href="mailto:'.$email.'">'.$email.'</a>';    
    }
}

add_shortcode( 'email', 'email_func' );


/**
 * address shortcode
 * Usage [address]
 */    

function add_func() {
    
    
    if( $address = get_field('office_address', 'options') ){
        $add = '';
        $arr = explode("\n", $address);
        
        foreach( $arr as $line ){
            $add .= $line.'<br>';
        }
        
        
        return $add;
        
        
    }
    
    
    
}

add_shortcode( 'address', 'add_func' );







/**
 * column shortcode
 * usage [column align="" width=""]
 * 
 * !!!THIS NEEDS WORK!!!
 *
 */
 
function column_func( $atts, $content = null ) {
    
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    
	extract( shortcode_atts( array(
		'align' => '',
		'width' => '',
		'class' => ''
	), $atts ) );

	return '<div class="page-column '.$align.$class.'" style="width:'.$width.'px">'.
			do_shortcode($content).
			'</div>';
}

add_shortcode( 'column', 'column_func' );



/**
 * Button shortcode
 * usage: [button text="" page="{page name}" size=""]
 */


function button_func( $atts ){
	
	$args = ( shortcode_atts( array(
		'text' => '',
		'page' => '',
		'size' => '',
	), $atts ) );

	return '<a href="'.get_bloginfo('url').'/'.$args['page'].'/" class="button '.$args['size'].'">'.$args['text'].'</a>';
	
}

add_shortcode( 'button', 'button_func');



