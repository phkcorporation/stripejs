<?php

/* 
 * Template Name: Transaction View Template
 */

if (!current_user_can('administrator')) {
    wp_die(__('You are not authorized for this operation', 'stripejs'));
    exit;
} else {
    get_header();
    
    global $post;
    
    $transaction = json_decode($post->post_content);

    ?>
    <h2><?php _e('Transaction for user', 'stripejs'); ?>: <b><?php echo $post->post_title; ?></b></h2>
    <table>
        <tr>
            <th><?php _e('Amount', 'stripejs'); ?></th>
            <td><b>$<?php echo number_format($transaction->amount/100,2); ?></b></td>
        </tr>
        <tr>
            <th><?php _e('Transaction Date', 'stripejs'); ?></th>
            <td><b><?php echo $post->post_date; ?></b></td>
        </tr>
        <tr>
            <th valign="top"><?php _e('Response', 'stripejs'); ?></th>
            <td><pre><?php print_r($transaction); ?></pre></td>
        </tr>
    </table>
    <?php
    get_footer();
}

?>