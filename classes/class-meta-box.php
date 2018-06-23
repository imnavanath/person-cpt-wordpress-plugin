<?php 

class meta_box {

    public function __construct() {
        add_action( 'admin_init', array ( $this,'nb_insert_meta_box' ) );
        add_action( 'save_post', array ($this, 'nb_save_meta_box' ) );
    }

    function nb_insert_meta_box()
    {
    add_meta_box( '', 'Staff Information', array ( $this,'nb_show_meta_box' ), 'staff');
    }

    function nb_show_meta_box()
    {
    // content to display fields 
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID ); ?>
    <div class="meta_box_style">
    <p>
        <label style="width: 50% !important; padding: 10px;">Designation:-</label>
        <input type="text" style="width: 50%; padding: 10px; margin-left: 75px;" name="designation" value="<?php echo get_post_meta( get_the_ID(), 'Designation', true); ?>" />
    </p> 

    <p>
        <label style="width: 50% !important; padding: 10px;">Phone:-</label>
        <input type="text" style="width: 50%; padding: 10px; margin-left: 108px;" name="phone" value="<?php echo get_post_meta( get_the_ID(), 'Phone', true); ?>" />
    </p>

    <p>
        <label style="width: 50% !important; padding: 10px;">Facebook URL:-</label>
        <input type="text" style="width: 50%; padding: 10px; margin-left: 63px;" name="fb_input" value="<?php echo get_post_meta( get_the_ID(), 'Facebook', true); ?>"/>
    </p>

    <p>
        <label style="width: 50% !important; padding: 10px;">Twitter URl:-</label>
        <input type="text" style="width: 50%; padding: 10px; margin-left: 82px;" name="twi_input" value="<?php echo get_post_meta( get_the_ID(), 'Twitter', true); ?>"/>
    </p>

    <p>
        <label style="width: 50% !important; padding: 10px;">Instagram URL:-</label>
        <input type="text" style="width: 50%; padding: 10px; margin-left: 62px;" name="insta_input" value="<?php echo get_post_meta( get_the_ID(), 'Instagram', true); ?>"/>
    </p>
    </div>

    <?php    
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );   
    }

    function nb_save_meta_box( $post_id )
    {  
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
         'a' => array( // on allow a tags
         'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( ! empty($_POST['designation']))
        update_post_meta( $post_id, 'Designation', $_POST['designation']);

    if( ! empty($_POST['phone']))
        update_post_meta( $post_id, 'Phone', $_POST['phone']);

    if( ! empty($_POST['fb_input']))
        update_post_meta( $post_id, 'Facebook', $_POST['fb_input']);

    if( ! empty($_POST['twi_input']))
        update_post_meta( $post_id, 'Twitter', $_POST['twi_input']);

    if( ! empty($_POST['insta_input']))
        update_post_meta( $post_id, 'Instagram', $_POST['insta_input']);
    }
}

$obj_meta_box = new meta_box();