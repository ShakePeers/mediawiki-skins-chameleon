<?php
/**
 * File holding the PersonalTools class
 *
 * @copyright (C) 2013, Stephan Gambke
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 (or later)
 *
 * This file is part of the MediaWiki extension Chameleon.
 * The Chameleon extension is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The Chameleon extension is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * @ingroup   Skins
 */

namespace skins\chameleon\components;

/**
 * The PersonalTools class.
 *
 * An unordered list of personal tools: <ul id="p-personal" >...
 *
 * @ingroup Skins
 */
class PersonalTools extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		$ret = $this->indent() . '<!-- personal tools -->' .
			   $this->indent() . '<div class="p-personal" id="p-personal" >';

		// include message to a user about new messages on their talkpage
		// TODO: make including the NewTalkNotifier dependent on an option (PREPEND, APPEND, OFF)
		$newtalkNotifier = new NewtalkNotifier( $this->getSkinTemplate(), $this->getIndent() + 2 );

		$ret .= $this->indent( 1 ) . '<ul class="p-personal-tools list-inline pull-right" style="font-size:0.9em;" >';

		$this->indent( 1 );

		// add personal tools (links to user page, user talk, prefs, ...)
		foreach ( $this->getSkinTemplate()->getPersonalTools() as $key => $item ) {
			$ret .= $this->indent() . $this->getSkinTemplate()->makeListItem( $key, $item );
		}

		$ret .= $this->indent( -1 ) . '</ul>' .
				$this->indent() . '<div class="newtalk-notifier pull-left">' . $newtalkNotifier->getHtml() .
				$this->indent() . '</div>' .
				$this->indent( -1 ) . '</div>' . "\n";

		return $ret;
	}

}
