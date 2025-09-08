<?php
namespace Elementor;

defined( 'ABSPATH' ) || die();

class Istiqbal_Icons_Manager {

    public static function init() {
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_istiqbal_icons_tab' ] );
    }

    public static function add_istiqbal_icons_tab( $tabs ) {
        $tabs['istiqbal-icons'] = [
            'name' => 'istiqbal-icons',
            'label' => __( 'Istiqbal Icons', 'istiqbal-elementor-addons' ),
            'url' => ISTIQBAL_PLUGIN_URL . 'elementor/assets/css/flaticon.css',
            'enqueue' => [ ISTIQBAL_PLUGIN_URL . 'elementor/assets/css/flaticon.css' ],
            'prefix' => 'flaticon-',
            'displayPrefix' => 'fi',
            'labelIcon' => 'flaticon-charity',
            'ver' => '1.0.0',
            'fetchJson' => ISTIQBAL_PLUGIN_URL . 'elementor/assets/js/istiqbal-icons.js?v=1.0.0',
            'native' => false,
        ];
        return $tabs;
    }

    /**
     * Get a list of istiqbal icons
     *
     * @return array
     */
    public static function get_istiqbal_icons() {
        return [
            'flaticon-volunteer' => 'volunteer',
            'flaticon-solidarity'  => 'solidarity',
            'flaticon-charity' => 'charity',
            'flaticon-briefcase' => 'briefcase',
            'flaticon-calendar' => 'calendar',
            'flaticon-calling' => 'calling',
            'flaticon-car' => 'car',
            'flaticon-checked' => 'checked',
            'flaticon-click' => 'click',
            'flaticon-clock' => 'clock',
            'flaticon-coffee-cup' => 'coffee-cup',
            'flaticon-comment-white-oval-bubble' => 'comment-white-oval-bubble',
            'flaticon-cruise' => 'cruise',
            'flaticon-customer-service' => 'customer-service',
            'flaticon-delivery-truck-1' => 'delivery-truck-1',
            'flaticon-delivery-truck' => 'delivery-truck',
            'flaticon-diamond' => 'diamond',
            'flaticon-email-1' => 'email-1',
            'flaticon-email-2' => 'email-2',
            'flaticon-email-3' => 'email-3',
            'flaticon-email' => 'email',
            'flaticon-eyedropper' => 'eyedropper',
            'flaticon-facebook-app-symbol' => 'facebook-app-symbol',
            'flaticon-gift-box' => 'gift-box',
            'flaticon-house' => 'flaticon-house',
            'flaticon-image' => 'image',
            'flaticon-instagram-1' => 'instagram-1',
            'flaticon-instagram' => 'instagram',
            'flaticon-install' => 'install',
            'flaticon-left-quote' => 'left-quote',
            'flaticon-lighting' => 'lighting',
            'flaticon-linkedin' => 'linkedin',
            'flaticon-location-1' => 'location-1',
            'flaticon-location' => 'location',
            'flaticon-mail' => 'mail',
            'flaticon-maps-and-flags' => 'maps-and-flags',
            'flaticon-phone-call-1' => 'phone-call-1',
            'flaticon-phone-call' => 'phone-call',
            'flaticon-pinterest' => 'pinterest',
            'flaticon-placeholder' => 'placeholder',
            'flaticon-play-1' => 'play-1',
            'flaticon-play-button-1' => 'play-button-1',
            'flaticon-play-button' => 'play-button',
            'flaticon-play' => 'play',
            'flaticon-protection' => 'protection',
            'flaticon-quotation' => 'quotation',
            'flaticon-shopping-bag' => 'shopping-bag',
            'flaticon-shopping-cart-1' => 'shopping-cart-1',
            'flaticon-shopping-cart' => 'shopping-cart',
            'flaticon-smile' => 'smile',
            'flaticon-telephone-1' => 'telephone-1',
            'flaticon-telephone' => 'telephone',
            'flaticon-twitter' => 'twitter',
            'flaticon-user' => 'user',
            'flaticon-video' => 'video',
            'flaticon-web-design' => 'web-design',
            'flaticon-youtube' => 'youtube',
        ];
    }
}

Istiqbal_Icons_Manager::init();