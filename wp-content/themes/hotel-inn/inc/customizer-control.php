<?php
/**
 * Created by PhpStorm.
 * User: ramnepal
 * Date: 1/14/19
 * Time: 4:56 PM
 */

if( ! class_exists('WP_Customize_Control') ){
    return NULL;
}

class hotel_inn_room_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('category');
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <p class="customize-control-description"><?php esc_html_e('Only 5 Posts will be shown from the choosen category in Free Version)','hotel-inn') ?></p>
                <select <?php $this->link(); ?>>
                    <option value="none"><?php esc_html_e("None", "hotel-inn") ?></option>
                    <?php
                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>

        </label>

        <?php
    }
}

class hotel_inn_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('category');
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <p class="customize-control-description"><?php esc_html_e('Only 3 Posts will be shown from the choosen category in Free Version)','hotel-inn') ?></p>
                <select <?php $this->link(); ?>>
                    <option value="none"><?php esc_html_e("None", "hotel-inn") ?></option>
                    <?php
                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>

        </label>

        <?php
    }
}

class hotel_inn_explore_Dropdown_Customize_Control extends WP_Customize_Control
{
    public $type = 'select';

    public function render_content()
    {
        $terms = get_terms('category');
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <p class="customize-control-description"><?php esc_html_e('Only 2 Posts will be shown from the choosen category in Free Version)','hotel-inn') ?></p>
                <select <?php $this->link(); ?>>
                    <option value="none"><?php esc_html_e("None", "hotel-inn") ?></option>
                    <?php
                    foreach ($terms as $t)
                        echo '<option value="' . esc_attr($t->slug) . '"' . selected($this->value(), esc_attr($t->name), false) . '>' . esc_attr($t->name) . '</option>';
                    ?>
                </select>

        </label>

        <?php
    }
}




if (!function_exists('hotel_inn_get_categories_select')) :
   function hotel_inn_get_categories_select()
   {
       $hotel_inn_categories = get_categories();
       $results = array();

       if (!empty($hotel_inn_categories)) :
           $results[''] = __('Select Category', 'hotel-inn');
           foreach ($hotel_inn_categories as $result) {
               $results[$result->slug] = $result->name;
           }
       endif;
       return $results;
   }
endif;

function hotel_inn_sanitize_image( $image, $setting ) {
  $type = array(
    'jpg|jpeg|jpe' => 'image/jpeg',
    'gif'          => 'image/gif',
    'png'          => 'image/png',
    'bmp'          => 'image/bmp',
    'tif|tiff'     => 'image/tiff',
    'ico'          => 'image/x-icon',
  );
  $file = wp_check_filetype( $image, $type );
  return ( $file['ext'] ? $image : $setting->default );
}


function hotel_inn_sanitize_url( $url ) {
  return esc_url_raw( $url );
}

function hotel_inn_sanitize_select( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}