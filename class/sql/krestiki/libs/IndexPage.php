<?php

class IndexPage extends Page
{
	
	public function __construct()
	{
		$this->set_tpl("index");
		
		$this->vars['title'] = "Index Page";
		$this->vars['form'] = "";
		$this->vars['results'] = "my results";
	}
	
	
}

/*
class User
{
	private $name;
	
	public function getName()
	{
		return $this->name;
	}
}

$User = new User;
echo $User->getName();
*/






