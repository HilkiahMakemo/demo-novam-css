<?php

/**
 *
 */
trait TreeController
{
  protected $allowed = [];

  function functionName()
  {
    # code...
  }

  public function getAllowed()
  {
    return implode(", ", $this->allowed);
  }
}
