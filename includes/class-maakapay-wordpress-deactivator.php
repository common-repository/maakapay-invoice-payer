<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://maakapay.com/employee/ashwin
 * @since      1.0.0
 *
 * @package    Maakapay_Wordpress
 * @subpackage Maakapay_Wordpress/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Maakapay_Wordpress
 * @subpackage Maakapay_Wordpress/includes
 * @author     Babin (Ashwin) Rana <ashwin@maakapay.com>
 */
class Maakapay_Wordpress_Deactivator {

    /**
     * Delete the created pages in the plugin activation.
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate() {
        global $wpdb;

        $payment_form_page = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT ID FROM {$wpdb->prefix}posts WHERE post_name =%s",
                'maakapay-form'
            )
        );

        $payment_page_id = $payment_form_page->ID;
        if($payment_page_id > 0) {
            wp_delete_post($payment_page_id, true);
        }

        $payment_success_page = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT ID FROM {$wpdb->prefix}posts WHERE post_name =%s",
                'maakapay-success'
            )
        );

        $success_page_id = $payment_success_page->ID;
        if($success_page_id > 0) {
            wp_delete_post($success_page_id, true);
        }

        $payment_cancel_page = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT ID FROM {$wpdb->prefix}posts WHERE post_name =%s",
                'maakapay-cancel'
            )
        );

        $cancel_page_id = $payment_cancel_page->ID;
        if($cancel_page_id > 0) {
            wp_delete_post($cancel_page_id, true);
        }

        $payment_decline_page = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT ID FROM {$wpdb->prefix}posts WHERE post_name =%s",
                'maakapay-decline'
            )
        );

        $decline_page_id = $payment_decline_page->ID;
        if($decline_page_id > 0) {
            wp_delete_post($decline_page_id, true);
        }
    }

}
