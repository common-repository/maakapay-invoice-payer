<?php

/**
 * Provide a public invoice payment form area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://maakapay.com/employee/ashwin
 * @since      1.0.0
 *
 * @package    Maakapay_Wordpress
 * @subpackage Maakapay_Wordpress/public/partials
 */

get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="maakapay-website-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
                <h2 class="text">Pay Invoice</h2>
            </div>
        </div>

        <form class="maakapay-payment-form" action="javascript:void(0)" id="maakapay-payment-form">

            <h3>Invoice Details</h3>
            <br>
            <div class="row">
                <div class="maakapay-form-group form-group col-md-6">
                    <label class="maakapay-form-label" for="maakapayFirstName">First Name <span
                                class="imp">*</span></label>
                    <input type="text" name="first_name" class="maakapay-form-control form-control" required>
                </div>

                <div class="maakapay-form-group form-group col-md-6">
                    <label class="maakapay-form-label" for="maakapayLastName">Last Name <span
                                class="imp">*</span></label>
                    <input type="text" name="last_name" class="maakapay-form-control form-control" required>
                </div>

            </div>

            <div class="row">

                <div class="maakapay-form-group form-group col-md-6">
                    <label class="maakapay-form-label" for="email">Email <span class="imp">*</span></label>
                    <input type="email" name="email" class="maakapay-form-control form-control" id="maakapayEmail"
                           value="" placeholder="john.doe@gmail.com" required="">
                </div>

                <div class="maakapay-form-group form-group col-md-6">
                    <label class="maakapay-form-label">Phone Number <span class="imp">*</span></label>
                    <br/>
                    <input type="text" name="phone" class="maakapay-form-control form-control" id="phone" value=""
                           placeholder="Phone" required>
                </div>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="maakapay-form-group form-group">
                        <label class="maakapay-form-label" for="invoice_number">Invoice Number <span
                                    class="imp">*</span></label>
                        <input type="number" name="invoice_number" class="maakapay-form-control form-control" required>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="maakapay-form-group form-group">
                        <label class="maakapay-form-label" for="currency_code">Currency Code <span class="imp">*</span></label>
                        <select name="currency_code" id="currency_code" class="maakapay-form-control form-control">
                            <?php
                            $code = get_option('maakapay_accepting_currencies');
                            $codes = explode(",", $code);
                            foreach ($codes as $key => $code) :
                                ?>
                                <option value="<?php echo esc_attr( $code ); ?>" <?php if ($key == 0) {
                                    echo "selected";
                                } ?>><?php echo esc_attr( $code ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="maakapay-form-group form-group">
                        <label class="maakapay-form-label" for="amount">Amount</label>
                        <input type="number" name="amount" class="maakapay-form-control form-control " placeholder="100"
                               required min="0.01" step="0.01">
                    </div>
                </div>
            </div>

            <div class="maakapay-form-group form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-check-inline">
                            <div id="transaction-error"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="maakapay-form-group form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check-inline">
                            <?php if (get_option('maakapay_mode') == "test") : ?>
                                <span class="info">This is form is currently in test mode.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-right">
                    <button type="submit" class="btn btn-success form-control pay-now" style="
                position: initial; margin-bottom:10px;">PAY NOW
                    </button>
                </div>
            </div>
    </div>

    </form>
    </div>

<?php
get_footer();