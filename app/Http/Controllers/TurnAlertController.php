<?php

namespace App\Http\Controllers;

use App\Services\TurnAlertService;
use App\Turn;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TurnAlertController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

    public function updateTurn(Request $request, $key)
    {
        if ($key == self::AUTH_KEY) {
            $this->turnAlertService->updateTurn($request);
        }
    }
}
