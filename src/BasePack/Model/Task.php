<?php
namespace Tasks\BasePack\Model;

class Task extends \Prim\Model
{
    public function getAllProjectTasks($project_id)
    {
        $sql = "SELECT id, name, description, priority, status FROM task WHERE project_id = :project_id ORDER BY status ASC, priority DESC";
        $query = $this->db->prepare($sql);

        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function get($task_id)
    {
        $sql = "SELECT name, description, priority FROM task WHERE id = ?";
        $query = $this->prepare($sql);

        $query->execute([$task_id]);

        return $query->fetch();
    }

    public function add(array $values)
    {
        return $this->insert('task', $values);
    }

    public function change($values, $project_id, $task_id)
    {
        return $this->update('task', $values, 'id = ? AND project_id = ?', [$task_id, $project_id]);
    }

    /**
     * Get a project from database
     */
    public function getProject($task_id)
    {
        $sql = "SELECT id, name, description, priority FROM task WHERE id = :task_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Delete a task in the database
     * @param int $task_id Id of task
     */
    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM task WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id);

        $query->execute($parameters);
    }

    /**
     * Mark a task as done
     * @param int $task_id Id of task
     */
    public function doneTask($project_id, $task_id)
    {
        $sql = "UPDATE task SET status = 1 WHERE id = :task_id AND project_id = :project_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id, ':project_id' => $project_id);

        $query->execute($parameters);
    }
}