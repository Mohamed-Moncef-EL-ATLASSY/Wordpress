<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'title' => array(
		'label'   => esc_html__('Title', 'leven-shortcodes'),
		'desc'    => esc_html__('Write some text.', 'leven-shortcodes'),
		'type'    => 'text',
	),
    'membership' => array(
        'label'   => esc_html__('Membership ID', 'leven-shortcodes'),
        'desc'    => esc_html__('Write the ID number of the certificate.', 'leven-shortcodes'),
        'type'    => 'text',
    ),
    'date'    => array(
        'label' => esc_html__( 'Short Description', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Date of receipt of the certificate.', 'leven-shortcodes' ),
        'type'  => 'text',
        'value' => '',
    ),
    'logo'  => array(
        'label' => esc_html__( 'Logo', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Upload a logo image. Logo of the company issuing the certificate.', 'leven-shortcodes' ),
        'type'  => 'upload'
    ),
    'image'  => array(
        'label' => esc_html__( 'Image', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Optional field. Upload a certificate image. The image of the certificate that will be displayed after clicking on the block with the description of the certificate.', 'leven-shortcodes' ),
        'type'  => 'upload'
    ),
);