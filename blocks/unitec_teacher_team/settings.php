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
 * @package    block_unitec_teacher_team
 *  @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
       
    // Default admin notes for custom role checkbox.
    $name = 'block_unitec_teacher_team/display_custom_role_admin_instructions';
    $title = get_string('display_custom_role_admin_instructions', 'block_unitec_teacher_team');
    $description = get_string('display_custom_role_admin_instructions_desc', 'block_unitec_teacher_team');
    $setting = new admin_setting_heading($name, $title, $description, FORMAT_MARKDOWN);
    $settings->add($setting);
   
}
