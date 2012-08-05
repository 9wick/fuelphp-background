<?php

namespace Background;

class Background {
    
	/**
	 * Driver config defaults.
	 */
	protected static $_defaults = NULL;
    
    
    /**
	 * Init, config loading.
	 */
	public static function _init(){
        if(static::$_defaults == NULL){
            \Config::load('background', true);
            static::$_defaults = \Config::get('background.defaults');
        }
	}
    
    
  /**
   *
   * @return \Background\Background_Driver
   * @throws \FuelException 
   */
    public static function forge($setup = null, $config = array()){
        static::_init();
        
        empty($setup) and $setup = \Config::get('background.default_setup', 'default');
		is_string($setup) and $setup = \Config::get('background.setups.'.$setup, array());
        
		
		$setup = \Arr::merge(static::$_defaults, $setup);
		$config = \Arr::merge($setup, $config);
        $driver = '\\Background_Driver_' . ucfirst(strtolower(self::os_category()));
		
		if( ! class_exists($driver, true)){
			throw new \FuelException('Could not find Background driver:  ('.$driver.')');
		}
		
		$driver = new $driver($config);
				
		return $driver;
                
    }
    
    /**
     *
     * @return string  category of os
     */
    public static function os_category(){

        if(PHP_OS == 'WINNT' || PHP_OS == "WIN32" ){
            return "Windows";            
        }
        
        //Linux
        //MacOS
        //AIX
        //Darwin
        //SunOS
        return "Linux";            
        
        
        
    }
        
}