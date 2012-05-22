<?php
/**
 * Utils helper class.
 *
 *
 * @package    Core
 * @author     damiles extracted from php.net
 * @copyright  Damiles. David Millan Escriva
 * @license    gpl
 */
class Utiles {
    /**
     * Retunr a formated size
     *
     * @param int $bytes
     * @param int $precision default = 2
     * @return string
     */
    public static function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }


} // End utils