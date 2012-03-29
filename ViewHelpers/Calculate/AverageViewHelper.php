<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Robert Katzki <robert@bildungsweb.net>
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
 * This ViewHelper calculates the average value of the passed array.
 *
 * == Arguments ==
 * 
 * values     -- The Array with all the values
 *
 * 
 * == Exampled ==
 * 
 * <bweb:calculate.average values="{0: 100, 1: 200}" />
 * This will output 150.
 * 
 * <bweb:calculate.average field="number" values="{0: {'name': 'Some name', 'number': 300}, 1: {'name': 'Some other name', 'number': 500}}" />
 * This will output 400.
 * 
 * @package bweb_fe
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_BwebFe_ViewHelpers_Calculate_AverageViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Calculate the average of the array values
	 *
	 * @param array $values The array with the values to calculate the average of
	 * @param string $field The field name of the multidimensional array.
	 * @return integer
	 */
	public function render($values = NULL, $field = NULL) {
		$sum 		= 0;
		foreach ($values as $value) {
			if ($field === NULL) {
				$sum 	+= intval($value);
			} else {
				$sum 	+= intval($value[$field]);
			}
		}

		$average 	= $sum / count($values);

		return $average;
	}
}

?>
