<?php

namespace Iut\PlanningBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PlanningBundle extends Bundle
{
	public function getParent(){
		return 'FOSUserBundle'; 
	}
}
