<?php
class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    echo 'This is from public controller';
  }
}