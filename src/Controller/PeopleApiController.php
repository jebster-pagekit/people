<?php

namespace Jebster\People\Controller;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */
class PeopleApiController
{
    public function indexAction(){
        return ['message' => 'success'];
    }


    /**
     * @Route("/departments", methods="GET")
     */
    public function departmentsAction(){
        return array_keys(App::module('people')->config['departments']);
    }

    /**
     * @Route("/departments", methods="POST")
     * @Request({"departments": "array"}, csrf=true)
     */
    public function updateDepartmentsAction($departments = []){
        $newData = [];
        foreach ($departments as $department){
            $newData[$department] = [];
        }
        App::config('people')->set('departments', $newData);
        return ['message' => 'success'];
    }
}
