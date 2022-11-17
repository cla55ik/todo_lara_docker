<?php

namespace App\Services\SessionService;

use App\Helpers\HelperInterface;
use App\Helpers\SessionHelper;
use Illuminate\Http\Request;

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

    public function getSessionData(Request $request, SessionObj $sessionObj): SessionObj
    {
        $sessionObj->data = $this->helper->getSession($request, $sessionObj->name);
        $sessionObj->checkError();

        return $sessionObj;
    }

    public function setSessionData(Request $request, SessionObj $sessionObj): SessionObj
    {
        $this->helper->setSession($request, $sessionObj->name, $sessionObj->data);
        return $sessionObj;
    }
}
