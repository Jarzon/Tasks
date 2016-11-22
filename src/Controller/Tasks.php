<?php
namespace Tasks\Controller;

use Prim\Translate;
use Prim\Controller;

use Tasks\Model\Project;
use Tasks\Model\Task;

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
            $t = new Translate($this->_getTranslation());

            // do getProject() in model/model.php
            $t->project = $project->getProject($project_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            $t->tasks = $task->getAllProjectTasks($project_id);

            $t->project_id = $project_id;

            // load views. within the views we can echo out $project easily
            $this->design('tasks/index', $t);

        } else {
            // redirect user to projects index page (as we don't have a project_id)
            header('location: ' . URL . 'tasks/');
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
                $t = new Translate($this->_getTranslation());

                // in a real application we would also check if this db entry exists and therefore show the result or
                // redirect the user to an error page or similar

                if($t->task = $task->getTask($task_id))
                {
                    $t->project_id = $project_id;
                    $t->task_id = $task_id;

                    // load views. within the views we can echo out $project easily
                    $this->design('tasks/task', $t);
                } else {
                    // redirect user to projects index page (as we don't have a project_id)
                    header('location: ' . URL . 'error/404');
                }



            } else {
                // redirect user to projects index page (as we don't have a project_id)
                header('location: ' . URL . 'tasks/'.$project_id);
            }
        } else {
            // redirect user to projects index page (as we don't have a project_id)
            header('location: ' . URL . 'projects/');
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
        header('location: ' . URL . 'tasks/'.$project_id);
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
        header('location: ' . URL . 'tasks/'.$project_id);
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
        header('location: ' . URL . 'tasks/');
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
        header('location: ' . URL . 'tasks/'.$project_id);
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
