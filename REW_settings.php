<?php
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

//Set up menu under Settings
add_action('admin_menu', 'repeater_content_widget_setup_menu');
//Register options of this plugin
add_action( 'admin_init', 'register_repeater_content_widget_settings' );
/**
 * Set up submenu under Settings main menu at admin side
 */
function repeater_content_widget_setup_menu(){
        add_submenu_page( 'options-general.php', 'Repeater Entries Widget', 'Repeater Entries Widget', 'manage_options', 'repeater-entries-widget-settings', 'repeater_content_widget_init'); 
}
/**
 * Initialize the plugin and display all options at admin side
 */
function repeater_content_widget_init(){ 
    ?>
  <h1>Repeater Entries Widget</h1>  
  <form method="post" action="options.php">
    <?php settings_fields( 'repeater-entries-widget-settings' ); ?>
    <?php do_settings_sections( 'repeater-entries-widget-settings' ); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Maximum entries allowed:</th>
            <td><select name="rew_max">
                <?php $maxvalues = array('5','10','15','20','25','30'); 
                foreach($maxvalues as $value){
                    echo '<option value="'.$value.'"'.selected( $value, get_option( 'rew_max' ) ).'>'.$value.'</option>';
                }?>
                </select>
            </td>            
        </tr>
        <tr valign="top">
            <th scope="row">Add Image Field:</th>
            <td><input type="checkbox" name="rew_image" value="1" <?php echo (get_option( 'rew_image' ) == 1) ? 'checked' : ''; ?>/></td>      
        </tr>
        <tr valign="top">
            <th scope="row">Add Link on Image Field:</th>
            <td><input type="checkbox" name="rew_image_link" value="1" <?php echo (get_option( 'rew_image_link' ) == 1) ? 'checked' : ''; ?>/></td>      
        </tr>
        <tr valign="top">
            <th scope="row">Add Caption Field:</th>
            <td><input type="checkbox" name="rew_caption" value="1" <?php echo (get_option( 'rew_caption' ) == 1) ? 'checked' : ''; ?>/></td>      
        </tr> 
       <tr valign="top">
            <th scope="row">Add Link on Caption Field:</th>
            <td><input type="checkbox" name="rew_caption_link" value="1" <?php echo (get_option( 'rew_caption_link' ) == 1) ? 'checked' : ''; ?>/></td>      
       </tr>  
        <tr valign="top">
            <th scope="row">Description:</th>
            <td>
                <select name = "rew_description">                    
                    <option value="short" <?php echo (get_option( 'rew_description' ) == 'short') ? 'selected': '';?>>Short description with external link</option>
                    <option value="full" <?php echo (get_option( 'rew_description' ) == 'full') ? 'selected': '';?>>Full description with Read More button</option>
                </select>                
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Target Window:</th>
            <td>
                <select name = "rew_link_target">                    
                    <option value="_blank" <?php echo (get_option( 'rew_link_target' ) == '_blank') ? 'selected': '';?>>New Tab</option>
                    <option value="_window" <?php echo (get_option( 'rew_link_target' ) == '_window') ? 'selected': '';?>>New Window</option>                    
                    <option value="_parent" <?php echo (get_option( 'rew_link_target' ) == '_parent') ? 'selected': '';?>>Parent Window</option>
                </select>                
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Content Alignment:</th>
            <td>
                <select name = "content_align">                    
                    <option value="left" <?php echo (get_option( 'content_align' ) == 'left') ? 'selected': '';?>>Left</option>
                    <option value="center" <?php echo (get_option( 'content_align' ) == 'center') ? 'selected': '';?>>Center</option>
                    <option value="right" <?php echo (get_option( 'content_align' ) == 'right') ? 'selected': '';?>>Right</option>
                </select>                
            </td>
        </tr>
    </table>
    <?php submit_button(); ?>
    </div>
  </form>

<?php
}

/**
 * Registers all the setting options
 */
function register_repeater_content_widget_settings() {
        register_setting( 'repeater-entries-widget-settings', 'rew_max' );
        register_setting( 'repeater-entries-widget-settings', 'rew_image' );
        register_setting( 'repeater-entries-widget-settings', 'rew_image_link' );
        register_setting( 'repeater-entries-widget-settings', 'rew_caption' );
        register_setting( 'repeater-entries-widget-settings', 'rew_caption_link' );
        register_setting( 'repeater-entries-widget-settings', 'rew_description' );
        register_setting( 'repeater-entries-widget-settings', 'rew_link_target' );
        register_setting( 'repeater-entries-widget-settings', 'content_align' );
 } 

