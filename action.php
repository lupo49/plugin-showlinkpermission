<?php
/**
 * showlinkpermission - Changes the color of internal link if the user has no read permissions
 *
 * @license GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author Matthias Schulte <dokuwiki@lupo49.de>
 */
 
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class action_plugin_showlinkpermission extends DokuWiki_Action_Plugin {

	function register(&$controller) {
		$controller->register_hook('PARSER_CACHE_USE', 'BEFORE',  $this, '_purgecache');
	}

	/**
	 * Always purge cache.
	 */
	function _purgecache(&$event, $param) {
        $event->preventDefault();
		$event->stopPropagation();
		$event->result = false;
	}
}
