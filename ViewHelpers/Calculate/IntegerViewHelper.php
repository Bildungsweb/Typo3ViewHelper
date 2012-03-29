<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Robert Katzki <robert@bildungsweb.net>, Bildungsweb Media GmbH
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package bweb_fe
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_BwebFe_ViewHelpers_Calculate_IntegerViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * Check a value being an integer
	 *
	 * @param integer $x The checked value	 
	 * @validate $x IntegerValidator	 
	 * @return boolean 
	 */
	public function render($x) {
		// Überprüfe ob ein Komma vorhanden ist. Wenn ja gib TRUE zurück. Wir wollen nur Zahlen ohne Komma.
		if(strstr($x, ".")) {
			$x = TRUE;
		} else {
			$x = FALSE;
		}
		
		return $x;
	}
}

?>