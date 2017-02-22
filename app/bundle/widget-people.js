/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(1)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] packages/jebster/people/app/components/widget-people.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(2)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
	if (__vue_template__) {
	__vue_options__.template = __vue_template__
	}
	if (!__vue_options__.computed) __vue_options__.computed = {}
	Object.keys(__vue_styles__).forEach(function (key) {
	var module = __vue_styles__[key]
	__vue_options__.computed[key] = function () { return module }
	})
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  var id = "_v-0e4a1736/widget-people.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 1 */
/***/ function(module, exports) {

	'use strict';

	module.exports = {
	    section: {
	        label: 'Settings'
	    },
	    replace: false,
	    props: ['widget', 'config', 'form'],
	    data: function data() {
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
	        };
	    },
	    created: function created() {
	        this.$options.partials = this.$parent.$options.partials;
	        this.widget.data.people = _.merge([], this.widget.data.people);
	        this.widget.data.config = _.merge({
	            'someSettings': false
	        }, this.widget.data.config);
	        this.loadDepartments();
	    },


	    methods: {
	        addPerson: function addPerson() {
	            this.widget.data.people.push({});
	        },
	        removePerson: function removePerson(person) {
	            this.widget.data.people.$remove(person);
	        },

	        loadDepartments: function loadDepartments() {
	            this.$http.get('admin/api/people/departments', function (res) {
	                this.departments = res;
	            }).error(function (data) {
	                UIkit.notify(data, 'danger');
	            });
	        }
	    }
	};
	window.Widgets.components['jebster-people-widget:settings'] = module.exports;

/***/ },
/* 2 */
/***/ function(module, exports) {

	module.exports = "\n<style>\n    .jb-image{\n        width: 145px;\n        height: 145px;\n        margin-bottom: 20.8px;\n        overflow: hidden;\n    }\n</style>\n<div class=\"uk-grid pk-grid-large\" data-uk-grid-margin>\n    <div class=\"uk-flex-item-1 uk-form-horizontal\">\n        <h5><i>\n            <a href=\"/admin/people/settings\" target=\"_blank\">\n                {{ 'To add more departments go to this link' | trans }}\n            </a>\n        </i></h5>\n        <div class=\"uk-form-row\">\n            <label for=\"form-title\" class=\"uk-form-label\">{{ 'Title' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-title\" class=\"uk-form-width-large\" type=\"text\" name=\"title\" v-model=\"widget.title\" v-validate:required>\n                <p class=\"uk-form-help-block uk-text-danger\" v-show=\"form.title.invalid\">{{ 'Title cannot be blank.' | trans }}</p>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\" for=\"form-settings-size\">{{ 'Image size' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-settings-size\" class=\"uk-form-width-large\"\n                       type=\"text\" v-model=\"widget.data.settings.imageSize\" placeholder=\"{{ placeholder.imageSize }}\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\" for=\"form-settings-textSize\">{{ 'Text size' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-settings-textSize\" class=\"uk-form-width-large\"\n                       type=\"text\" v-model=\"widget.data.settings.textSize\" placeholder=\"{{ placeholder.textSize }}\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\" for=\"form-settings-textColor\">{{ 'Text color' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-settings-textColor\" class=\"uk-form-width-large\"\n                       type=\"text\" v-model=\"widget.data.settings.textColor\" placeholder=\"{{ placeholder.textColor }}\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\" for=\"form-settings-borderSize\">{{ 'Border size' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-settings-borderSize\" class=\"uk-form-width-large\"\n                       type=\"text\" v-model=\"widget.data.settings.borderSize\" placeholder=\"{{ placeholder.borderSize }}\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\" for=\"form-settings-borderColor\">{{ 'Border color' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-settings-borderColor\" class=\"uk-form-width-large\"\n                       type=\"text\" v-model=\"widget.data.settings.borderColor\" placeholder=\"{{ placeholder.borderColor }}\">\n            </div>\n        </div>\n\n        <hr />\n        <div class=\"uk-form-row\">\n            <div v-for=\"person in widget.data.people\" style=\"float:left;\">\n                <input-image-meta :image.sync=\"person.image\" class=\"jb-image\"></input-image-meta><br>\n                <input type=\"text\" v-model=\"person.name\" :placeholder=\"placeholder.name\"><br>\n                <select v-model=\"person.department\" style=\"width:100%\">\n                    <option value=\"\" disabled :selected=\"!person.department\" hidden>{{ placeholder.department }}</option>\n                    <option v-for=\"department in departments\">\n                        {{ department }}\n                    </option>\n                </select><br />\n                <input type=\"text\" v-model=\"person.title\" :placeholder=\"placeholder.title\"><br>\n                <input type=\"text\" v-model=\"person.phone\" :placeholder=\"placeholder.phone\"><br>\n                <input type=\"text\" v-model=\"person.email\" :placeholder=\"placeholder.email\"><br>\n                <button @click=\"removePerson(person)\" class=\"uk-button uk-button-danger\">{{ 'Remove Person' | trans }}</button>\n            </div>\n        </div>\n\n        <br />\n        <!-- TODO: No idea why it goes and saves the widget when pressing! -->\n        <button @click=\"addPerson()\" class=\"uk-button uk-button-primary\">{{ 'Add Person' | trans }}</button>\n    </div>\n    <div class=\"pk-width-sidebar pk-width-sidebar-large\">\n        <partial name=\"settings\"></partial>\n\n    </div>\n\n\n\n</div>\n\n";

/***/ }
/******/ ]);