<?php

namespace sdj;
include_once 'ExitCodes.php';

class Bashexits extends ExitCodes {
	const VERSION = '0.0.1';

	const EX_OK                  = 0;
	const EX_SUCCESS             = 0;
	const EX_GENERAL_ERROR       = 1;
	const EX_MISUSE_OF_BUILTIN   = 2;
	const EX_NO_EXECUTION        = 126;
	const EX_CMD_NOT_FOUND       = 127;
	const EX_INVALID             = 128;
	const EX_SIGNAL_BASE         = 128;
	const EX_SIGNAL_HUP          = 129;
	const EX_SIGNAL_INT          = 130;
	const EX_SIGNAL_QUIT         = 131;
	const EX_SIGNAL_ILL          = 132;
	const EX_SIGNAL_TRAP         = 133;
	const EX_SIGNAL_ABRT         = 134;
	const EX_SIGNAL_BUS          = 135;
	const EX_SIGNAL_FPE          = 136;
	const EX_SIGNAL_KILL         = 137;
	const EX_SIGNAL_USR1         = 138;
	const EX_SIGNAL_SEGV         = 139;
	const EX_SIGNAL_USR2         = 140;
	const EX_SIGNAL_PIPE         = 141;
	const EX_SIGNAL_ALRM         = 142;
	const EX_SIGNAL_TERM         = 143;
	const EX_SIGNAL_SIXTEEN      = 144;
	const EX_SIGNAL_CHLD         = 145;
	const EX_SIGNAL_CONT         = 146;
	const EX_SIGNAL_STOP         = 147;
	const EX_SIGNAL_TSTP         = 148;
	const EX_SIGNAL_TTIN         = 149;
	const EX_SIGNAL_TTOU         = 150;
	const EX_SIGNAL_URG          = 151;
	const EX_SIGNAL_XCPU         = 152;
	const EX_SIGNAL_XFSZ         = 153;
	const EX_SIGNAL_VTALRM       = 154;
	const EX_SIGNAL_PROF         = 155;
	const EX_SIGNAL_WINCH        = 156;
	const EX_SIGNAL_IO           = 157;
	const EX_SIGNAL_PWR          = 158;
	const EX_SIGNAL_SYS          = 159;
	const EX_SIGNAL_THIRTY_TWO   = 160;
	const EX_SIGNAL_THIRTY_THREE = 161;
	const EX_SIGNAL_RTMIN        = 162;
	const EX_SIGNAL_RTMINP1      = 163;
	const EX_SIGNAL_RTMINP2      = 164;
	const EX_SIGNAL_RTMINP3      = 165;
	const EX_SIGNAL_RTMINP4      = 166;
	const EX_SIGNAL_RTMINP5      = 167;
	const EX_SIGNAL_RTMINP6      = 168;
	const EX_SIGNAL_RTMINP7      = 169;
	const EX_SIGNAL_RTMINP8      = 170;
	const EX_SIGNAL_RTMINP9      = 171;
	const EX_SIGNAL_RTMINP10     = 172;
	const EX_SIGNAL_RTMINP11     = 173;
	const EX_SIGNAL_RTMINP12     = 174;
	const EX_SIGNAL_RTMINP13     = 175;
	const EX_SIGNAL_RTMINP14     = 176;
	const EX_SIGNAL_RTMINP15     = 177;
	const EX_SIGNAL_RTMAXM14     = 178;
	const EX_SIGNAL_RTMAXM13     = 179;
	const EX_SIGNAL_RTMAXM12     = 180;
	const EX_SIGNAL_RTMAXM11     = 181;
	const EX_SIGNAL_RTMAXM10     = 182;
	const EX_SIGNAL_RTMAXM9      = 183;
	const EX_SIGNAL_RTMAXM8      = 184;
	const EX_SIGNAL_RTMAXM7      = 185;
	const EX_SIGNAL_RTMAXM6      = 186;
	const EX_SIGNAL_RTMAXM5      = 187;
	const EX_SIGNAL_RTMAXM4      = 188;
	const EX_SIGNAL_RTMAXM3      = 189;
	const EX_SIGNAL_RTMAXM2      = 190;
	const EX_SIGNAL_RTMAXM1      = 191;
	const EX_SIGNAL_RTMAX        = 192;
	const EX_SIGNAL_MAX          = 192;

