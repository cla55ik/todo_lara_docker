<?php

namespace App\Http\Controllers;

use App\Services\SessionService\SessionObj;
use App\Services\SessionService\SessionService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestWebController extends Controller
{
    use ResponseTrait;

    private const SESSION_NAME = 'test';

    /**
     * @param Request $request
     * @param SessionService $sessionService
     * @return JsonResponse
     */
    public function setSession(Request $request, SessionService $sessionService): JsonResponse
    {
        $name = $request->get('name');
        $data = $request->get('data');
        $sessionObj = (new SessionObj())->init($name, $data);
        $sessionObj = $sessionService->setSessionData($request, $sessionObj);

        if ($sessionObj->errorMessage){
            return $this->jsonResponse([
                'result' => $sessionObj->errorMessage
            ]);
        }

        return $this->jsonResponse($sessionObj->data);
    }

    /**
     * @param string|null $name
     * @param Request $request
     * @param SessionService $sessionService
     * @return JsonResponse
     */
    public function getSession(?string $name = null, Request $request, SessionService $sessionService): JsonResponse
    {
        $sessionObj = (new SessionObj())->init($name, null);
        $sessionObj = $sessionService->getSessionData($request, $sessionObj);

        if ($sessionObj->errorMessage){
            return $this->jsonResponse([
                'result' => $sessionObj->errorMessage
            ]);
        }

        return $this->jsonResponse($sessionObj->data);
    }
}
