<?php
add_filter('rwmb_meta_boxes', 'pop_register_meta_boxes');

function pop_register_meta_boxes($meta_boxes) {
    $prefix = 'rw_';

    // Section options.
    $meta_boxes[] = array(
        'id' => 'section',
        'title' => 'Section options',
        'post_types' => array('page'),
        'context' => 'normal',
        'priority' => 'high',

        'fields' => array(
            array(
                'name' => 'Full screen section',
                'desc' => 'Should this section fill the screen height?',
                'id'    => $prefix . 'full_screen_section',
                'type'  => 'checkbox'
            )
        )
    );

    // Section background options.
    $meta_boxes[] = array(
        'id' => 'background',
        'title' => 'Section background',
        'post_types' => array('page'),
        'context' => 'normal',
        'priority' => 'high',

        'fields' => array(
            array(
                'name'  => 'Background image',
                'desc'  => 'The image to fill the section\'s background. Add multiple images and they will be cycled through.',
                'id'    => $prefix . 'background_image',
                'type'  => 'image'
            ),
            array(
                'name'  => 'Background color',
                'desc'  => 'Color to cover the section background.',
                'id'    => $prefix . 'background_color',
                'type'  => 'color'
            ),
            array(
                'name'  => 'Foreground color',
                'desc'  => 'Default text colour for the section.',
                'id'    => $prefix . 'foreground_color',
                'type'  => 'color'
            )
        )
    );

    return $meta_boxes;
}
