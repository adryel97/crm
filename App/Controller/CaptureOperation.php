<?php
/**
 * Copyright © Adryel All rights reserved.
 * See COPYING.txt for license details.
 **/

declare(strict_types=1);

namespace App\Controller;

use App\Model\HistoryProtect;

class CaptureOperation extends HistoryProtect
{
    /**
     * @return string
     */
    public static function captureIp()
    {
        $ip = HistoryProtect::getIp();
        return $ip;
    }

    /**
     * @return string
     */
    public static function captureBrowser()
    {
        $browser = HistoryProtect::getBrowser();
        return $browser;
    }


    /**
     * @return string
     */
    public static function captureDevice()
    {
        $device = HistoryProtect::getDevice();
        return $device;
    }

    /**
     * @return string
     */
    public static function captureOperatingSystem()
    {
        $os = HistoryProtect::getOperationgSystem();
        return $os;
    }

    /**
     * @return string
     */
    public static function captureAll()
    {
        $ip = CaptureOperation::captureIp();
        $browser = CaptureOperation::captureBrowser();
        $device = CaptureOperation::captureDevice();
        $os = CaptureOperation::captureOperatingSystem();

        echo "$ip - $browser - $device - $os";
    }
}
