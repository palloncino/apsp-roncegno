<?php

class SiteOrigin_Widgets_Bundle_Beaver_Builder {
	/**
	 * Get the singleton instance
	 *
	 * @return SiteOrigin_Widgets_Bundle_Beaver_Builder
	 */
	public static function single() {
		static $single;

		return empty( $single ) ? $single = new self() : $single;
	}

	public function __construct() {
		add_action( 'wp', array( $this, 'init' ), 9 );
	}

	public function init() {
		if ( ! FLBuilderModel::is_builder_active() ) {
			return;
		}

		if ( isset( $_GET['fl_builder_ui'] ) ) {
			add_action( 'fl_builder_ui_enqueue_scripts', array( $this, 'enqueue_active_widgets_scripts' ) );
		} else {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_active_widgets_scripts' ) );
		}
		add_action( 'wp_print_footer_scripts', array( $this, 'print_footer_templates' ) );

		// Don't want to show the form preview button when using Beaver Builder
		add_filter( 'siteorigin_widgets_form_show_preview_button', '__return_false' );
	}

	public function enqueue_active_widgets_scripts() {
		global $wp_widget_factory;

		// Beaver Builder does it's editing in the front end so enqueue required form scripts for active widgets.
		$so_widgets_bundle = SiteOrigin_Widgets_Bundle::single();
		$so_widgets_bundle->register_general_scripts();
		$so_widgets_bundle->enqueue_registered_widgets_scripts( true, true );

		$any_widgets_active = false;

		foreach ( $wp_widget_factory->widgets as $class => $widget_obj ) {
			if ( ! empty( $widget_obj ) && is_object( $widget_obj ) && is_subclass_of( $widget_obj, 'SiteOrigin_Widget' ) ) {
				$any_widgets_active = true;
				break;
			}
		}

		// No widgets active. :/ Let's get outta here.
		if ( ! $any_widgets_active ) {
			return;
		}

		wp_enqueue_style(
			'sowb-styles-for-beaver',
			plugin_dir_url( __FILE__ ) . 'styles.css'
		);

		wp_enqueue_script(
			'sowb-js-for-beaver',
			plugin_dir_url( __FILE__ ) . 'sowb-beaver-builder' . SOW_BUNDLE_JS_SUFFIX . '.js',
			array( 'jquery', 'siteorigin-widget-admin' )
		);

		wp_enqueue_style(
			'siteorigin-widget-admin',
			plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'base/css/admin.css',
			array( 'media-views' ),
			SOW_BUNDLE_VERSION
		);
	}

	public function print_footer_templates() {
		global $wp_widget_factory;

		// Beaver Builder does it's editing in the front end so print required footer templates for active widgets.
		foreach ( $wp_widget_factory->widgets as $class => $widget_obj ) {
			if ( ! empty( $widget_obj ) && is_object( $widget_obj ) && is_subclass_of( $widget_obj, 'SiteOrigin_Widget' ) ) {
				$widget_obj->footer_admin_templates();
			}
		}
	}
}

SiteOrigin_Widgets_Bundle_Beaver_Builder::single();
