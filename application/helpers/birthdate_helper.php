<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('buildDayDropdown'))
{
    function buildDayDropdown($name='')
    {
        $days = range(1, 31);
		$day_list[''] = 'რიცხვი';
        foreach($days as $day)
        {
            $day_list[$day] = $day;
        } 		
        return $day_list;
    }
}	

if ( !function_exists('buildYearDropdown'))
{
	function buildYearDropdown($name='')
    {        
        $years = range(1922, date("Y"));
		$year_list[''] = 'წელი';
        foreach($years as $year)
        {
            $year_list[$year] = $year;
        }    
        
        return $year_list;
    }
}

if (!function_exists('buildMonthDropdown'))
{
    function buildMonthDropdown($name='')
    {
        $month=array(
			''	=>'თვე',
            '01'=>'იანვარი',
            '02'=>'თებერვალი',
            '03'=>'მარტი',
            '04'=>'აპრილი',
            '05'=>'მაისი',
            '06'=>'ივნისი',
            '07'=>'ივლისი',
            '08'=>'აგვისტო',
            '09'=>'სექტემბერი',
            '10'=>'ოქტომბერი',
            '11'=>'ნოემბერი',
            '12'=>'დეკემბერი');
        return $month;
    }
}