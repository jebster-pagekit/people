$(function(){

    var vm = new Vue({
        el: '#settings',

        data: {
            departments: window.$data.departments,
        },

        methods: {
            add: function(){
                if(this.departments[this.departments.length-1] != '')
                    this.departments.push('');
            },
            remove: function(department){
                this.departments.$remove(department);
            },
            save: function(){
                this.$http.post('/admin/api/people/departments', { departments: this.departments}, function() {
                    UIkit.notify(vm.$trans('Saved'), '');
                }).error(function(data) {
                    UIkit.notify(data, 'danger');
                });
            }

        }
    });
});