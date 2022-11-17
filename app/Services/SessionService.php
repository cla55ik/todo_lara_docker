<?php

namespace App\Services;

use App\Helpers\HelperInterface;
use App\Helpers\SessionHelper;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class SessionService
{
    /**
     * @param SessionHelper $helper
     */
    public function __construct(
        private HelperInterface $helper
    )
    {
    }

    public function getSession(Request $request, string $name): mixed
    {
        return $this->helper->getSession($request, $name);
    }
}
