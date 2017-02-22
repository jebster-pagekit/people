<template>
    <style>
        .jb-image{
            width: 145px;
            height: 145px;
            margin-bottom: 20.8px;
            overflow: hidden;
        }
    </style>
    <div class="uk-grid pk-grid-large" data-uk-grid-margin>
        <div class="uk-flex-item-1 uk-form-horizontal">
            <h5><i>
                <a href="/admin/people/settings" target="_blank">
                    {{ 'To add more departments go to this link' | trans }}
                </a>
            </i></h5>
            <div class="uk-form-row">
                <label for="form-title" class="uk-form-label">{{ 'Title' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-title" class="uk-form-width-large" type="text" name="title" v-model="widget.title" v-validate:required>
                    <p class="uk-form-help-block uk-text-danger" v-show="form.title.invalid">{{ 'Title cannot be blank.' | trans }}</p>
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-settings-size">{{ 'Image size' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-settings-size" class="uk-form-width-large"
                           type="text" v-model="widget.data.settings.imageSize" placeholder="{{ placeholder.imageSize }}">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-settings-textSize">{{ 'Text size' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-settings-textSize" class="uk-form-width-large"
                           type="text" v-model="widget.data.settings.textSize" placeholder="{{ placeholder.textSize }}">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-settings-textColor">{{ 'Text color' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-settings-textColor" class="uk-form-width-large"
                           type="text" v-model="widget.data.settings.textColor" placeholder="{{ placeholder.textColor }}">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-settings-borderSize">{{ 'Border size' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-settings-borderSize" class="uk-form-width-large"
                           type="text" v-model="widget.data.settings.borderSize" placeholder="{{ placeholder.borderSize }}">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-settings-borderColor">{{ 'Border color' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-settings-borderColor" class="uk-form-width-large"
                           type="text" v-model="widget.data.settings.borderColor" placeholder="{{ placeholder.borderColor }}">
                </div>
            </div>

            <hr />
            <div class="uk-form-row">
                <div v-for="person in widget.data.people" style="float:left;">
                    <input-image-meta :image.sync="person.image" class="jb-image"></input-image-meta><br>
                    <input type="text" v-model="person.name" :placeholder="placeholder.name"><br>
                    <select v-model="person.department" style="width:100%">
                        <option value="" disabled :selected="!person.department" hidden>{{ placeholder.department }}</option>
                        <option v-for="department in departments">
                            {{ department }}
                        </option>
                    </select><br />
                    <input type="text" v-model="person.title" :placeholder="placeholder.title"><br>
                    <input type="text" v-model="person.phone" :placeholder="placeholder.phone"><br>
                    <input type="text" v-model="person.email" :placeholder="placeholder.email"><br>
                    <button @click="removePerson(person)" class="uk-button uk-button-danger">{{ 'Remove Person' | trans }}</button>
                </div>
            </div>

            <br />
            <!-- TODO: No idea why it goes and saves the widget when pressing! -->
            <button @click="addPerson()" class="uk-button uk-button-primary">{{ 'Add Person' | trans }}</button>
        </div>
        <div class="pk-width-sidebar pk-width-sidebar-large">
            <partial name="settings"></partial>

        </div>



    </div>

</template>

<script>
    module.exports = {
        section: {
            label: 'Settings'
        },
        replace: false,
        props: ['widget', 'config', 'form'],
        data() {
            return {
                placeholder: {
                    'name': this.$trans('Name'),
                    'title': this.$trans('Title'),
                    'department': this.$trans('Select department'),
                    'phone': this.$trans('Phone number'),
                    'email': this.$trans('Email address'),

                    'borderSize': '3px',
                    'borderColor': '#D41A1A',
                    'imageSize': '200px',
                    'textColor': '#D41A1A',
                    'textSize': '14px'
                },
                departments: []
            }
        },
        created() {
            this.$options.partials = this.$parent.$options.partials;
            this.widget.data.people = _.merge([], this.widget.data.people);
            this.loadDepartments();
        },

        methods: {
            addPerson: function () {
                this.widget.data.people.push({});
            },
            removePerson: function(person){
                this.widget.data.people.$remove(person);
            },

            loadDepartments: function(){
                this.$http.get('admin/api/people/departments', function (res) {
                    this.departments = res;
                }).error(function(data){
                    UIkit.notify(data, 'danger');
                });
            }
        }
    };
    window.Widgets.components['jebster-people-widget:settings'] = module.exports;
</script>