<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Service for checking state of lesson generation.
 *
 * @package     local_zabbix
 * @category    admin
 * @copyright   Yedidia Klein <yedidia@openapp.co.il>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_zabbix'; // Full name of the plugin (used for diagnostics).
$plugin->version   = 2025051900;    // The current plugin version (Date: YYYYMMDDXX).
$plugin->requires  = 2022041900;    // Requires this Moodle version.
$plugin->maturity  = MATURITY_STABLE; // This is considered stable.
$plugin->release   = '1.0.0';        // Human-readable version name.