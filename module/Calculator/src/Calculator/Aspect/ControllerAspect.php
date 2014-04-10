<?php


namespace Calculator\Aspect;

use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Aop\Aspect;

class ControllerAspect implements Aspect{

    /**
     * @Before("execution(public **->*Action(*))")
     */
    public function beforeAction(MethodInvocation $invocation){
        $action = $invocation->getThis();
        $request = $action->getRequest();
    }
} 