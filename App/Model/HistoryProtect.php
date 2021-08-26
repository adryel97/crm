<?php
namespace App\Model;

use Sinergi\BrowserDetector\Os;
use Sinergi\BrowserDetector\Device;
use Sinergi\BrowserDetector\Browser;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class HistoryProtect
{
    public static function getIp()
    {
        $ip = new GeoIPLocation();
        $ip = $ip->getIp();
        return $ip;
    }
    
    public static function getBrowser()
    {
        $browser = new Browser();
        $browser = $browser->getName();
        return $browser;
    }

    public static function getDevice()
    {
        $device = new Device();
        $device = $device->getName();
        return $device;
    }

    public static function getOperationgSystem()
    {
        $os = new Os();
        $os = $os->getName();
        return $os;
    }
}
