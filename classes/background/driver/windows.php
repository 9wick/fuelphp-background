<?php

namespace Background;

class Background_Driver_Windows extends Background_Driver {

    /**
     * do one task
     * @param array $task 
     */
    protected function do_task(array $task){
        $command = $this->command_of_task($task);
        $fp= popen($command,"r");
        pclose($fp);
    }
    
    /**
     * command to do of the task
     * @param array $task
     * @return string (ex: php oil r robots) 
     */
    protected  function command_of_task(array $task) {

        $command = parent::command_of_task($task);
        $command = "start /B cmd /c \" " . $command . " \" ";
        
        return $command;        
    }

}