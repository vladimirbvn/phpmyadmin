<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Table import
 *
 * @package PhpMyAdmin
 */
use PhpMyAdmin\Config\PageSettings;
use PhpMyAdmin\Response;

/**
 *
 */
require_once 'libraries/common.inc.php';

PageSettings::showGroup('Import');

$response = Response::getInstance();
$header   = $response->getHeader();
$scripts  = $header->getScripts();
$scripts->addFile('import.js');

/**
 * Gets tables information and displays top links
 */
require_once 'libraries/tbl_common.inc.php';
$url_query .= '&amp;goto=tbl_import.php&amp;back=tbl_import.php';

require 'libraries/display_import.lib.php';
$response->addHTML(
    PMA_getImportDisplay(
        'table', $db, $table, $max_upload_size
    )
);
