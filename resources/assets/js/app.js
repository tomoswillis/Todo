/* eslint-disable no-new */

import Vue from 'vue';
import Vuex from 'vuex';
import svg4everybody from 'svg4everybody';

import './bootstrap';
import lang from './i18n';

import maintenance from './modules/maintenance';
import tasks from './modules/tasks';

import Task from './components/tasks/task';
import Maintenance from './components/maintenance/maintenance';

Vue.use(Vuex);

Vue.filter('trans', (...args) => lang.get(...args));

const store = new Vuex.Store({
	mutations: {
		init(state, { departments, tasks: list }) {
			state.tasks.list = list; //eslint-disable-line
			state.maintenance.departments = departments; //eslint-disable-line
		},
	},

	actions: {
		async init({ commit }) {
			const { data } = await axios.get('/task/list');

			commit('init', {
				tasks: data.tasks.model.tasks,
				departments: data.tasks.model.departments,
			});
		},
	},

	modules: {
		maintenance,
		tasks,
	},
});

new Vue({
	el: '#app',
	store,

	// Local
	components: {
		Task,
		Maintenance,
	},

	mounted() {
		svg4everybody();

		this.$store.dispatch('init');
	},
});
