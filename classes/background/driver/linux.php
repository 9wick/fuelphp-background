<?php
namespace Background;

class Background_Driver_Linux  extends Background_Driver{
    
    /**
     * command to do of the task
     * @param array $task
     * @return string (ex: php oil r robots) 
     */
    protected function command_of_task(array $task){
        $command = parent::commandOfTask($task);
        $command =  $command . " > /dev/null &";
        return $command;
    }
}