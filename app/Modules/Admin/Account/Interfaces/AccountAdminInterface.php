<?php

namespace App\Modules\Admin\Account\Interfaces;
use Illuminate\Http\Request;

/**
 * Interface AccountAdminInterface
 *
 * @package App\Modules\Admin\Account\Interfaces
 */
interface AccountAdminInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function login(Request $request): mixed;
}
