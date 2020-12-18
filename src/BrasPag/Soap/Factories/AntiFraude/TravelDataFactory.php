<?php

namespace Alexandreo\Soap\Factories\AntiFraude;

use Alexandreo\Contracts\DecisionManagerData\TravelDataContracts;
use stdClass;

/**
 * Class TravelDataFactory
 * @package Alexandreo\Soap\Factories\AntiFraude
 */
class TravelDataFactory
{

    /**
     * @var TravelDataContracts
     */
    private $travelData;

    /**
     * TravelDataFactory constructor.
     * @param TravelDataContracts $travelData
     */
    function __construct(TravelDataContracts $travelData)
    {
        $this->travelData = $travelData;
    }

    /**
     * @return stdClass
     */
    public function make()
    {
        $travelData = new stdClass;
        $travelData->CompleteRoute = $this->travelData->getCompleteRoute();
        $travelData->DepartureDateTime = date('c', strtotime($this->travelData->getDepartureDateTime()));
        $travelData->JourneyType = $this->travelData->getJourneyType();
        $travelData->TravelLegDataCollection = $this->makeTravelLegDataCollection();

        return $travelData;
    }


    /**
     * @return stdClass
     */
    private function makeTravelLegDataCollection()
    {
        $travelLegDataCollection = new stdClass;
        $travelLegDataEntity = $this->travelData->getTravelLegDataCollection();
        if (!is_null($travelLegDataEntity) && !is_null($travelLegDataEntity->getTravelLegData())) {
            $travelLegDatas = $this->travelData->getTravelLegDataCollection()->getTravelLegData();
            foreach ($travelLegDatas as $travelLegData){
                $travelLegDataCollection->TravelLegDataCollection[] = (new TravelLegDataFactory($travelLegData))->make();
            }
        }
        return $travelLegDataCollection;
    }

}