<?php 
class Custom_Widget extends WP_Widget {
 
    public function __construct() { 
        parent::__construct(
            'Custom_Widget',
            __( 'Plugin Custom widget', 'tutsplustextdomain' ),
            array(
                'classname'   => 'Custom_Widget',
                'description' => __( 'This widget is for custom post type Faculty.', 'tutsplustextdomain' )
                )
        );       
    }
 
    /*
     * Front-end display of widget.
    */
    public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] ); ?>
                <section class="widget widget_recent_entries">
               		<h3 class="widget-title"> <?php echo esc_attr( $title ); ?></h3>
                	<?php
                    $args = array( 'post_type' => 'Person',
                                    'posts_per_page' => 3
                                );
                    $recent_posts = wp_get_recent_posts( $args );?>
                    <section class="widget_list">
                    	<?php
                    	foreach( $recent_posts as $recent ){
                        	echo '<label> <a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </label> <hr/>';
                    	}?>
                    </section>
                </section>
                <?php
            wp_reset_query();
    }

	/*
	* Back-end widget form.
	*/
	public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'My title', 'wpb_widget_domain' );
        }
    	/*
	      * Form.
	      *
	    */ ?>
        <p>
            <label> <?php _e( 'Title:' ); ?> </label> 
        
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php 
    }
		     
	/*
	* Updating widget replacing old instances with new
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
	}
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'Custom_Widget' );
});