<?php
$this->get('/', '\Tasks\BasePack\Controller\Home', 'index');

// Projects
$this->addRoute(['GET', 'POST'], '/projects', '\Tasks\BasePack\Controller\Projects', 'index');
$this->get('/projects/deleteproject/{id:\d+}', '\Tasks\BasePack\Controller\Projects', 'deleteProject');
$this->post('/projects/updateproject/{id:\d+}', '\Tasks\BasePack\Controller\Projects', 'updateProject');

// Tasks
$this->get('/tasks/{id:\d+}', '\Tasks\BasePack\Controller\Tasks', 'index');
$this->get('/tasks/updatetask/{id_project:\d+}/{id_task:\d+}', '\Tasks\BasePack\Controller\Tasks', 'showTask');
$this->post('/tasks/updatetask/{id_project:\d+}/{id_task:\d+}', '\Tasks\BasePack\Controller\Tasks', 'updateTask');
$this->post('/tasks/addtask/{id:\d+}', '\Tasks\BasePack\Controller\Tasks', 'addTask');
$this->get('/tasks/deletetask/{id:\d+}', '\Tasks\BasePack\Controller\Tasks', 'deleteTask');
$this->get('/tasks/donetask/{id_project:\d+}/{id_task:\d+}', '\Tasks\BasePack\Controller\Tasks', 'doneTask');