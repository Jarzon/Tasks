<?php
$router->get('/', ['\Tasks\Controller\Home', 'index']);

// Projects
$router->get('/projects', ['\Tasks\Controller\Projects', 'index']);
$router->post('/projects/addproject', ['\Tasks\Controller\Projects', 'addProject']);
$router->get('/projects/deleteproject/{id:\d+}', ['\Tasks\Controller\Projects', 'deleteProject']);
$router->post('/projects/updateproject/{id:\d+}', ['\Tasks\Controller\Projects', 'updateProject']);

// Tasks
$router->get('/tasks/{id:\d+}', ['\Tasks\Controller\Tasks', 'index']);
$router->get('/tasks/updatetask/{id_project:\d+}/{id_task:\d+}', ['\Tasks\Controller\Tasks', 'showTask']);
$router->post('/tasks/updatetask/{id_project:\d+}/{id_task:\d+}', ['\Tasks\Controller\Tasks', 'updateTask']);
$router->post('/tasks/addtask/{id:\d+}', ['\Tasks\Controller\Tasks', 'addTask']);
$router->get('/tasks/deletetask/{id:\d+}', ['\Tasks\Controller\Tasks', 'deleteTask']);