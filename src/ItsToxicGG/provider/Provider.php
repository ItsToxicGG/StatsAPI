<?php

namespace ItsToxicGG\provider;

use ItsToxicGG\provider\database\MysqlProvider;

class Provider {
  
  /** @var DefualtProvider */
  public static $defualt;
    
  /** @var MysqlProvider */
  public static $mysqlpv;
  
  public static function getMysql(): MysqlProvider{
      return self::$mysqlpv;
  }
  
  public static function getYaml(): DefualtProvider{
      return self::$defualt;
  }
}
