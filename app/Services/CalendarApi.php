<?php

namespace App\Services;

use App\Models\Nameday;

class CalendarApi
{
      
    public static function getNameToday()
    {
        $days = ['Pondelok', 'Utorok', 'Streda', 'Štvrtok', 'Piatok', 'Sobota', 'Nedeľa'];
        return $days[date('N') - 1];
    }

    /**
     *
     * Get nameday by date
     *
     * @param string $format 'xx-yy' xx -> month, yy -> day
     * @return string
     *
     */    
    public static function getNameDayByDate( $strDate )
    {
        return Nameday::getNameDayByDate( $strDate );
    } 

    /**
     *
     * Get nameday by name
     *
     * @param string
     * @return Eloquent\Builder
     *
     */     
    public static function searchByName( $searchValue )
    {
        return Nameday::getNameDayByName( $searchValue );
    }

    /**
     *
     * Get month name
     *
     * @param integer $format number month
     * @return string
     *
     */     
    public static function getNameMonth( $numMonth )
    {
        $months = [
            'Január', 'Február', 'Marec', 'Apríl', 
            'Máj', 'Jún', 'Júl', 'August', 'September', 
            'Október', 'November', 'December'
        ];
        return $months[$numMonth - 1];
    }    
}