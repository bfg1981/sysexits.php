<?php

namespace sdj;

require_once 'ExitCodes.php';

class Killexits extends ExitCodes {
	const VERSION = '0.0.1';

	const ZERO         = 0;
	const HUP          = 1;
	const INT          = 2;
	const QUIT         = 3;
	const ILL          = 4;
	const TRAP         = 5;
	const ABRT         = 6;
	const BUS          = 7;
	const FPE          = 8;
	const KILL         = 9;
	const USR1         = 10;
	const SEGV         = 11;
	const USR2         = 12;
	const PIPE         = 13;
	const ALRM         = 14;
	const TERM         = 15;
	const SIXTEEN      = 16;
	const CHLD         = 17;
	const CONT         = 18;
	const STOP         = 19;
	const TSTP         = 20;
	const TTIN         = 21;
	const TTOU         = 22;
	const URG          = 23;
	const XCPU         = 24;
	const XFSZ         = 25;
	const VTALRM       = 26;
	const PROF         = 27;
	const WINCH        = 28;
	const IO           = 29;
	const PWR          = 30;
	const SYS          = 31;
	const THIRTY_TWO   = 32;
	const THIRTY_THREE = 33;
	const RTMIN        = 34;
	const RTMINP1      = 35;
	const RTMINP2      = 36;
	const RTMINP3      = 37;
	const RTMINP4      = 38;
	const RTMINP5      = 39;
	const RTMINP6      = 40;
	const RTMINP7      = 41;
	const RTMINP8      = 42;
	const RTMINP9      = 43;
	const RTMINP10     = 44;
	const RTMINP11     = 45;
	const RTMINP12     = 46;
	const RTMINP13     = 47;
	const RTMINP14     = 48;
	const RTMINP15     = 49;
	const RTMAXM14     = 50;
	const RTMAXM13     = 51;
	const RTMAXM12     = 52;
	const RTMAXM11     = 53;
	const RTMAXM10     = 54;
	const RTMAXM9      = 55;
	const RTMAXM8      = 56;
	const RTMAXM7      = 57;
	const RTMAXM6      = 58;
	const RTMAXM5      = 59;
	const RTMAXM4      = 60;
	const RTMAXM3      = 61;
	const RTMAXM2      = 62;
	const RTMAXM1      = 63;
	const RTMAX        = 64;

	public static $STATUS_CODES = array(
            'zero'         => self::ZERO,
	    'hup'          => self::HUP,
	    'int'          => self::INT,
	    'quit'         => self::QUIT,
	    'ill'          => self::ILL,
	    'trap'         => self::TRAP,
	    'abrt'         => self::ABRT,
	    'bus'          => self::BUS,
	    'fpe'          => self::FPE,
	    'kill'         => self::KILL,
	    'usr1'         => self::USR1,
	    'segv'         => self::SEGV,
	    'usr2'         => self::USR2,
	    'pipe'         => self::PIPE,
	    'alrm'         => self::ALRM,
	    'term'         => self::TERM,
	    'sixteen'      => self::SIXTEEN,
	    'chld'         => self::CHLD,
	    'cont'         => self::CONT,
	    'stop'         => self::STOP,
	    'tstp'         => self::TSTP,
	    'ttin'         => self::TTIN,
	    'ttou'         => self::TTOU,
	    'urg'          => self::URG,
	    'xcpu'         => self::XCPU,
	    'xfsz'         => self::XFSZ,
	    'vtalrm'       => self::VTALRM,
	    'prof'         => self::PROF,
	    'winch'        => self::WINCH,
	    'io'           => self::IO,
	    'pwr'          => self::PWR,
	    'sys'          => self::SYS,
	    'thirty_two'   => self::THIRTY_TWO,
	    'thirty_three' => self::THIRTY_THREE,
	    'rtmin'        => self::RTMIN,
	    'rtminP1'      => self::RTMINP1,
	    'rtminP2'      => self::RTMINP2,
	    'rtminP3'      => self::RTMINP3,
	    'rtminP4'      => self::RTMINP4,
	    'rtminP5'      => self::RTMINP5,
	    'rtminP6'      => self::RTMINP6,
	    'rtminP7'      => self::RTMINP7,
	    'rtminP8'      => self::RTMINP8,
	    'rtminP9'      => self::RTMINP9,
	    'rtminP10'     => self::RTMINP10,
	    'rtminP11'     => self::RTMINP11,
	    'rtminP12'     => self::RTMINP12,
	    'rtminP13'     => self::RTMINP13,
	    'rtminP14'     => self::RTMINP14,
	    'rtminP15'     => self::RTMINP15,
	    'rtmaxM14'     => self::RTMAXM14,
	    'rtmaxM13'     => self::RTMAXM13,
	    'rtmaxM12'     => self::RTMAXM12,
	    'rtmaxM11'     => self::RTMAXM11,
	    'rtmaxM10'     => self::RTMAXM10,
	    'rtmaxM9'      => self::RTMAXM9,
	    'rtmaxM8'      => self::RTMAXM8,
	    'rtmaxM7'      => self::RTMAXM7,
	    'rtmaxM6'      => self::RTMAXM6,
	    'rtmaxM5'      => self::RTMAXM5,
	    'rtmaxM4'      => self::RTMAXM4,
	    'rtmaxM3'      => self::RTMAXM3,
	    'rtmaxM2'      => self::RTMAXM2,
	    'rtmaxM1'      => self::RTMAXM1,
	    'rtmax'        => self::RTMAX
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
