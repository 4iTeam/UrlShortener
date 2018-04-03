<?php
namespace ForIt\Base\Support;

use Illuminate\Support\Facades\File;

class Helper
{
    /**
     * Load module's helpers
     */
    public static function autoload($directory)
    {
        $helpers = File::glob($directory . '/*.php');
        foreach ($helpers as $helper) {
            File::requireOnce($helper);
        }
    }


}