<?php


namespace Calculator\Aspect;

use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Aop\Aspect;

class EchoAspect implements Aspect{


    /**
     * @Before("execution(public **->execute(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation){
        echo get_class($invocation->getThis()) . " Started at". $this->printTimeWithMicroSeconds()  ."<br/>";
    }

    /**
     * @After("execution(public **->execute(*))")
     */
    public function aMethodExecution(MethodInvocation $invocation){
        $now = new \DateTime();
        echo get_class($invocation->getThis()) . " Finished at". $this->printTimeWithMicroSeconds()  ."<br/>";
    }

    private function printTimeWithMicroSeconds(){
        list($usec, $sec) = explode(' ', microtime());
        return date('Y-m-d H:i:s', $sec) . $usec;
    }

} 