	public static $STATUS_CODES = array(
            'ok'                                => self::EX_OK,
	    'General error'                     => self::EX_GENERAL_ERROR,
	    'Misuse of shell builtins'          => self::EX_MISUSE_OF_BUILTIN,
	    'Command invoked cannot execute'    => self::EX_NO_EXECUTION,
	    'command not found'                 => self::EX_CMD_NOT_FOUND,
	    'Invalid argument'                  => self::EX_INVALID,
	    'hup'                               => self::EX_SIGNAL_HUP,
	    'int'                               => self::EX_SIGNAL_INT,
	    'quit'                              => self::EX_SIGNAL_QUIT,
	    'ill'                               => self::EX_SIGNAL_ILL,
	    'trap'                              => self::EX_SIGNAL_TRAP,
	    'abrt'                              => self::EX_SIGNAL_ABRT,
	    'bus'                               => self::EX_SIGNAL_BUS,
	    'fpe'                               => self::EX_SIGNAL_FPE,
	    'kill'                              => self::EX_SIGNAL_KILL,
	    'usr1'                              => self::EX_SIGNAL_USR1,
	    'segv'                              => self::EX_SIGNAL_SEGV,
	    'usr2'                              => self::EX_SIGNAL_USR2,
	    'pipe'                              => self::EX_SIGNAL_PIPE,
	    'alrm'                              => self::EX_SIGNAL_ALRM,
	    'term'                              => self::EX_SIGNAL_TERM,
	    'sixteen'                           => self::EX_SIGNAL_SIXTEEN,
	    'chld'                              => self::EX_SIGNAL_CHLD,
	    'cont'                              => self::EX_SIGNAL_CONT,
	    'stop'                              => self::EX_SIGNAL_STOP,
	    'tstp'                              => self::EX_SIGNAL_TSTP,
	    'ttin'                              => self::EX_SIGNAL_TTIN,
	    'ttou'                              => self::EX_SIGNAL_TTOU,
	    'urg'                               => self::EX_SIGNAL_URG,
	    'xcpu'                              => self::EX_SIGNAL_XCPU,
	    'xfsz'                              => self::EX_SIGNAL_XFSZ,
	    'vtalrm'                            => self::EX_SIGNAL_VTALRM,
	    'prof'                              => self::EX_SIGNAL_PROF,
	    'winch'                             => self::EX_SIGNAL_WINCH,
	    'io'                                => self::EX_SIGNAL_IO,
	    'pwr'                               => self::EX_SIGNAL_PWR,
	    'sys'                               => self::EX_SIGNAL_SYS,
	    'thirty_two'                        => self::EX_SIGNAL_THIRTY_TWO,
	    'thirty_three'                      => self::EX_SIGNAL_THIRTY_THREE,
	    'rtmin'                             => self::EX_SIGNAL_RTMIN,
	    'rtminP1'                           => self::EX_SIGNAL_RTMINP1,
	    'rtminP2'                           => self::EX_SIGNAL_RTMINP2,
	    'rtminP3'                           => self::EX_SIGNAL_RTMINP3,
	    'rtminP4'                           => self::EX_SIGNAL_RTMINP4,
	    'rtminP5'                           => self::EX_SIGNAL_RTMINP5,
	    'rtminP6'                           => self::EX_SIGNAL_RTMINP6,
	    'rtminP7'                           => self::EX_SIGNAL_RTMINP7,
	    'rtminP8'                           => self::EX_SIGNAL_RTMINP8,
	    'rtminP9'                           => self::EX_SIGNAL_RTMINP9,
	    'rtminP10'                          => self::EX_SIGNAL_RTMINP10,
	    'rtminP11'                          => self::EX_SIGNAL_RTMINP11,
	    'rtminP12'                          => self::EX_SIGNAL_RTMINP12,
	    'rtminP13'                          => self::EX_SIGNAL_RTMINP13,
	    'rtminP14'                          => self::EX_SIGNAL_RTMINP14,
	    'rtminP15'                          => self::EX_SIGNAL_RTMINP15,
	    'rtmaxM14'                          => self::EX_SIGNAL_RTMAXM14,
	    'rtmaxM13'                          => self::EX_SIGNAL_RTMAXM13,
	    'rtmaxM12'                          => self::EX_SIGNAL_RTMAXM12,
	    'rtmaxM11'                          => self::EX_SIGNAL_RTMAXM11,
	    'rtmaxM10'                          => self::EX_SIGNAL_RTMAXM10,
	    'rtmaxM9'                           => self::EX_SIGNAL_RTMAXM9,
	    'rtmaxM8'                           => self::EX_SIGNAL_RTMAXM8,
	    'rtmaxM7'                           => self::EX_SIGNAL_RTMAXM7,
	    'rtmaxM6'                           => self::EX_SIGNAL_RTMAXM6,
	    'rtmaxM5'                           => self::EX_SIGNAL_RTMAXM5,
	    'rtmaxM4'                           => self::EX_SIGNAL_RTMAXM4,
	    'rtmaxM3'                           => self::EX_SIGNAL_RTMAXM3,
	    'rtmaxM2'                           => self::EX_SIGNAL_RTMAXM2,
	    'rtmaxM1'                           => self::EX_SIGNAL_RTMAXM1,
	    'rtmax'                             => self::EX_SIGNAL_RTMAX
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
