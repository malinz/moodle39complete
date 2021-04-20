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
 * Edit block page
 *
 * @package    block_meet_the_team
 * @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * This class adds custom form fields
 *
 * @package    block_meet_the_team
 * @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_meet_the_team_edit_form extends block_edit_form {

    /**
     * Add form fields specific to this block
     * @param object $mform the form being built
     */
    protected function specific_definition($mform) {

        $config = get_config('block_meet_the_team');

        // Heading.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
        
        // Note to users.
        $mform->addElement('static', 'config_display_user_note',
            get_string('display_user_note', 'block_meet_the_team'),
            get_string('display_user_note_desc', 'block_meet_the_team'));

        // Title.
        $mform->addElement('text', 'config_title', get_string('name'));
        $mform->setType('config_title', PARAM_TEXT);
        $mform->setDefault('config_title', get_string('pluginname', 'block_meet_the_team'));

        // Profile picture.
        $mform->addElement('advcheckbox', 'config_display_profile_picture',
            get_string('display_profile_picture', 'block_meet_the_team'));
        $mform->setDefault('config_display_profile_picture', $config->display_profile_picture); 
        
        // First name.
        $mform->addElement('advcheckbox', 'config_display_firstname',
            get_string('display_firstname', 'block_meet_the_team'));
        $mform->setDefault('config_display_firstname', $config->display_firstname);

        // Surname.
        $mform->addElement('advcheckbox', 'config_display_lastname',
            get_string('display_lastname', 'block_meet_the_team'));
        $mform->setDefault('config_display_lastname', $config->display_lastname);
        
        // Phone 1.
        $mform->addElement('advcheckbox', 'config_display_phone1',
            get_string('display_phone1', 'block_meet_the_team'));
        $mform->setDefault('config_display_phone1', $config->display_phone1);
        
        // Phone 2.
        $mform->addElement('advcheckbox', 'config_display_phone2',
            get_string('display_phone2', 'block_meet_the_team'));
        $mform->setDefault('config_display_phone2', $config->display_phone2);

        // Email.
        $mform->addElement('advcheckbox', 'config_display_email',
            get_string('display_email', 'block_meet_the_team'));
        $mform->setDefault('config_display_email', $config->display_email);               
        
        // Instructions for the use of the Custom Role checkbox
        $mform->addElement('static', 'config_display_custom_role_checkbox_info',
            get_string('display_custom_role_checkbox_info', 'block_meet_the_team'),
            get_string('display_custom_role_checkbox_info_desc', 'block_meet_the_team'));

        //Custom profile field.
        $mform->addElement('advcheckbox', 'config_display_custom_role_checkbox',
            get_string('display_custom_role_checkbox', 'block_meet_the_team'));
        if ($config->display_custom_profile_field_short_name != ''){
            $mform->setDefault('config_display_custom_role_checkbox', $config->display_custom_role_checkbox);
        } else {
            $mform->setDefault('config_display_custom_role_checkbox', $config->display_custom_role);
            $mform->hardFreeze('config_display_custom_role_checkbox');
        }
        
        // Instructions for the use of the Custom Role checkbox II
        $mform->addElement('static', 'config_display_custom_role_info',
            get_string('display_custom_role_info', 'block_meet_the_team'),
            get_string('display_custom_role_info_desc', 'block_meet_the_team'));

        
        // Custom profile field short name. USE THIS TO DISPLAY AN NON-EDITABLE TEXT FIELD
       $mform->addElement('text', 'config_display_custom_profile_field_short_name',
            get_string('display_custom_profile_field_short_name', 'block_meet_the_team'));
        $mform->setType('config_display_custom_profile_field_short_name', PARAM_TEXT);
        $mform->setDefault('config_display_custom_profile_field_short_name', $config->display_custom_profile_field_short_name);
        $mform->hardFreeze('config_display_custom_profile_field_short_name'); //This disables editing
        
        // Custom profile field long name. USE THIS TO DISPLAY AN NON-EDITABLE TEXT FIELD
       $mform->addElement('text', 'config_display_custom_profile_field_long_name',
            get_string('display_custom_profile_field_long_name', 'block_meet_the_team'));
        $mform->setType('config_display_custom_profile_field_long_name', PARAM_TEXT);
        $mform->setDefault('config_display_custom_profile_field_long_name', $config->display_custom_profile_field_long_name);
        $mform->hardFreeze('config_display_custom_profile_field_long_name'); //This disables editing

        $users = $this->get_course_users();

        // User 1.
        $mform->addElement('select', 'config_user_1', get_string('user_1', 'block_meet_the_team'), $users);
        
        // User 2.
        $mform->addElement('select', 'config_user_2', get_string('user_2', 'block_meet_the_team'), $users);        
        
        // User 3.
        $mform->addElement('select', 'config_user_3', get_string('user_3', 'block_meet_the_team'), $users);
        
        // User 4.
        $mform->addElement('select', 'config_user_4', get_string('user_4', 'block_meet_the_team'), $users);
        
        // User 5.
        $mform->addElement('select', 'config_user_5', get_string('user_5', 'block_meet_the_team'), $users);
        
        // User 6.
        $mform->addElement('select', 'config_user_6', get_string('user_6', 'block_meet_the_team'), $users);
        
    }

    /**
     * Returns an array of users in the course formatted for a select box.
     */
    private function get_course_users() {
        global $PAGE;

        $courseid = $PAGE->course->id;
        $context = context_course::instance($courseid);
        $users = get_enrolled_users($context, '', 0, 'u.id, u.firstname, u.lastname', null, 0, 0, true);

        foreach ($users as $key => &$value) {
            $value = $value->firstname . ' ' . $value->lastname;
        }

        $users = array('0' => 'None') + $users;

        return $users;
    }
}
