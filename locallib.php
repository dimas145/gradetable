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
 * This file contains the definition for the library class for grade table feedback plugin
 *
 * @package   assignfeedback_gradetable
 * @copyright 2022, Dimas 13518069@std.stei.itb.ac.id
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

define('ASSIGNFEEDBACK_GRADETABLE_MAXGRADER', 1);

/**
 * Library class for grade table feedback plugin extending feedback plugin base class.
 *
 * @package   assignfeedback_gradetable
 * @copyright 2022, Dimas 13518069@std.stei.itb.ac.id
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class assign_feedback_gradetable extends assign_feedback_plugin {

    /**
     * Get the name of the grade table feedback plugin.
     *
     * @return string
     */
    public function get_name() {
        return get_string('gradetable', 'assignfeedback_gradetable');
    }

    /**
     * @param stdClass $grade Grade object.
     * @param stdClass $data Form data.
     * @return boolean
     */
    public function is_feedback_modified(stdClass $grade, stdClass $data) {
        return false;   // TODO
    }

    /**
     * Display the table.
     *
     * @param stdClass $data
     * @return string
     */
    public function display_table(stdClass $data) {
        $table = new html_table();
        $table->head = array('Reference', 'Feedback');

        $table->data[] = array('test', '<a href="' . 'localhost:8085/ping' . '">Test</a>');

        $result = 'autograder1<br>';
        $result .= html_writer::table($table);
        $result .= '<br>autograder2<br>';
        $result .= '<br>' . html_writer::table($table);
        return $result;
    }

    /**
     * Display the list of feedbacks in the table.
     *
     * @param stdClass $grade
     * @param bool $showviewlink - Set to true to show a link to see the full list of feedbacks
     * @return string
     */
    public function view_summary(stdClass $grade, &$showviewlink) {
        return display_table();
    }

    /**
     * Display the list of feedbacks in the table.
     *
     * @param stdClass $grade
     * @return string
     */
    public function view(stdClass $grade) {
        // $data = hit api bs
        return display_table();
    }

    /**
     * The assignment has been deleted - cleanup.
     *
     * @return bool
     */
    public function delete_instance() {
        // nothing to do
        return true;
    }

    /**
     * Return true if there are no feedbacks.
     *
     * @param stdClass $grade
     */
    public function is_empty(stdClass $grade) {
        return false; // TODO
    }
}
