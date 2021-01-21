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
 * Template renderer for Moodle. Load and render Moodle templates with Mustache.
 *
 * @module     core/templates
 * @package    core
 * @class      templates
 * @copyright  2015 Damyon Wiese <damyon@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      2.9
 */
define(['jquery', './tether', 'core/event', 'core/custom_interaction_events'], function(jQuery, Tether, Event, customEvents) {

    window.jQuery = jQuery;
    window.Tether = Tether;
    M.util.js_pending('theme_boost_var_1/loader:children');

    require(['theme_boost_var_1/aria',
            'theme_boost_var_1/pending',
            'theme_boost_var_1/util',
            'theme_boost_var_1/alert',
            'theme_boost_var_1/button',
            'theme_boost_var_1/carousel',
            'theme_boost_var_1/collapse',
            'theme_boost_var_1/dropdown',
            'theme_boost_var_1/modal',
            'theme_boost_var_1/scrollspy',
            'theme_boost_var_1/tab',
            'theme_boost_var_1/tooltip',
            'theme_boost_var_1/popover'],
            function(Aria) {

        // We do twice because: https://github.com/twbs/bootstrap/issues/10547
        jQuery('body').popover({
            trigger: 'focus',
            selector: "[data-toggle=popover][data-trigger!=hover]"
        });

        // Popovers must close on Escape for accessibility reasons.
        customEvents.define(jQuery('body'), [
            customEvents.events.escape,
        ]);
        jQuery('body').on(customEvents.events.escape, '[data-toggle=popover]', function() {
            jQuery(this).popover('hide');
        });

        jQuery("html").popover({
            container: "body",
            selector: "[data-toggle=popover][data-trigger=hover]",
            trigger: "hover",
            delay: {
                hide: 500
            }
        });

        // We need to call popover automatically if nodes are added to the page later.
        Event.getLegacyEvents().done(function(events) {
            jQuery(document).on(events.FILTER_CONTENT_UPDATED, function() {
                jQuery('body').popover({
                    selector: '[data-toggle="popover"]',
                    trigger: 'focus'
                });

            });
        });

        Aria.init();
        M.util.js_complete('theme_boost_var_1/loader:children');
    });


    return {};
});
