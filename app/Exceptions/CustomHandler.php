<?php
/**
 * CustomHandler.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\SystemLogRepo;

class CustomHandler extends Handler{

    protected $exception;

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        if ($this->shouldReport($e)) {
            app(SystemLogRepo::class)->storeErrorLog($e, app(Request::class));
        }
    }
}