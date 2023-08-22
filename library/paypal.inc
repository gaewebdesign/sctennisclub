<?php
/*


function onLINE(){

   if ( !isset($_SERVER["SERVER_NAME"] )){
     DEBUG("COMMAND LINE");
     return false;

   }

  $ret = true;
  if ( array_key_exists( "SERVER_NAME" , $_SERVER) && $_SERVER["SERVER_NAME"]=="localhost"){
    DEBUG("LOCALHOST");
    $ret = false;
  }

  DEBUG("ONLINE");
  return $ret;

}
*/
// ******************************

class paypal{

	var $logfile='ipnlog.txt';
	var $form=array();
	var $log=0;
	var $form_action='https://www.paypal.com/cgi-bin/webscr';
	var $paypalurl='www.paypal.com';
	var $type='payment';
	var $posted_data=array();
	var $action='';
	var $error='';
	var $ipn='';
	var $price=0;
	var $payment_success=0;
	var $ignore_type=array();

    function add($name,$value)
	{
		$this->form[$name]=$value;
	}

    function remove($name)
	{
		unset($this->form[$name]);
	}

    function enable_payment()
	{
		$this->type='payment';
		$this->remove('t3');
		$this->remove('p3');
		$this->remove('a3');
		$this->remove('src');
		$this->remove('sra');
		$this->add('amount',$this->price);
		$this->add('cmd','_xclick');
		$this->add('no_note',1);
		$this->add('no_shipping',1);
		$this->add('currency_code','USD');
		$this->add('notify_url',$this->ipn);
	}
 

    function output_form()
	{

		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'
		. '<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Redirecting to PayPal...</title></head>'
		.'<body onload="document.f.submit();"><h3>Redirecting to PayPal...</h3>'
		. '<form name="f" action="'.$this->form_action.'" method="post">';

		foreach($this->form as $k=>$v)
		{
			echo '<input type="hidden" name="' . $k . '" value="' . $v . '" />';
		}

		//echo '<input type="submit" value="Click here if you are not redirected within 10 seconds" /></form></body></html>';


	}   
    }

?>