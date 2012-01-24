<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Robert Katzki <robert@katzki.de>
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
 * This ViewHelper counts elements of the specified array or countable object by the passed arguments.
 *
 * 
 * == Arguments ==
 * 
 * subject    -- The Array or Object to count
 * property   -- The name of the field, for example 'title'.
 *               This will count all parts of the array where title matches the value.
 * operator   -- The operator to use.
 *               Possible operators are >, >=, <, <=, <>, !=, !==, =, ==, ===
 * value      -- The value to match.
 *
 * 
 * == Example ==
 * 
 * <bweb:count subject="someBlogPostObject" property="title" operator="==" value="My first Blog Post!" />
 * 
 * This will output 1, depending on the Object.
 * 
 * @package bweb_be
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_BwebBe_ViewHelpers_CountViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Counts the items of a given property and the passed arguments.
	 *
	 * @param array $subject The array or ObjectStorage to iterated over
	 * @param string $property The property of the array or ObjectStorage to limit count
	 * @param string $operator The operator to limit the count
	 * @param string $value The value to match with the operator
	 * @return integer The number of elements
	 */
	public function render($subject = NULL, $property = NULL, $operator = NULL, $value = NULL) {
		if ($subject === NULL) {
			$subject 	= $this->renderChildren();
		}
		if (is_object($subject) && !$subject instanceof Countable) {
			throw new Tx_Fluid_Core_ViewHelper_Exception('CountViewHelper only supports arrays and objects implementing Countable interface. Given: "' . get_class($subject) . '"', 1279808078);
		}

		if ($property === NULL) {
			return count($subject);
		}

		if ($operator === NULL) {
			$operator 	= '!==';
		}

		if ($value === NULL) {
			$value 		= FALSE;
		}

		$counter 		= 0;

		foreach ($subject as $subjectPart) {
			if (is_object($subjectPart)) {
				$subjectPartProperty 	= call_user_func_array( array($subjectPart, 'get' . ucfirst($property)), array());
			} else {
				$subjectPartProperty 	= $subjectPart[$property];
			}

			switch ($operator) {
				case '>':		if ($subjectPartProperty > 		$value) { 	$counter++; } break;
				case '>=':		if ($subjectPartProperty >= 	$value) { 	$counter++; } break;
				case '<':		if ($subjectPartProperty < 		$value) { 	$counter++; } break;
				case '<=':		if ($subjectPartProperty <= 	$value) { 	$counter++; } break;
				case '<>':
				case '!=':		if ($subjectPartProperty != 	$value) { 	$counter++; } break;
				case '!==':		if ($subjectPartProperty !== 	$value) { 	$counter++; } break;
				case '=':
				case '==':		if ($subjectPartProperty == 	$value) { 	$counter++; } break;
				case '===':		if ($subjectPartProperty === 	$value) { 	$counter++; } break;
				default:		if ($subjectPartProperty === 	$value) { 	$counter++; } break;
			}
			
		}

		return $counter;
	}
}

?>

