<?php
/**
 * OptionController.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OptionRequest;
use App\Models\SystemOptions;
use App\Repositories\OptionRepository;

class OptionController extends BaseController{


    public function index(OptionRepository $optionRepository){

        $optionList = $optionRepository->optionList();
        return view('admin.option', compact('optionList'));
    }

    public function updateBaseOption(OptionRequest $optionRequest, OptionRepository $optionRepository){

        $result = $optionRepository->update($optionRequest->all());

        if($result){

            return redirect(route('system.base.option.index'))->with('success', '更新成功!');
        }

        return redirect()->back()->withErrors('更新失败!');
    }
}

