<?php

// General singleton class.
class Singleton_Class {
  // Hold the class instance.
  private static $instance = null;
  
  // The constructor is private
  // to prevent initiation with outer code.
  private function __construct()
  {
    // The expensive process (e.g.,db connection) goes here.
  }
 
  // The object is created from within the class itself
  // only if the class has no instance.
  public static function getInstance()
  {
    if (self::$instance == null)
    {
      self::$instance = new Singleton_Class();
    }
 
    return self::$instance;
  }



  // 
  private function __clone(){}
  private function __wakeup(){}
}

/* 


  ? or try this!
  @link https://www.polynique.com/coding/extending-singleton-in-php-to-avoid-boilerplate-code/


*/

/**
 * Original Singleton class
 */
abstract class Singleton {

  /**
   * Any Singleton class.
   *
   * @var Singleton[] $instances
   */
  private static $instances = array();

  /**
   * Consctruct.
   * Private to avoid "new".
   */
  private function __construct() {
  }

  /**
   * Get Instance
   *
   * @return Singleton
   */
  final public static function get_instance() {
    $class = get_called_class();

    if ( ! isset( $instances[ $class ] ) ) {
      self::$instances[ $class ] = new $class();
    }

    return self::$instances[ $class ];
  }

  /**
   * Avoid clone instance
   */
  private function __clone() {
  }

  /**
   * Avoid serialize instance
   */
  private function __sleep() {
  }

  /**
   * Avoid unserialize instance
   */
  private function __wakeup() {
  }
}

?>