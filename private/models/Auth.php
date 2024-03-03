<?php

/**
 * Authentication class
 */
class Auth
{
	public static function authenticate($row)
	{
		$_SESSION['USER'] = $row;
	}

	public static function logout()
	{
		unset($_SESSION['USER']);
	}

	public static function logged_in()
	{
		return isset($_SESSION['USER']);
	}

	public static function user()
	{
		return isset($_SESSION['USER']) ? $_SESSION['USER']->firstname : false;
	}

	public static function __callStatic($method, $params)
	{
		$prop = strtolower(str_replace("get", "", $method));
		return isset($_SESSION['USER']->$prop) ? $_SESSION['USER']->$prop : 'Unknown';
	}

	public static function switch_school($id)
	{
		if (isset($_SESSION['USER']) && $_SESSION['USER']->rank === 'super_admin') {
			$user = new User();
			$school = new School();

			if ($row = $school->where('id', $id)) {
				$row = $row[0];
				$arr['school_id'] = $row->school_id;

				$user->update($_SESSION['USER']->id, $arr);
				$_SESSION['USER']->school_id = $row->school_id;
				$_SESSION['USER']->school_name = $row->school;

			}

			return true;
		}

		return false;
	}

	public static function access($rank = 'student')
	{
		if (!isset($_SESSION['USER'])) {
			return false;
		}

		$RANK['super_admin'] 	= ['super_admin', 'admin', 'lecturer', 'reception', 'student'];
		$RANK['admin'] 			= ['admin', 'lecturer', 'reception', 'student'];
		$RANK['lecturer'] 		= ['lecturer', 'reception', 'student'];
		$RANK['reception'] 		= ['reception', 'student'];
		$RANK['student'] 		= ['student'];

		$logged_in_rank = $_SESSION['USER']->rank;

		if (!isset($RANK[$logged_in_rank])) {
			return false;
		}

		return in_array($rank, $RANK[$logged_in_rank]);
	}

	public static function i_own_content($row)
	{
		if (is_array($row)) {
			$row = $row[0];
		}

		if (!isset($_SESSION['USER'])) {
			return false;
		}

		if (isset($row->user_id) && $_SESSION['USER']->user_id === $row->user_id) {
			return true;
		}

		$allowed = ['super_admin', 'admin'];

		return in_array($_SESSION['USER']->rank, $allowed);
	}
}