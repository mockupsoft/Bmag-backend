<?php

namespace App\Services;

use App\Repositories\NetGsmRpository;

class NetGsmService
{
    private NetGsmRpository $netGsmRepository;

    /**
     * @param NetGsmRpository $netGsmRepository
     */
    public function __construct(NetGsmRpository $netGsmRepository)
    {
        $this->netGsmRepository = $netGsmRepository;
    }

    public function sendSms($user, $message)
    {
        return $this->netGsmRepository->sendSms($user, $message);
    }
}
