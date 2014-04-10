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
        $this->logTime($invocation," Started at ");
    }

    /**
     * @After("execution(public **->execute(*))")
     */
    public function aMethodExecution(MethodInvocation $invocation){
        $this->logTime($invocation," Finished at ");
    }

    private function getTimeWithMicroSeconds(){
        list($usec, $sec) = explode(' ', microtime());
        return date('Y-m-d H:i:s', $sec) . $usec;
    }

    private function logTime(MethodInvocation $invocation, $message) {
        echo get_class($invocation->getThis()) . $message . $this->getTimeWithMicroSeconds() . "<br/>";
    }

} 