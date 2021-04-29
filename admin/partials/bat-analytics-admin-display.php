<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       coder-bat.com
 * @since      1.0.0
 *
 * @package    Bat_Analytics
 * @subpackage Bat_Analytics/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
$options = get_option('bat-analytics');
foreach ($options as $dates => $values) {
    echo '<br/><br/>' . $dates . '<br/>';
    foreach ($values as $action => $count) {
        echo $action . ': ' . $count . '<br/>';
    }
}
