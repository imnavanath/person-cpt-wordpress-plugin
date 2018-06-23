<?php 

class short_code {

	function __construct() {
		add_shortcode( 'Person_Shortcode', array ($this, 'nb_shortcode_for_custom' ) );
        add_action('admin_notices', array ($this, 'author_admin_notice' ) );
        add_action( 'wp_enqueue_scripts', array ($this, 'load_plugin_style' ) );
	}

    function load_plugin_style() {
        wp_enqueue_style( 'custom_plugin_style', NB_PLUGIN_URL . '/style/style.css' );
        wp_enqueue_style( 'reqd_font_awesome_style', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css' );
    }

    function nb_shortcode_for_custom() {
    $loop = new WP_Query( array(
        'post_type'         => 'person',
        ));

    while( $loop->have_posts() ) {
        $loop->the_post();?>
        	<div class="custom_post_type">
                <div class="post_type_view">
                    <div class="wrapper">
                        <div class="image">
                            <div class="feature_img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <p class="custom_post_type_content">  
                                <?php echo get_post_meta( get_the_ID(), 'Designation', true); ?>
                            </p>
                        </div>  

                        <div class="info">
                            <h6 class="custom_post_type-title">         
                                <a href="<?php the_permalink();?>">
                                    <?php the_title(); ?>
                                </a>
                            </h6>

                            <div class="get_social">   
                                <?php if(! empty (get_post_meta( get_the_ID(), 'Facebook', true))) :?>          
                                <div class="facebook">
                                    <a href="<?php echo get_post_meta( get_the_ID(), 'Facebook', true); ?> " target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>                                  
                                <?php endif;?>
                                            
                                <?php if(! empty (get_post_meta( get_the_ID(), 'Twitter', true))) :?> 
                                <div class="twitter">
                                    <a href="<?php echo get_post_meta( get_the_ID(), 'Twitter', true); ?> " target="_blank">
                                        <i class="fab t_effect fa-twitter"></i>
                                    </a>
                                </div>
                                <?php endif;?>                                      
                                                
                                <?php if(! empty (get_post_meta( get_the_ID(), 'Instagram', true))) :?>  
                                    <div class="instagram">
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'Instagram', true); ?> " target="_blank">
                                            <i class="fab i_effect fa-instagram"></i>
                                        </a>
                                    </div>
                                <?php endif;?>                                  
                            </div>                   
                        </div>                               
                    </div>                          
                </div>
            </div>
	<?php }

	wp_reset_postdata();
    }

    function author_admin_notice(){
        global $pagenow;
        global $typenow;
        if ( $pagenow == 'edit.php' && $typenow == 'person') {?>

        <div class="notice notice-info" style="margin-top: 20px;">
            <h3 style="display: inline-block;"> Use this short-code on custom page where you want to show all person.</h3>
            <input style="margin-left: 20px;" type="text" value="[Person_Shortcode]" readonly/>
        </div>
    <?php }
    }
}

$obj_short_code = new short_code();