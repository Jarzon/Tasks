<?php
namespace Tasks\BasePack\Controller;

use Prim\Controller;

use Jarzon\Forms;

use Tasks\BasePack\Model\Project;

/**
 * Class Projects
 *
 */
class Projects extends Controller
{
    public function getForms() {
        $forms = new Forms($_POST);

        return $forms
        ->text('name')->label('Name')->required()
        ->text('description')->label('Description')->required()
        ->number('priority')->label('Priority')->required();
    }

    public function index()
    {
        /** @var Project $project */
        $project = $this->getModel('Project');

        $forms = $this->getForms();

        if(isset($_POST['submit_add_project'])) {
            try {
                $values = $forms->verification();
            }
            catch (\Exception $e) {
                $this->addVar('message', ['alert', $e->getMessage()]);
            }

            if(isset($values)) {
                $project->add($values);

                $this->addVar('message', ['ok', 'The project have been added']);
            }
        }

        $this->design('projects/index', 'BasePack', [
            'projects' => $project->getAllProjects(),
            'forms' => $forms->getForms()
        ]);
    }

    public function updateProject($project_id)
    {
        /** @var Project $project */
        $project = $this->getModel('Project');

        $forms = $this->getForms();

        if (isset($_POST['submit_update_project'])) {
            try {
                $values = $forms->verification();
            }
            catch (\Exception $e) {
                $this->addVar('message', ['alert', $e->getMessage()]);
            }

            if(isset($values)) {
                $project->change($values, $project_id);

                $this->addVar('message', ['ok', 'The statement have been added']);
            }




        }

        $this->redirect("/tasks/$project_id");
    }

    public function deleteProject($project_id)
    {
        /** @var Project $project */
        $project = $this->getModel('Project');

        if (isset($project_id)) {

            $project->delete($project_id);
        }

        header('location: /projects/');
    }
}
