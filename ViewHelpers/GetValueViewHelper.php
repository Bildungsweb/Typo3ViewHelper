<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Robert Katzki <robert@katzki.de>
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
 * This ViewHelper gives the value of an multidimensional array specified by key.
 *
 * 
 * == Arguments ==
 * 
 * subject    -- The Array
 * property   -- The key where the value shall match
 * value      -- The value to match.
 *
 * 
 * == Example ==
 * 
 * <bweb:getValue subject="{someBlogPostArray}" property="title" value="My first Blog Post!" />
 * 
 * This will output the matching entry
 * 
 * @package bweb_fe
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_BwebFe_ViewHelpers_GetValueViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Returns the value which matches the arguments
	 *
	 * @param array $subject The array
	 * @param string $property The property of the array
	 * @param string $value The value to match
	 * @return array
	 * @author Robert Katzki <robert@bildungsweb.net>
	 */
	public function render($subject = NULL, $property = NULL, $value = NULL) {
		if ($subject === NULL) {
			$subject 	= $this->renderChildren();
		}

		if ($property === NULL || $property === '' || $value === NULL || $value === '') {
			return $subject[0];
		}

		foreach ($subject as $subjectPart) {
			if (is_object($subjectPart)) {
				// Calls getProperty on the object
				$subjectPartProperty 	= call_user_func_array( array($subjectPart, 'get' . ucfirst($property)), array());
			} else {
				$subjectPartProperty 	= $subjectPart[$property];
			}

			// If the value matches, return the ArrayPart.
			if ($subjectPartProperty == $value) {
				return $subjectPart;
			}
		}

		return array();
	}
}

?>
