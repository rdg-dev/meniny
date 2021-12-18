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
     * Get nameday
     *
     * @param string $format 'xx-yy' xx -> month, yy -> day
     * @return string
     *
     */    
    public static function getNameDay( $val )
    {
        return Nameday::getNameDay( $val );
    } 
}