<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Shortcode_Map extends FW_Shortcode {

	private $data = array();

	private function load_data()
	{
		if (empty($this->data)) {
			$this->data = apply_filters('fw_shortcode_map_provider', array(
				'custom' => array(
					'callback'   => array($this, '_callback_get_custom_locations'),
					'label'      => esc_html__('Custom', 'leven'),
					'options'    => array(
						'locations' => array(
							'label' => esc_html__('Locations', 'leven'),
							'popup-title' => esc_html__('Add/Edit Location', 'leven'),
							'type' => 'addable-popup',
							'desc' => false,
							'template' => '{{  if (location.location !== "") {  print(location.location)} else { print("' . esc_html__('Note: Please set location', 'leven') . '")} }}',
							'popup-options' => array(
								'location' => array(
									'type' => 'map',
									'label' =>esc_html__('Location', 'leven'),
								),
								'title' => array(
									'type' => 'text',
									'label' => esc_html__('Location Title', 'leven'),
									'desc' => esc_html__('Set location title', 'leven'),
								),
								'description' => array(
									'type'  => 'textarea',
									'label' => esc_html__('Location Description', 'leven'),
									'desc'  => esc_html__('Set location description', 'leven')
								),
								'url' => array(
									'type'  => 'text',
									'label' => esc_html__('Location Url', 'leven'),
									'desc'  => esc_html__('Set page url (Ex: http://example.com)', 'leven'),
								),
								'thumb' => array(
									'label'       => esc_html__('Location Image', 'leven'),
									'desc'        => esc_html__('Add location image', 'leven'),
									'type'        => 'upload',
								)
							)
						)
					)
				)
			));
		}
	}

	public function _callback_get_custom_locations($atts) {
		$rows = fw_akg('data_provider/custom/locations', $atts, array());

		$result = array();
		if (!empty($rows)) {
			foreach($rows as $key => $row) {
				$result[$key]['title']       = fw_akg('title', $row);
				$result[$key]['url']         = fw_akg('url', $row);
				$result[$key]['thumb']       = fw_resize(wp_get_attachment_url(fw_akg('thumb/attachment_id', $row)), 100, 60, true);
				$result[$key]['coordinates'] = fw_akg('location/coordinates', $row);
				$result[$key]['description'] = fw_akg('description', $row);
			}
		}

		return $result;
	}

	/**
	 * Get the list of providers
	 * @internal
	 */
	public function _get_picker_dropdown_choices() {
		$this->load_data();
		$result = array();
		foreach($this->data as $unique_key => $item ) {
			$result[$unique_key] = $item['label'];
		}
		return $result;
	}

	/**
	 * Get the providers' options
	 * @internal
	 */
	public function _get_picker_choices() {
		$this->load_data();
		$result = array();
		foreach($this->data as $unique_key => $item ) {
			$result[$unique_key] = (isset($item['options']) && is_array($item['options'])) ? $item['options'] : array();
		}

		return $result;
	}

	protected function _render($atts, $content = null, $tag = '')
	{
		if (!isset($atts['data_provider']['population_method'])) {
			trigger_error(
				__('No location provider specified for map shortcode', 'leven')
			);
			return '<b>' . esc_html__( 'Map Placeholder', 'leven' ) . '</b>';
		}

		$this->load_data();
		$provider = $atts['data_provider']['population_method'];
		if (!isset($this->data[$provider])) {
			return '<!-- WARNING: '
			       . sprintf(__('Unknown location provider "%s" specified for map shortcode', 'leven'), $provider)
			       . ' -->';
		}

		$locations = call_user_func( $this->data[$provider]['callback'], $atts );
		if ( !empty($locations) && is_array($locations) ) {
			foreach( $locations as $key => $location ) {
				if (
					!isset($location['coordinates'])        ||
					!is_array($location['coordinates'])     ||
					!isset($location['coordinates']['lat']) ||
					!isset($location['coordinates']['lng']) ||
					empty($location['coordinates']['lat'])  ||
					empty($location['coordinates']['lng'])
				) {
					//remove locations which has wrong coordinates/empty
					unset($locations[$key]);
				}
			}
		}

		$map_data_attr = array(
			'data-locations'  => json_encode(array_values($locations)),
			'data-map-type'   => strtoupper( fw_akg('map_type', $atts, 'roadmap') ),
			'data-map-height' => fw_akg('map_height', $atts, false),
		);

		unset($atts['data_provider']);
		unset($atts['map_type']);
		unset($atts['map_height']);

		foreach ( $atts as $key => $att ) {
			$new_key = 'data-' . str_replace( '_', '-', $key );
			if ( is_array( $att ) || is_object( $att ) ) {
				$att = json_encode($att);
			}

			$map_data_attr[$new_key] = $att;
		}


		$this->enqueue_static();
		return fw_render_view( $this->locate_path('/views/view.php'), compact('atts', 'content', 'tag', 'map_data_attr') );
	}

	public function render_custom($data, $extra = array()) {
		$atts = array(
			'map_height'    => fw_akg('map_height', $extra, false),
			'map_type'      => fw_akg('map_type', $extra, 'roadmap'),
			'data_provider' => array(
				'population_method' => 'custom',
				'custom' => array(
					'locations' => $data
				)
			)
		);
		return $this->_render($atts);
	}
}