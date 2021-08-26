<?php
namespace App\Controller;

use App\Model\HistoryProtect;

class CaptureOperation extends HistoryProtect
{
    public static function captureIp()
    {
        $ip = HistoryProtect::getIp();
        return $ip;
    }

    public static function captureBrowser()
    {
        $browser = HistoryProtect::getBrowser();
        return $browser;
    }

    public static function captureDevice()
    {
        $device = HistoryProtect::getDevice();
        return $device;
    }
    
    public static function captureOperatingSystem()
    {
        $os = HistoryProtect::getOperationgSystem();
        return $os;
    }

    public static function captureAll()
    {
        $ip = CaptureOperation::captureIp();
        $browser = CaptureOperation::captureBrowser();
        $device = CaptureOperation::captureDevice();
        $os = CaptureOperation::captureOperatingSystem();

        echo "$ip - $browser - $device - $os";
    }
}
