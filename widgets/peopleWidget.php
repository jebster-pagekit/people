<?php

use Pagekit\Application as App;

return [
    'name' => 'jebster/peopleWidget',

    'label' => 'People',

    'events' => [
        'view.scripts' => function ($event, $scripts) use ($app) {
            $test = 'asdf"';
            $scripts->register('widget-people', 'people:app/bundle/widget-people.js', ['~widgets'], compact('test'));
        }
    ],

    'render' => function ($widget) use ($app) {
        $people = $widget->get('people');

        $departments = App::module('people')->config['departments'];

        foreach ($people as $person) {
            if(isset($person['department']) && key_exists($person['department'], $departments)){
                array_push($departments[$person['department']], $person);
            }
        }

        $settings = $widget->get('settings');

        return $app->view('people/widget/people.php', compact('departments', 'settings'));
    }
];