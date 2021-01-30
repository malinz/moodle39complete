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
 * A two column layout for the boost_var_1 theme.
 *
 * @package   theme_boost_var_1
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$topfullwidthtml = $OUTPUT->blocks('top-fullwidth');
$hastopfullwidth = strpos($topfullwidthtml, 'data-block=') !== false;
$upperfullwidthhtml = $OUTPUT->blocks('upper-fullwidth');
$hasupperfullwidth = strpos($upperfullwidthhtml, 'data-block=') !== false;
$lowerfullwidthhtml = $OUTPUT->blocks('lower-fullwidth');
$haslowerfullwidth = strpos($lowerfullwidthhtml, 'data-block=') !== false;
$bottomfullwidthhtml = $OUTPUT->blocks('bottom-fullwidth');
$hasbottomfullwidth = strpos($bottomfullwidthhtml, 'data-block=') !== false;
$uppernavdrawerhtml = $OUTPUT->blocks('upper-navdrawer');
$hasuppernavdrawer = strpos($uppernavdrawerhtml, 'data-block=') !== false;
$lowernavdrawerhtml = $OUTPUT->blocks('lower-navdrawer');
$haslowernavdrawer = strpos($lowernavdrawerhtml, 'data-block=') !== false;
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'topfullwidthblocks' => $topfullwidthtml,
    'hastopfullwidth' => $hastopfullwidth,
    'upperfullwidthblocks' => $upperfullwidthhtml,
    'hasupperfullwidth' => $hasupperfullwidth,
    'lowerfullwidthblocks' => $lowerfullwidthhtml,
    'haslowerfullwidth' => $haslowerfullwidth,
    'bottomfullwidthblocks' => $bottomfullwidthhtml,
    'hasbottomfullwidth' => $hasbottomfullwidth,
    'uppernavdrawerblocks' => $uppernavdrawerhtml,
    'hasuppernavdrawer' => $hasuppernavdrawer,
    'lowernavdrawerblocks' => $lowernavdrawerhtml,
    'haslowernavdrawer' => $haslowernavdrawer,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu)
];

$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();
echo $OUTPUT->render_from_template('theme_boost_var_1/columns2', $templatecontext);

