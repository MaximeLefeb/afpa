<?php

class DateUtility {
    public static function getDiferenceInYears(DateTime $date1, DateTime $date2) : int{
        return $date1->diff($date2)->y;
    }
}