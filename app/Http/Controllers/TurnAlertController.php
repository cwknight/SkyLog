<?php

namespace App\Http\Controllers;

use App\Services\TurnAlertService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TurnAlertController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const AUTH_KEY = 'eBk6ZCjRndamZ0kXgMA0yVRGxNLANkFX';
    private $turnAlertService;

    public function __construct(TurnAlertService $turnAlertService)
    {
        $this->turnAlertService = $turnAlertService;
    }

    public function index()
    {
        $turns = $this->turnAlertService->findLatestTurns();
        return view('turn_alert', ['turns' => $turns]);

    }

    public function updateTurn($key, Request $request)
    {
        if ($key == self::AUTH_KEY) {
            $this->turnAlertService->updateTurn($request->json());
        }
    }
}
