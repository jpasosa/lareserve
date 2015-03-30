<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Genera un código alfanúmerico aleatorio
 * Le saqué números o alfas que pueden dar a confusión, por ejemplo el o o el 0.
 * @author 	Juan Pablo Sosa 	jpasosa@gmail.com
 * @access	public
 * @param		void
 * @return		string 		el código generado
 */
if ( ! function_exists('generate_code'))
{
	function generate_code()
	{
	    $an = "123456789ABCDEFGHKLMNPQRSTUVWXYZ";
	    $su = strlen($an) - 1;
	    $code = substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1);
		return $code;
	}
}