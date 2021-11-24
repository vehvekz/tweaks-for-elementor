<?php
/**
 * Class options
 *
 * @package tweaks-for-elementor
 */

namespace WPBRO\Tweaks_For_Elementor;

use Elementor\Settings;

/**
 * Class Options
 *
 * @package WPBRO\Tweaks_For_Elementor
 */
class Options {

	/**
	 * Options constructor.
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Add action for tweak settings.
	 */
	public function hooks() {
		add_action( 'elementor/admin/after_create_settings/elementor', array( $this, 'register_settings' ) );
	}

	/**
	 * Create Setting Tab
	 *
	 * @param Settings $settings Elementor "Settings" page in WordPress Dashboard.
	 *
	 * @since 1.3
	 *
	 * @access public
	 */
	public function register_settings( Settings $settings ) {
		$settings->add_tab(
			WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG,
			array(
				'label'    => __( 'Tweaks for Elementor', 'tweaks-for-elementor' ),
				'sections' => array(
					WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_optimization' => array(
						'label'  => __( 'Optimization tweaks', 'tweaks-for-elementor' ),
						'fields' => array(
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_google_fonts'    => array(
								'label'      => __( 'Deregister google fonts', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Filters whether to enqueue Google fonts in the frontend', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_hello_theme'     => array(
								'label'      => __( 'Deregister themes styles', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister Hello Elementor theme styles', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_wp_block'        => array(
								'label'      => __( 'Deregister WP Block styles', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister block library and library theme theme styles', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_elementor_icons' => array(
								'label'      => __( 'Deregister Elementor Icons', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister icons font on frontend side only', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_fa_icons'        => array(
								'label'      => __( 'Deregister Font Awesome', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister font awesome icons on frontend side only', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_dashicons'       => array(
								'label'      => __( 'Deregister Dashicons css', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Force deregister dashicons.css on frontend side', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_admin_notices'   => array(
								'label'      => __( 'Remove Admin Header Notices', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'remove_all_actions action', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_editor_lang'     => array(
								'label'      => __( 'Unload translations of elementor editor', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Used unload_textdomain() for implementation', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_antispam_field'  => array(
								'label'      => __( 'Set form field name for spam checker', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'example: field=check message, form label=check message, form id=check_message', 'tweaks-for-elementor' ),
									'type' => 'text',
								),
							),
						),
					),
				),
			)
		);
		$key_intl = WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_intl';
		$settings->add_tab(
			$key_intl,
			array(
				'label'    => __( 'Intl Tel for Elementor', 'tweaks-for-elementor' ),
				'sections' => array(
					$key_intl . '_intl_settings' => array(
						'label'  => __( 'Intl Settings', 'tweaks-for-elementor' ),
						'fields' => array(
							$key_intl . '_ip_info_api_key'           => array(
								'label'      => __( 'Ipinfo API key', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Key for <a href="https://ipinfo.io/" target="_blank" rel="nofollow">Ipinfo API</a>', 'tweaks-for-elementor' ),
									'type' => 'text',
								),
							),
							$key_intl . '_custom_country_id'         => array(
								'label'      => __( 'Custom country ID <br><small>(will override IP detected)</small>', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Country Lang Code, e.g. US. More info <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2#Officially_assigned_code_elements" target="_blank" rel="nofollow">here</a>', 'tweaks-for-elementor' ),
									'type' => 'text',
								),
							),
							$key_intl . '_custom_country_field_name' => array(
								'label'      => __( 'Custom country field name <br><small>(optional)</small>', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Add the name of the Elementor form field into which the two-letter country lang code will be inserted', 'tweaks-for-elementor' ),
									'type' => 'text',
								),
							),
						),
					),
				),
			)
		);
	}
}

// eol.
