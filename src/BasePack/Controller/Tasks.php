<?php
namespace Tasks\BasePack\Controller;

use Prim\Translate;
use Prim\Controller;

use Tasks\BasePack\Model\Project;
use Tasks\BasePack\Model\Task;

class Tasks extends Controller
{

    /**
     * @param int $project_id
     */
    public function index($project_id)
    {
        $project = new Project($this->db);
        $task = new Task($this->db);

        // if we have an id of a project that should be edited
        if (isset($project_id) && is_numeric($project_id)) {
            

            // do getProject() in model/model.php
            $this->addVar('project', $project->getProject($project_id));

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            $this->addVar('tasks', $task->getAllProjectTasks($project_id));

            $this->addVar('project_id', $project_id);

            // load views. within the views we can echo out $project easily
            $this->design('tasks/index');

        } else {
            // redirect user to projects index page (as we don't have a project_id)
            header('location: /tasks/');
        }
    }

    /**
     * ACTION: showTask
     */
    public function showTask($project_id, $task_id)
    {
        $task = new Task($this->db);

        if (isset($project_id) && is_numeric($project_id)) {

            if (isset($task_id) && is_numeric($task_id)) {
                

                // in a real application we would also check if this db entry exists and therefore show the result or
                // redirect the user to an error page or similar

                if($task = $task->getTask($task_id))
                {
                    $this->addVar('task', $task);
                    $this->addVar('project_id', $project_id);
                    $this->addVar('task_id', $task_id);

                    // load views. within the views we can echo out $project easily
                    $this->design('tasks/task');
                } else {
                    // redirect user to projects index page (as we don't have a project_id)
                    header('location: /error/404');
                }



            } else {
                // redirect user to projects index page (as we don't have a project_id)
                header('location: /tasks/'.$project_id);
            }
        } else {
            // redirect user to projects index page (as we don't have a project_id)
            header('location: /projects/');
        }
    }

    /**
     * ACTION: updateTask
     */
    public function updateTask($project_id, $task_id)
    {
        $task = new Task($this->db);

        // if we have POST data to create a new task entry
        if (isset($_POST["submit_update_task"])) {
            // do updateTask() from model/model.php
            $task->updateTask($_POST['name'], $_POST['description'],  $_POST['priority'], $project_id, $task_id);
        }

        // where to go after task has been added
        header('location: /tasks/' . $project_id);
    }

    /**
     * ACTION: addTask
     */
    public function addTask($project_id)
    {
        $task = new Task($this->db);

        // if we have POST data to create a new project entry
        if (isset($_POST['submit_add_task'])) {

            $task->addTask($_POST['name'], $_POST['description'], $_POST['priority'], $project_id);
        }

        // where to go after project has been added
        header('location: /tasks/'.$project_id);
    }

    /**
     * ACTION: deleteTask
     * @param int $task_id Id of the to-delete task
     */
    public function deleteTask($task_id)
    {
        $task = new Task($this->db);

        // if we have an id of a task that should be deleted
        if (isset($task_id)) {
            // do deleteTask() in model/model.php
            $task->deleteTask($task_id);
        }

        // where to go after task has been deleted
        header('location: /tasks/');
    }

    /**
     * ACTION: deleteTask
     * @param int $task_id Id of the to-delete task
     */
    public function doneTask($project_id, $task_id)
    {
        $task = new Task($this->db);

        // if we have an id of a task that should be deleted
        if (isset($task_id)) {
            // do deleteTask() in model/model.php
            $task->doneTask($project_id, $task_id);
        }

        // where to go after task has been deleted
        header('location: /tasks/'.$project_id);
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     */
    public function ajaxGetStats()
    {
        $task = new Task($this->db);

        $amount_of_projects = $task->getAmountOfProjects();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_projects;
    }

}
