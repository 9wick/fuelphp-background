<?php
namespace Background;

class Background_Driver {
    
    
    /**
     * @var array 
     */
    protected $_tasks = array();
    
    /**
     * @var array 
     */
    protected $_config = array();
    
    
    /**
	 * Driver constructor
	 *
	 * @param	array	$config		driver config
	 */
	public function __construct(array $config)
	{
		$this->config = $config;
	}



    
    /**
     * add task ( oil r $task $args[0] $args[1] ...)
     * 
     * @param string $task
     * @param array|string  $args 
     */
    public function add_task( $task, $args = array()){
        $args = (array)$args;
        $this->_tasks[] = array("task" => $task, "args" => $args);
    }
    
    /**
     * do all task
     *  
     */
    public function run(){
        foreach ($this->_tasks as $task) {
            $this->do_task($task);    
        }
    }
    
    /**
     * do one task
     * @param array $task 
     */
    protected function do_task(array $task){
        $command = $this->command_of_task($task);
        exec($command);
    }
    
    /**
     * path for oil
     * @return string 
     */
    protected function path_for_oil(){
        return " " . trim(realpath(APPPATH . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "oil"));
    }
    
    /**
     * command to do of the task
     * @param array $task
     * @return string (ex: php oil r robots) 
     */
    protected function command_of_task(array $task){
        $command =  \Arr::get($this->config, 'php_path','php') . " " . $this->path_for_oil() . " r ";
        $command .= $task["task"];
        
        foreach ($task['args'] as $arg){
            $command .= " " . trim($arg);
        }
        return $command;        
    }
        
}