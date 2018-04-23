<?php
/*
* MyBB: ModCP Newsbars
*
* File: modcpnewsbars.php
*
* Authors: Vintagedaddyo
*
* MyBB Version: 1.8
*
* Plugin Version: 1.1
*
*/

if (!defined("IN_MYBB"))
{
    die("You cannot access this file directly. Please make sure IN_MYBB is defined.");
}

$plugins->add_hook('modcp_start', 'modcpnewsbars_modcp_start');

function modcpnewsbars_info()
{
    global $lang;

    $lang->load("modcpnewsbars");

    $lang->modcpnewsbars_desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' . '<input type="hidden" name="cmd" value="_s-xclick">' . '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' . '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' . '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' . '</form>' . $lang->modcpnewsbars_desc;
    return Array(
        'name' => $lang->modcpnewsbars_name,
        'description' => $lang->modcpnewsbars_desc,
        'website' => $lang->modcpnewsbars_web,
        'author' => $lang->modcpnewsbars_auth,
        'authorsite' => $lang->modcpnewsbars_authsite,
        'version' => $lang->modcpnewsbars_ver,
        'compatibility' => $lang->modcpnewsbars_compat
    );
}

function modcpnewsbars_activate()
{
    global $settings, $mybb, $db, $lang;

    $lang->load("modcpnewsbars");

    $modcpnewsbars_group = array(
        'gid' => '0',
        'name' => 'modcpnewsbars',
        'title' => $lang->modcpnewsbars_title_setting_group,
        'description' => $lang->modcpnewsbars_description_setting_group,
        'disporder' => "1",
        'isdefault' => "0"
    );

    $db->insert_query('settinggroups', $modcpnewsbars_group);

    $gid = $db->insert_id();

    $modcpnewsbars_setting_1 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_enable_modcp',
        'title' => $lang->modcpnewsbars_title_setting_1,
        'description' => $lang->modcpnewsbars_description_setting_1,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '1',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_2 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_input_1',
        'title' => $lang->modcpnewsbars_title_setting_2,
        'description' => $lang->modcpnewsbars_description_setting_2,
        'optionscode' => 'textarea',
        'value' => '<strong>Latest MyBB Release:</strong> <a href="http://blog.mybb.com/2018/03/15/mybb-1-8-15-released-security-maintenance-release/">MyBB 1.8.15 Released — Security & Maintenance Release</a> <span class="date">(March 15, 2018)</span>',
        'disporder' => '2',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_3 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_enable_input_1',
        'title' => $lang->modcpnewsbars_title_setting_3,
        'description' => $lang->modcpnewsbars_description_setting_3,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '4',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_4 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_input_2',
        'title' => $lang->modcpnewsbars_title_setting_4,
        'description' => $lang->modcpnewsbars_description_setting_4,
        'optionscode' => 'textarea',
        'value' => '<strong>Latest news from the MyBB Blog:</strong> <a href="http://blog.mybb.com/2018/01/07/mybb-support-policy-changes/">MyBB Support Policy Changes</a> <span class="date">(January 7, 2018)</span>',
        'disporder' => '5',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_5 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_enable_input_2',
        'title' => $lang->modcpnewsbars_title_setting_5,
        'description' => $lang->modcpnewsbars_description_setting_5,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '7',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_6 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_input_3',
        'title' => $lang->modcpnewsbars_title_setting_6,
        'description' => $lang->modcpnewsbars_description_setting_6,
        'optionscode' => 'textarea',
        'value' => '<strong>Are you on the </strong><a href="http://community.mybb.com/member.php?action=register">MyBB Community Forums</a><strong>&nbsp;?</strong> - Sign up for notification of new MyBB releases and updates.',
        'disporder' => '8',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_7 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_enable_input_3',
        'title' => $lang->modcpnewsbars_title_setting_7,
        'description' => $lang->modcpnewsbars_description_setting_7,
        'optionscode' => 'yesno',
        'value' => '1',
        'disporder' => '10',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_8 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_css_input_1',
        'title' => $lang->modcpnewsbars_title_setting_8,
        'description' => $lang->modcpnewsbars_description_setting_8,
        'optionscode' => 'textarea',
        'value' => '.alert {
    background: #FFF6BF;
    border-top: 1px solid #FFD324;
    border-left: 1px solid #FFD324;
    border-right: 1px solid #FFD324;
    border-bottom: 1px solid #FFD324;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
.alert .date {
    color: #666;
    font-size: 0.8em;
    margin-left: 6px;
}
.alert a {
 color: #007fd0;
}
.alert a:visited {
 color: #007fd0;
}
.alert a:hover {
 color: #ff7500;
}',
        'disporder' => '3',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_9 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_css_input_2',
        'title' => $lang->modcpnewsbars_title_setting_9,
        'description' => $lang->modcpnewsbars_description_setting_9,
        'optionscode' => 'textarea',
        'value' => '.notice1 {
    background: #D6ECA6;
    border-top: 1px solid #8DC93E;
    border-left: 1px solid #8DC93E;
    border-right: 1px solid #8DC93E;
    border-bottom: 1px solid #8DC93E;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
.notice1 .date {
    color: #666;
    font-size: 0.8em;
    margin-left: 6px;
}
.notice1 a {
 color: #007fd0;
}
.notice1 a:visited {
 color: #007fd0;
}
.notice1 a:hover {
 color: #ff7500;
}',
        'disporder' => '6',
        'gid' => intval($gid)
    );

    $modcpnewsbars_setting_10 = array(
        'sid' => '0',
        'name' => 'modcpnewsbars_css_input_3',
        'title' => $lang->modcpnewsbars_title_setting_10,
        'description' => $lang->modcpnewsbars_description_setting_10,
        'optionscode' => 'textarea',
        'value' => '.notice2 {
    background: #ADCBE7;
    border-top: 1px solid #0F5C8E;
    border-left: 1px solid #0F5C8E;
    border-right: 1px solid #0F5C8E;
    border-bottom: 1px solid #0F5C8E;
    text-align: center;
    margin: 10px auto;
    padding: 5px 20px;
    border-radius: 6px;
    color: #404040;
}
.notice2 .date {
    color: #666;
    font-size: 0.8em;
    margin-left: 6px;
}
.notice2 a {
 color: #007fd0;
}
.notice2 a:visited {
 color: #007fd0;
}
.notice2 a:hover {
 color: #ff7500;
}',
        'disporder' => '9',
        'gid' => intval($gid)
    );

    $db->insert_query('settings', $modcpnewsbars_setting_1);
    $db->insert_query('settings', $modcpnewsbars_setting_2);
    $db->insert_query('settings', $modcpnewsbars_setting_3);
    $db->insert_query('settings', $modcpnewsbars_setting_4);
    $db->insert_query('settings', $modcpnewsbars_setting_5);
    $db->insert_query('settings', $modcpnewsbars_setting_6);
    $db->insert_query('settings', $modcpnewsbars_setting_7);
    $db->insert_query('settings', $modcpnewsbars_setting_8);
    $db->insert_query('settings', $modcpnewsbars_setting_9);
    $db->insert_query('settings', $modcpnewsbars_setting_10);

    rebuild_settings();

    $insertarray = array(
        "title" => "modcpnewsbars_1",
        "template" => "
        <style>
        {\$mybb->settings[\'modcpnewsbars_css_input_1\']}
        </style>
        <div id=\"alert\"><p class=\"alert\">{\$mybb->settings[\'modcpnewsbars_input_1\']}</p></div>",
        "sid" => - 1,
        "dateline" => TIME_NOW
    );

    $db->insert_query("templates", $insertarray);

    $insertarray = array(
        "title" => "modcpnewsbars_2",
        "template" => "
        <style>
        {\$mybb->settings[\'modcpnewsbars_css_input_2\']}
        </style>
        <div id=\"notice1\"><p class=\"notice1\">{\$mybb->settings[\'modcpnewsbars_input_2\']}</p></div>",
        "sid" => - 1,
        "dateline" => TIME_NOW
    );

    $db->insert_query("templates", $insertarray);

    $insertarray = array(
        "title" => "modcpnewsbars_3",
        "template" => "
        <style>
        {\$mybb->settings[\'modcpnewsbars_css_input_3\']}
        </style>
        <div id=\"notice2\"><p class=\"notice2\">{\$mybb->settings[\'modcpnewsbars_input_3\']}</p></div>",
        "sid" => - 1,
        "dateline" => TIME_NOW
    );

    $db->insert_query("templates", $insertarray);

    include MYBB_ROOT . "/inc/adminfunctions_templates.php";

    // activate on modcp

    find_replace_templatesets("modcp", "#" . preg_quote("{\$header}") . "#i", "{\$header}\r\n
        {\$modcpnewsbars_1}
        {\$modcpnewsbars_2}
        {\$modcpnewsbars_3}");
}

function modcpnewsbars_deactivate()
{
    global $db;

    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_enable_modcp')");

    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_enable_input_1')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_enable_input_2')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_enable_input_3')");

    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_input_1')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_input_2')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_input_3')");

    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_css_input_1')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_css_input_2')");
    $db->query("DELETE FROM " . TABLE_PREFIX . "settings WHERE name IN ('modcpnewsbars_css_input_3')");

    $db->query("DELETE FROM " . TABLE_PREFIX . "settinggroups WHERE name='modcpnewsbars'");

    $db->delete_query("templates", "title = 'modcpnewsbars_1'");
    $db->delete_query("templates", "title = 'modcpnewsbars_2'");
    $db->delete_query("templates", "title = 'modcpnewsbars_3'");

    rebuild_settings();

    include MYBB_ROOT . "/inc/adminfunctions_templates.php";

    // deactivate on modcp

    find_replace_templatesets("modcp", "#" . preg_quote("\r\n
        {\$modcpnewsbars_1}
        {\$modcpnewsbars_2}
        {\$modcpnewsbars_3}") . "#i", "", 0);
}

function modcpnewsbars_modcp_start()
{
    global $db, $mybb, $templates, $modcpnewsbars_1, $modcpnewsbars_2, $modcpnewsbars_3;
    if ($mybb->settings['modcpnewsbars_enable_modcp'] == 1)
    {
        if ($mybb->settings['modcpnewsbars_enable_input_1'] == 1)
        {
            eval("\$modcpnewsbars_1 = \"" . $templates->get("modcpnewsbars_1") . "\";");
        }

        if ($mybb->settings['modcpnewsbars_enable_input_2'] == 1)
        {
            eval("\$modcpnewsbars_2 = \"" . $templates->get("modcpnewsbars_2") . "\";");
        }

        if ($mybb->settings['modcpnewsbars_enable_input_3'] == 1)
        {
            eval("\$modcpnewsbars_3 = \"" . $templates->get("modcpnewsbars_3") . "\";");
        }
    }
}

?>