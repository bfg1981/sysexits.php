<?php

namespace sdj;

require_once 'ExitCodes.php';

class Sysexits extends ExitCodes {
	const VERSION = '0.0.1';

	const EX_OK          = 0;

	const EX__BASE       = 64;

	const EX_USAGE       = 64;
	const EX_DATAERR     = 65;
	const EX_NOINPUT     = 66;
	const EX_NOUSER      = 67;
	const EX_NOHOST      = 68;
	const EX_UNAVAILABLE = 69;
	const EX_SOFTWARE    = 70;
	const EX_OSERR       = 71;
	const EX_OSFILE      = 72;
	const EX_CANTCREAT   = 73;
	const EX_IOERR       = 74;
	const EX_TEMPFAIL    = 75;
	const EX_PROTOCOL    = 76;
	const EX_NOPERM      = 77;
	const EX_CONFIG      = 78;

	const EX__MAX = 78;

	public static $STATUS_CODES = array(
		'ok'                          => self::EX_OK,
		'success'                     => self::EX_OK,

		'_base'                       => self::EX__BASE,

		'usage'                       => self::EX_USAGE,

		'dataerr'                     => self::EX_DATAERR,
		'data_error'                  => self::EX_DATAERR,

		'noinput'                     => self::EX_NOINPUT,
		'input_missing'               => self::EX_NOINPUT,

		'nouser'                      => self::EX_NOUSER,
		'no_such_user'                => self::EX_NOUSER,

		'nohost'                      => self::EX_NOHOST,
		'no_such_host'                => self::EX_NOHOST,

		'unavailable'                 => self::EX_UNAVAILABLE,
		'service_unavailable'         => self::EX_UNAVAILABLE,

		'software'                    => self::EX_SOFTWARE,
		'software_error'              => self::EX_SOFTWARE,

		'oserr'                       => self::EX_OSERR,
		'operating_system_error'      => self::EX_OSERR,

		'osfile'                      => self::EX_OSFILE,
		'operating_system_file_error' => self::EX_OSFILE,

		'cantcreat'                   => self::EX_CANTCREAT,
		'cant_create_output'          => self::EX_CANTCREAT,

		'ioerr'                       => self::EX_IOERR,

		'tempfail'                    => self::EX_TEMPFAIL,
		'temporary_failure'           => self::EX_TEMPFAIL,
		'try_again'                   => self::EX_TEMPFAIL,

		'protocol'                    => self::EX_PROTOCOL,
		'protocol_error'              => self::EX_PROTOCOL,

		'noperm'                      => self::EX_NOPERM,
		'permission_denied'           => self::EX_NOPERM,

		'config'                      => self::EX_CONFIG,
		'config_error'                => self::EX_CONFIG,

		'_max'                        => self::EX__MAX
	);


	public static function exit_status($status) {
		if (array_key_exists($status, self::$STATUS_CODES)) {
			return self::$STATUS_CODES[$status];
		} else {
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
