<?php
namespace Tasks\Controller;

use Prim\Core\Translate;
use Prim\Core\Controller;

use Tasks\Model\Project;

/**
 * Class Projects
 *
 */
class Projects extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        $project = new Project($this->db);

        $t = new Translate($this->_getTranslation());

        // getting all projects and amount of projects
        $t->projects = $project->getAllProjects();
        $t->amount_of_projects = $project->getAmountOfProjects();

        $this->design('projects/index', $t);
    }

    /**
     * ACTION: addProject
     */
    public function addProject()
    {
        $project = new Project($this->db);

        if (isset($_POST["submit_add_project"])) {

            $project->addProject($_POST['name'], $_POST['description'], $_POST['priority']);
        }

        header('location: ' . URL . 'projects/');
    }

    /**
     * ACTION: deleteProject
     * @param int $project_id Id of the to-delete project
     */
    public function deleteProject($project_id)
    {
        $project = new Project($this->db);

        if (isset($project_id)) {

            $project->deleteProject($project_id);
        }

        // where to go after project has been deleted
        header('location: ' . URL . 'projects/');
    }

    /**
     * ACTION: updateProject
     */
    public function updateProject($project_id)
    {
        $project = new Project($this->db);

        if (isset($_POST['submit_update_project'])) {
            $project->updateProject($_POST['name'], $_POST['description'],  $_POST['priority'], $_POST['project_id']);
        }

        // where to go after project has been added
        header('location: ' . URL . 'projects/'.$project_id);
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     */
    public function ajaxGetStats()
    {
        $project = new Project($this->db);

        $amount_of_projects = $project->getAmountOfProjects();

        echo $amount_of_projects;
    }

}
