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
 * unitec Teacher Block block
 *
 * @package    block_unitec_teacher_block
 * @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * This class overrides some block properties and generates the block content
 *
 * @package    block_unitec_teacher_block
 * @copyright  2021 TRL Education Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_unitec_teacher_block extends block_base {

    /**
     * Initialize the block
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_unitec_teacher_block');
    }

    /**
     * Check if block has config
     */
    public function has_config() {
        return true;
    }

    /**
     * Check block formats
     */
    public function applicable_formats() {
        return array('course' => true);
    }

    /**
     * Block title
     */
    public function specialization() {
        if (isset($this->config->title)) {
            $this->title = format_string($this->config->title);
        } else {
            $this->title = format_string(get_string('pluginname', 'block_unitec_teacher_block'));
        }
    }

    /**
     * Allow multiple blocks
     */
    public function instance_allow_multiple() {
        return true;
    }

    /**
     * Generate block content
     */
    public function get_content() {
        global $OUTPUT, $USER, $PAGE, $CFG;

        require_once($CFG->libdir . '/filelib.php');

        if ($this->content !== null) {
            return $this->content;
        }

        $context = context_course::instance($PAGE->course->id);
        $canviewuserdetails = has_capability('moodle/user:viewdetails', $context);

        // Render block contents.
        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->text .= html_writer::start_tag('div', array('class' => 'unitec_teacher_block'));

        if ($canviewuserdetails) {
            $this->content->text .= $this->render_user_profile($this->config->user_1);
            $this->content->text .= $this->render_user_profile($this->config->user_2);
            $this->content->text .= $this->render_user_profile($this->config->user_3);
            $this->content->text .= $this->render_user_profile($this->config->user_4);
            $this->content->text .= $this->render_user_profile($this->config->user_5);
            $this->content->text .= $this->render_user_profile($this->config->user_6);
        } else {
            $this->content->text .= html_writer::tag('p', get_string('cannot_view_user_details', 'block_unitec_teacher_block'));
        }

        $this->content->text .= html_writer::end_tag('div');

        return $this->content;
    }

    /**
     * Render user profile
     * @param object $userid the user id
     */
    protected function render_user_profile($userid) {
        global $DB, $OUTPUT, $USER;

        // Get the user to display.
        $user = get_complete_user_data('id', $userid);

        if ($user) {
            $html = '';
            $html .= html_writer::start_tag('div', array('class' => 'user_profile'));
            $html .= html_writer::tag('div', $this->user_profile_picture($user), array('class' => 'user_picture'));
            $html .= html_writer::start_tag('div', array('class' => 'user_details'));
            $html .= html_writer::tag('div', $this->user_role($user), array('class' => 'detail role'));
            $html .= html_writer::tag('div', $this->user_custom_profile_field_1($user), array('class' => 'detail cpf1'));
            $html .= html_writer::tag('div', $this->user_name($user), array('class' => 'detail name'));
            $html .= html_writer::tag('div', $this->user_phone1($user), array('class' => 'detail phone1'));
            $html .= html_writer::tag('div', $this->user_phone2($user), array('class' => 'detail phone2'));
            $html .= html_writer::tag('div', $this->user_email($user), array('class' => 'detail email'));
            $html .= html_writer::end_tag('div');

            $html .= html_writer::end_tag('div');

            return $html;
        }
    }

    /**
     * Render user profile picture
     * @param object $user the user
     */
    protected function user_profile_picture(&$user) {
        global $OUTPUT;

        if ($this->config->display_profile_picture) {
            return $OUTPUT->user_picture($user, array('size' => 100, 'class' => 'user_image'));
        }
    }

    /**
     * Render user role
     * @param object $user the user
     */
    protected function user_role(&$user) {
        
        if ($this->config->display_role) {
            $roles = get_user_roles($this->context, $user->id);

            $roles = array_map(
                function ($value) {
                    if ($value->name) {
                        $role = $value->name;
                    } else {
                        $role = $value->shortname;
                    }
                    return ucwords($role);
                },
                $roles
            );

            return join(', ', $roles);
        }
    }
    
 
    
        /**
     * Render user custom profile field 1
     * @param object $user the user
     */
    protected function user_custom_profile_field_1(&$user) {
        $field = $this->config->display_custom_profile_field_1;

        if ($field) {
            if ($user->profile[$field]) {
                return $user->profile[$field];
            }
        }
    }

    /**
     * Render user name
     * @param object $user the user
     */
    protected function user_name(&$user) {
        if ($this->config->display_firstname) {
            $names[] = '<i class="fa fa-user fa-lg">&nbsp;&nbsp;</i>';
        }

        if ($this->config->display_firstname) {
            $names[] = $user->firstname;
        }

        if ($this->config->display_lastname) {
            $names[] = $user->lastname;
        }

        return join(' ', $names);
    }
  
    
 /**
     * Get an array of user phone numbers to be displayed.
     *
     * @param object $user
     * @param int $key
     * @return array
     */
      
    protected function user_phone1(&$user) {

        if ($this->config->display_phone1 && $user->phone1 != '') {
            $phones[] = '<span>&nbsp;<i class="fa fa-phone fa-lg">&nbsp;&nbsp;</i></span>';
        }
        
        if ($this->config->display_phone1 && $user->phone1 != '') {
            $phones[] = $user->phone1;
        }

        return join(' ', $phones);
    }
    
    
    protected function user_phone2(&$user) {

        if ($this->config->display_phone2 && $user->phone2 != '') {
            $mobile[] = '<span>&nbsp;<i class="fa fa-mobile fa-2x">&nbsp;&nbsp;</i></span>';
        }
        
        if ($this->config->display_phone2 && $user->phone2 != '') {
            $mobile[] = $user->phone2;
        }

        return join(' ', $mobile);
    }  
  

    /**
     * Render user email
     * @param object $user the user
     */
    protected function user_email(&$user) {
        
        if ($this->config->display_email && $user->maildisplay != 0) {
            $emails[] = '<span>&nbsp;<i class="fa fa-envelope">&nbsp;&nbsp;&nbsp;</i></span>';
        }
        
        if ($this->config->display_email && $user->maildisplay != 0) {
            $emails[] = html_writer::tag('a', $user->email, array('href' => 'mailto:' . $user->email));
        }
        return join(' ', $emails);
    }


}
