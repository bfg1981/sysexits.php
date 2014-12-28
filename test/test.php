<?php

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 1);

$produce=0;

require __DIR__ . '/../src/sdj/Sysexits.php';
require __DIR__ . '/../src/sdj/Killexits.php';
require __DIR__ . '/../src/sdj/Bashexits.php';

use sdj\Sysexits;
use sdj\Killexits;
use sdj\Bashexits;

header("Content-Type:text/plain");

$formatter = new NumberFormatter('en_US', NumberFormatter::SPELLOUT);

function defininitionProducer($inputstream, $stream_type, $number)
{
  if ($stream_type == 'class') {
    return $inputstream->get();
  }
  else {
    return fgets($inputstream);
  }
}

function process($location, $stream_type, $class, $streamToVariables, $produce = false)
{
  $check_types = array("forward", "reverse");
  foreach ($check_types as $check_type) {
    if ($stream_type == 'popen') {
      $inputstream = popen($location, "r") or die("Unable to open stream!");
    }
    elseif ($stream_type == 'fopen') {
      $inputstream = fopen($location, "r") or die("Unable to open file!");
    }
    elseif ($stream_type == 'class') {
      $inputstream = $location->open();
    }

    if ($inputstream) {
      $number = 0;
      while (($line = defininitionProducer($inputstream, $stream_type, $number)) !== false) {
	if ($streamToVariables($line, $number, $name, $value, $prettyname)) {

	  if ($check_type == "forward") {
	    if ($produce) {
	      printf("const %-22s = %3d;\n",$name,$value);
	    }
	    else {
	      $derived_value= eval("return $class::$name;");
	      printf ("%-25s: %3d\n", $name, $value);
	      assert($value==$derived_value);
	    }
	  }

	  if ($prettyname) {
	    if ($check_type == "reverse") {
	      if ($produce) {
		if ($number > 1)
		  echo ",\n";
		printf("%-35s => self::%s","'".$prettyname."'",$name);
	      }
	      else {
		$func= 'exit_status(' . $prettyname . ')';
		$derived_value= $class::exit_status($prettyname);
		printf ("%-43s: %3d\n", $func, $derived_value);
		assert($value==$derived_value);
	      }
	    }
	  }
	}
      }
      echo PHP_EOL;

      if ($stream_type != 'class' && !feof($inputstream)) {
	echo "Error: unexpected fgets() fail\n";
      }
      if ($stream_type == 'popen') {
	pclose($inputstream);
      }
    }
  }
}


function killvariables($line, &$number, &$name, &$value, &$prettyname) {
  global $formatter;
  $name = trim($line);
  $value = $number;

  if (is_numeric($name)) {
    if (!$formatter)
      return false;
    $name = strtoupper($formatter->format($name));
    $name = str_replace('-', '_', $name);
  }
  $prettyname=strtolower($name);
  $name=str_replace('+', 'P', $name);
  $prettyname=str_replace('+', 'P', $prettyname);
  $name=str_replace('-', 'M', $name);
  $prettyname=str_replace('-', 'M', $prettyname);
  $number++;

  return true;
}

function sysexitvariables($line, &$number, &$name, &$value, &$prettyname) {
  if (preg_match ( '/^#define (EX_\S+)\s+(\d+)/' , $line , $matches)) {
    $name=$matches[1];
    $value=$matches[2];
    $prettyname=strtolower(substr($name,3));
    $number++;
    return true;
  }
  return false;
}

function bashvariables($line, &$number, &$name, &$value, &$prettyname) {
  $name = $line[0];
  $value = $line[1];
  if (sizeof($line) > 2)
    $prettyname = $line[2];
  else
    $prettyname=null;
  $number++;
  return true;
}

class BashGenerator {

  private $lineNumber = 0;

  function open() {
    $this->lineNumber = 0;
    return $this;
  }

  private static function getByLineNumber($number) {
    $signal_start = 7;
    $signal_end = $signal_start +  Killexits::RTMAX + 1;
    if ($number > $signal_start && $number < $signal_end) {
      $num = $number - $signal_start;
      $str=Killexits::statusFromExitCode($num);
      return (array( 'EX_SIGNAL_' . strtoupper($str), $num + 128, $str));
    }
    switch ($number) {
    case 0:
      return  array('EX_OK',0, 'ok');
    case 1:
      return  array('EX_SUCCESS', 0);
    case 2:
      return  array('EX_GENERAL_ERROR', 1, 'General error');
    case 3:
      return  array('EX_MISUSE_OF_BUILTIN', 2, 'Misuse of shell builtins');
    case 4:
      return  array('EX_NO_EXECUTION', 126, 'Command invoked cannot execute');
    case 5:
      return  array('EX_CMD_NOT_FOUND', 127, 'command not found');
    case 6:
      return  array('EX_INVALID', 128, 'Invalid argument');
    case $signal_start:
      return  array('EX_SIGNAL_BASE', 128);
    case $signal_end:
      return  array('EX_SIGNAL_MAX', 192);

    default: return false;
    };

    return false;
  }

  function get() {
    return $this->getByLineNumber($this->lineNumber++);
  }

}

//process('/usr/include/sysexits.h', 'fopen', 'sdj\Sysexits', 'sysexitvariables', $produce);
//process('kill -l', 'popen', 'sdj\Killexits', 'killvariables', $produce);
process(new BashGenerator(), 'class', 'sdj\Bashexits', 'bashvariables', $produce);

/*
//require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/sdj/Sysexits.php';

*/
