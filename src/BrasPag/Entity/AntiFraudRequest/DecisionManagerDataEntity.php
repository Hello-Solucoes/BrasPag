<?php

namespace Alexandreo\Entity\AntiFraudRequest;


use Alexandreo\Contracts\AntiFraudRequest\DecisionManagerDataContracts;
use Alexandreo\Contracts\DecisionManagerData\TravelDataContracts;

/**
 * Class DecisionManagerDataEntity
 * @package BrasPag\Entity\AntiFraudRequest
 */
class DecisionManagerDataEntity implements DecisionManagerDataContracts
{

    /**
     * @var TravelDataContracts
     */
    private $travelData;

    /**
     * @param TravelDataContracts $travelData
     * @return mixed
     */
    public function setTravelData(TravelDataContracts $travelData)
    {
        return $this->travelData = $travelData;
    }


    /**
     * @return TravelDataContracts|array|mixed
     */
    public function getTravelData()
    {
        return $this->travelData ?: array();
    }
}