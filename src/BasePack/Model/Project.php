<?php
namespace Tasks\BasePack\Model;

class Project extends \Prim\Model
{
    public function getAllProjects()
    {
        $query = $this->prepare("SELECT id, name, description, priority FROM project ORDER BY priority DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function add(array $values)
    {
        return $this->insert('project', $values);
    }

    public function get($project_id)
    {
        $query = $this->prepare("SELECT id, name, description, priority FROM project WHERE id = ? LIMIT 1");

        $query->execute([$project_id]);

        return $query->fetch();
    }

    public function change(array $values, int $project_id)
    {
        return $this->update('project', $values, 'id = ?', $project_id);
    }

    public function delete($project_id)
    {
        $query = $this->prepare("DELETE FROM project WHERE id = :project_id");
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
    }
}