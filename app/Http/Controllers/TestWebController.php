<?php

namespace App\Http\Controllers;

use App\Services\SessionService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestWebController extends Controller
{
    use ResponseTrait;

    private const SESSION_NAME = 'test';

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function setSession(Request $request): JsonResponse
    {
        $session = $request->session();
//        $sessionHelper = app('sessionHelper');
        $session->put(self::SESSION_NAME, 'testData');

        return $this->jsonResponse([
            'result' => true
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSession(Request $request, SessionService $sessionService): JsonResponse
    {
        $session = $request->session();
        $sessionService->getSession($request, self::SESSION_NAME);

        if (!$session->has(self::SESSION_NAME)){
            return $this->jsonResponse([
                'session not found'
            ]);
        }

        return $this->jsonResponse($session->get(self::SESSION_NAME));
    }
}
