<?php

namespace Jebster\People\Controller;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */
class PeopleController
{
    public function indexAction(){
        return ['message' => 'success'];
    }

    public function settingsAction(){
        echo "";
        return [
            '$view' => [
                'title' => __("Department Settings"),
                'name' => 'people:views/admin/settings.php'
            ],
            '$data' => [
                'departments' => array_keys(App::module('people')->config['departments'])
            ]
        ];
    }
}
