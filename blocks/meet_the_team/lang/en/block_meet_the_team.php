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
 * Strings for component 'block_meet_the_team', language 'en'
 *
 * @package    block_meet_the_team
 * @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Note to users.
$string['display_user_note'] = 'Note to users';
$string['display_user_note_desc'] = '<b>Note:</b> The block name can be edited here to reflect the users wishes, e.g. \'Your Teachers\' or \'Your Librarians\'.<br>
There can be more than one Meet the Team block in a course. This can be useful to group different teams together';

// Plugin name.
$string['pluginname'] = 'Meet the Team';
$string['meet_the_team:addinstance'] = 'Add a new Meet the Team block';

// Default settings heading.
$string['default_settings_heading'] = 'Default Settings';
$string['default_settings_heading_desc'] = 'These settings will be used as defaults when creating new Meet the Team blocks.';

// Display profile picture.
$string['display_profile_picture'] = 'Profile picture';
$string['display_profile_picture_desc'] = 'Display the user\'s profile picture.';

// Display first name.
$string['display_firstname'] = 'First name';
$string['display_firstname_desc'] = 'Display the user\'s first name.';

// Display lastname.
$string['display_lastname'] = 'Last name';
$string['display_lastname_desc'] = 'Display the user\'s lastname.';

// Display phone 1.
$string['display_phone1'] = 'Phone number';
$string['display_phone1_desc'] = 'Display user\'s phone number if available';

// Display phone 2.
$string['display_phone2'] = 'Mobile phone number';
$string['display_phone2_desc'] = 'Display user\'s mobile phone number if available';

// Display email.
$string['display_email'] = 'Email';
$string['display_email_desc'] = 'Display the user\'s email address. It will not be displayed if the user has hidden their email address.';


//Custom role checkbox info in edit_form.php for Users.
$string['display_custom_role_checkbox_info'] = 'Custom role checkbox';
$string['display_custom_role_checkbox_info_desc'] = 'Check the checkbox below to display a custom role or title in the Teacher Block<br><b>Note:</b> If this feature has not been set up by the Site Administrator, the two fields below will be empty and the Checkbox will be disabled.';

// Custom Role Checkbox text.
$string['display_custom_role_checkbox'] = 'Custom role checkbox';

// Custom role instrucions and settings for users.
$string['display_custom_role_info'] = 'How to display a custom role or title';
$string['display_custom_role_info_desc'] = 'To enter the role or title to be displayed in the teacher block each user must:<br>
1. Click on their profile picture and then click on \'Profile\'.<br>
2. Click on \'Edit profile\' and scroll down to \'Other fields\'.<br>
3. Find the field with the same title as the \'Custom Profile field long name\' shown below.<br>
4. Enter their chosen course role or title in this field.<br>
<b>Note:</b> If the fields below are empty, contact the Site Administrator for the fields to be created.';

// Custom role instrucions and settings for Site Admins.
$string['display_custom_role_admin_instructions'] = 'Custom role field';
$string['display_custom_role_admin_instructions_desc'] = '<b>Note to Site Admins:</b> For users to be able to display a custom role do the following:<br>
1. Go to Site administration/Users/Accounts/User profile fields.<br>
2. Create a new "Text input" field.<br>
3. Give the field a unique short name. (e.g. custom_role)<br>
4. Give the field an appropriate long name. (e.g. Custom Role)<br>
5. Click \'Save changes\'<br>
6. Enter the field details in the text fields provided below and save changes.';

// Custom profile field short name field.
$string['display_custom_profile_field_short_name'] = 'Custom profile field short name';
$string['display_custom_profile_field_short_name_desc'] = 'Enter the custom profile field short name here.';
$string['default_custom_profile_field_short_name'] = '';

// Custom profile field long name field.
$string['display_custom_profile_field_long_name'] = 'Custom profile field long name';
$string['display_custom_profile_field_long_name_desc'] = 'Enter the custom profile field long name here. This will appear in the user instructions.';
$string['default_custom_profile_field_long_name'] = '';

//Select User fields.
$string['user_1'] = 'User 1';
$string['user_2'] = 'User 2';
$string['user_3'] = 'User 3';
$string['user_4'] = 'User 4';
$string['user_5'] = 'User 5';
$string['user_6'] = 'User 6';

// Permissions warning.
$string['cannot_view_user_details'] = 'You do not have permission to view user profiles.';