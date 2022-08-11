<?php

namespace ItsToxicGG\provider;

use ItsToxicGG\provider\database\MysqlProvider;

class Provider {
  
  /** @var DefualtProvider */
  public $defualt;
    
  /** @var MysqlProvider */
  public $mysqlpv;
  
  public function getMysql(): MysqlProvider{
      return new MysqlPrvovider();
  }
  
  public function getYaml(): DefualtProvider{
      return new DefualtProvider();
  }
}
