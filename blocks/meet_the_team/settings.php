<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Default settings page
 *
 * @package    block_meet_the_team
 *  @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Default settings heading.
    $name = 'block_meet_the_team/default_settings_heading';
    $title = get_string('default_settings_heading', 'block_meet_the_team');
    $description = get_string('default_settings_heading_desc', 'block_meet_the_team');
    $setting = new admin_setting_heading($name, $title, $description, FORMAT_MARKDOWN);
    $settings->add($setting);

    // Display profile picture.
    $name = 'block_meet_the_team/display_profile_picture';
    $title = get_string('display_profile_picture', 'block_meet_the_team');
    $description = get_string('display_profile_picture_desc', 'block_meet_the_team');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);

    // Display first name.
    $name = 'block_meet_the_team/display_firstname';
    $title = get_string('display_firstname', 'block_meet_the_team');
    $description = get_string('display_firstname_desc', 'block_meet_the_team');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);

    // Display lastname.
    $name = 'block_meet_the_team/display_lastname';
    $title = get_string('display_lastname', 'block_meet_the_team');
    $description = get_string('display_lastname_desc', 'block_meet_the_team');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);
    
    // Display phone 1.
    $name = 'block_meet_the_team/display_phone1';
    $title = get_string('display_phone1', 'block_meet_the_team');
    $description = get_string('display_phone1_desc', 'block_meet_the_team');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);
    
    // Display phone 2.
    $name = 'block_meet_the_team/display_phone2';
    $title = get_string('display_phone2', 'block_meet_the_team');
    $description = get_string('display_phone2_desc', 'block_meet_the_team');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);

    // Display email.
    $name = 'block_meet_the_team/display_email';
    $title = get_string('display_email', 'block_meet_the_team');
    $description = get_string('display_email_desc', 'block_meet_the_team');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);
    
        
    // Default admin notes for custom role checkbox.
    $name = 'block_meet_the_team/display_custom_role_admin_instructions';
    $title = get_string('display_custom_role_admin_instructions', 'block_meet_the_team');
    $description = get_string('display_custom_role_admin_instructions_desc', 'block_meet_the_team');
    $setting = new admin_setting_heading($name, $title, $description, FORMAT_MARKDOWN);
    $settings->add($setting);
    
    // Display custom profile field (Short Name).
    $name = 'block_meet_the_team/display_custom_profile_field_short_name';
    $title = get_string('display_custom_profile_field_short_name', 'block_meet_the_team');
    $description = get_string('display_custom_profile_field_short_name_desc', 'block_meet_the_team');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);
    
    // Display custom profile field (Long Name).
    $name = 'block_meet_the_team/display_custom_profile_field_long_name';
    $title = get_string('display_custom_profile_field_long_name', 'block_meet_the_team');
    $description = get_string('display_custom_profile_field_long_name_desc', 'block_meet_the_team');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);
}
