<?php

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Declares new variables which are aliases of other variables.
 * Takes a "key"-Parameter which is an variable to use in the <alias>-tags and a "value"-Parameter
 * which is mapped to the key.
 *
 * The variables are only declared inside the <f:alias>...</f:alias>-tag. After the
 * closing tag, all declared variables are removed again.
 *
 * = Examples =
 *
 * <code title="Single alias">
 * <f:alias key="x" value="foo">{x}</f:alias>
 * </code>
 * <output>
 * foo
 * </output>
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @api
 */
class Tx_BwebFe_ViewHelpers_AliasViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 *
	 * @param string $key Where the value is mapped to
	 * @param string $value The Value that is mapped to the key
	 * @return string Rendered string
	 * @author Robert Katzki <robert@bildungsweb.net>
	 * @api
	 */
	public function render($key, $value) {
		$this->templateVariableContainer->add($key, $value);
		$output = $this->renderChildren();
		$this->templateVariableContainer->remove($key);
		return $output;
	}
}

?>
