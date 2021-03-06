<?php
/**
 * Elgg JSON output pageshell
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['body']
 */

elgg_set_http_header("Content-Type: application/json;charset=utf-8");

echo $vars['body'];

// backward compatibility
global $jsonexport;
if (isset($jsonexport)) {
	elgg_deprecated_notice("Using \$jsonexport to produce json output has been deprecated", 1.9);
	echo json_encode($jsonexport);
}
