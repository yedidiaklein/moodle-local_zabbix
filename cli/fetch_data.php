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

define('CLI_SCRIPT', true);

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/clilib.php');

if (isset($argv[1])) {
	$firstParam = $argv[1];
}

switch ($firstParam) {
	case 'courses' :
		echo $DB->count_records('course');
		break;
	case 'users' :
		echo $DB->count_records('user', ['deleted' => 0]);
		break;
	case 'active_users' :
		//echo $DB->count_records('user', ['deleted' => 0, 'lastaccess' => (time() - 86400*60)]);
		$sql = "SELECT COUNT(*) FROM {user} WHERE lastaccess > (UNIX_TIMESTAMP() - 86400*60)";
                $params = [];
                echo $DB->count_records_sql($sql, $params);
		break;
	case 'online_users_30' :
		echo local_zabbix_get_online_users(time() - 1800);
		break;
        case 'online_users_10' :
                echo local_zabbix_get_online_users(time() - 600);
                break;
        case 'online_users_5' :
                echo local_zabbix_get_online_users(time() - 300);
                break;
        case 'online_users_1' :
                echo local_zabbix_get_online_users(time() - 60);
		break;
	case 'adhoc_tasks' : 
		echo $DB->count_records('task_adhoc', []);
		break;
	case 'failed_tasks' :
		$sql = "SELECT COUNT(*) FROM {task_scheduled} WHERE faildelay > 0";
		$params = [];
		echo $DB->count_records_sql($sql, $params);
		break;
	default:
		echo 0;
		break;
}


function local_zabix_get_online_users($time_limit) {
    global $DB;
    $sql = "SELECT COUNT(DISTINCT userid) FROM {logstore_standard_log} WHERE timecreated > :timecreated";
    $params = ['timecreated' => $time_limit];
    return $DB->count_records_sql($sql, $params);
}
