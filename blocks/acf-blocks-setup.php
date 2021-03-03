<?php 

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a accordion block.
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Accordion'),
            'description'       => __('Add custom Accordion'),
            'render_template'   => 'blocks/acf-accordion.php',
            'category'          => 'formatting',
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    // 'data' => array(
                    //   'testimonial'   => "Your testimonial text here",
                    //   'author'        => "John Smith"
                    // )
                )
            )
        ));
    }
}