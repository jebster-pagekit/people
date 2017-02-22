<?php $view->script('settings', 'people:app/views/admin/settings.js', 'vue'); ?>


<div id="settings" class="uk-form uk-form-horizontal" v-cloak>
    <div class="uk-grid pk-grid-large" data-uk-grid-margin>
        <div class="pk-width-sidebar">
            <div class="uk-panel">
                <ul class="uk-nav uk-nav-side pk-nav-large" data-uk-tab="{ connect: '#tab-content' }">
                    <li class="uk-active">
                        <a>
                            <i class="pk-icon-large-settings uk-margin-right"></i>
                            {{ 'Departments' | trans }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pk-width-content">
            <ul id="tab-content" class="uk-switcher uk-margin">
                <li>
                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
                        <div data-uk-margin>
                            <h2 class="uk-margin-remove">{{ 'Departments' | trans }}</h2>
                        </div>

                        <div data-uk-margin>
                            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>
                        </div>
                    </div>

                    <div class="uk-form-row" v-for="department in departments">
                        <input v-model="department" class="uk-form-width-large">
                        <button @click="remove(department)" class="uk-button uk-button-danger">{{ 'Remove' | trans }}</button>
                    </div>

                    <div class="uk-form-row">
                        <button @click="add" class="uk-button uk-button-primary">{{ 'Add department' | trans }}</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>