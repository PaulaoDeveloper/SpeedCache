<?php
	namespace SpeedCache;
	/**
	* GetTimeRequest
	*/
	class GetTimeRequest
	{

		public static function getTime(){
			$time = microtime();
			$time = explode(' ',$time);
			$time = substr($time[0].$time[1],0,10);
			return $time;
		}

	}