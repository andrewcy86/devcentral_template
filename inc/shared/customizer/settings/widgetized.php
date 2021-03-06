<?php



function benjamin_widgetized_settings($wp_customize) {


    $wp_customize->add_setting( 'widgetized_sortables_setting', array(
        'default'        => '[{"name":"page-content","label":"Page Content"}]',
        'sanitize_callback' => 'benjamin_widgetized_sortable_sanitize',
    ) );

    $description = __('The page content is sortable, and optional.  Simply drag the
    available components from the "available" box over to active.  This setting
    does not depend on the "Settings Active" setting above.', 'benjamin');

    $wp_customize->add_control( new Benjamin_Sortable_Control( $wp_customize,
       'widgetized_sortables_control', array(
           'label'   => __('Sortable Page Content', 'benjamin'),
           'description' => $description,
           'section' => 'widgetized_settings_section',
           'settings'=> 'widgetized_sortables_setting',
           'optional' => true,
           'choices' => array(
                   'widget-area-1' => 'Widget Area 1',
                   'widget-area-2' => 'Widget Area 2',
                   'widget-area-3' => 'Widget Area 3',
                   'page-content' => 'Page Content'
               )
           )
       )
   );

}
add_action('customize_register', 'benjamin_widgetized_settings');
