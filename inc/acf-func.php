<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'about_group',
        'title' => 'About',
        'fields' => array(
            array(
                'key' => 'about_col__left',
                'label' => 'About Col Left',
                'name' => 'about_col__left',
                'type' => 'textarea',
            ),
            array(
                'key' => 'about_col__right',
                'label' => 'About Col Right',
                'name' => 'about_col__right',
                'type' => 'textarea',
            ),
            array(
                'key' => 'about_slides',
                'label' => 'About Slides',
                'name' => 'about_slides',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'about_slide_image',
                        'label' => 'Slide Image',
                        'name' => 'about_slide_image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'about_team_title',
                'label' => 'About Team Title',
                'name' => 'about_team_title',
                'type' => 'text',
            ),
            array(
                'key' => 'about_team_description',
                'label' => 'About Team Description',
                'name' => 'about_team_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'about_team_items',
                'label' => 'About Team Items',
                'name' => 'about_team_items',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'about_team_item_image',
                        'label' => 'Team Item Image',
                        'name' => 'about_team_item_image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'about_team_item_name',
                        'label' => 'Team Item Name',
                        'name' => 'about_team_item_name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'about_team_item_position',
                        'label' => 'Team Item Position',
                        'name' => 'about_team_item_position',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'custom-template/about-template.php',
                ),
            ),
        ),
    ));

endif;
