<?php

namespace sdj;

class ExitCodes {
	const VERSION = '0.0.1';

	public static function exit_status($status) {
		if (array_key_exists($status, self::$STATUS_CODES)) {
			return self::$STATUS_CODES[$status];
		} else {
		  print_r(self::$STATUS_CODES);
		  echo "hei\n";
			return $status;
		}
	}

	public static function statusFromExitCode($status) {
	  $key = array_search($status, self::$STATUS_CODES);

	  if ($key) {
	    return $key;
	  } else {
	    return "unknown";
	  }
	}

	public static function do_exit($status = Bashexits::EX_OK) {
		$status = self::exit_status($status);
		exit($status);
	}
}
