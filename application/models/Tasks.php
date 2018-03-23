<?php

class Tasks extends XML_Model {

    private $CI; // use this to reference the CI instance

    public function __construct() {
        parent::__construct(APPPATH . '../data/task.xml');
    }

    protected function load(){
        if (file_exists(realpath($this->_origin))) {

		    $this->xml = simplexml_load_file(realpath($this->_origin));
		    if ($this->xml === false) {
			      // error so redirect or handle error
			      header('location: /404.php');
			      exit;
			}

		    $xmlarray =$this->xml;

		    //if it is empty; 
		    if(empty($xmlarray)) {
		    	return;
		    }

		    //get all xmlonjects into $xmlcontent
		    $rootkey = key($xmlarray);
            $xmlcontent = (object)$xmlarray->$rootkey;

		    //if it is empty; 
		    if(empty($xmlcontent)) {
		    	return;
            }

            $dataindex = 1;
            
            // key fields
            $keyfieldh = array();
            $keyfieldh[] = "id";
            $keyfieldh[] = "task";
            $keyfieldh[] = "priority";
            $keyfieldh[] = "size";
            $keyfieldh[] = "group";
            $keyfieldh[] = "deadline";
            $keyfieldh[] = "status";
            $keyfieldh[] = "flag";

            $this->_fields = $keyfieldh;

            // values
		    foreach ($xmlcontent as $task) {
		    	
		    	//var_dump($task->children());
                $one = new stdClass();

                $one->id = (string)$task['id'];
                $one->task = (string)$task->taskName;
                $one->priority = (string)$task->priority;
                $one->size = (string)$task->size;
                $one->group = (string)$task->group;
                $one->deadline = (string)$task->deadline;
                $one->status = (string)$task->status;
                $one->flag = (string)$task->flag;

                //var_dump($one);

                $this->_data[$dataindex++] = $one; 
                // var_dump(array_values($this->_data));
            }	


		 	//var_dump($this->_data);
		} else {
		    exit('Failed to open the xml file.');
		}

		// --------------------
		// rebuild the keys table
        $this->reindex();
    }

    function getCategorizedTasks()
    {
        // extract the undone tasks
        foreach ($this->all() as $task)
        {
            if ($task->status != 2){
                $undone[] = $task;
            }
        }

        // substitute the category name, for sorting
        foreach ($undone as $task) {
            $task->group = $this->app->group($task->group);
        }
        

        // order them by category
        usort($undone, "orderByCategory");

        // convert the array of task objects into an array of associative objects       
        foreach ($undone as $task) {
            $converted[] = (array) $task;
        }

        return $converted;
    }

    // provide form validation rules
    public function rules()
    {
        $config = array(
            ['field' => 'task', 'label' => 'TODO task', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'priority', 'label' => 'Priority', 'rules' => 'integer|less_than[4]'],
            ['field' => 'size', 'label' => 'Task size', 'rules' => 'integer|less_than[4]'],
            ['field' => 'group', 'label' => 'Task group', 'rules' => 'integer|less_than[5]'],
        );
        return $config;
    }
    
}

// return -1, 0, or 1 of $a's category name is earlier, equal to, or later than $b's
function orderByCategory($a, $b)
{
    if ($a->group < $b->group)
        return -1;
    elseif ($a->group > $b->group)
        return 1;
    else
        return 0;
}   