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

const maintenanceModule = {
	namespaced: true,

	state: {
		list: [],
	},

	mutations: {
		updateList(state, payload) {
			state.list = payload.list;
		},

		delete(state, { id }) {
			const index = state.list.findIndex(task => task.id === id);
			state.list.splice(index, 1);
		},
	},

	actions: {
		async delete({ commit }, { id }) {
			// TODO: check for errors
			// console.log({ task });
			await axios.get(`/tasks/delete/${id}`);

			commit('delete', { id });
		},
	},
};


const store = new Vuex.Store({
	mutations: {
		init(state, { departments, tasks: list, categories }) {
			state.tasks.list = list; //eslint-disable-line
			state.maintenance.departments = departments; //eslint-disable-line
			state.maintenance.categories = categories; //eslint-disable-line
		},
	},

	actions: {
		async init({ commit }) {
			const { data } = await axios.get('/task/list');

			commit('init', {
				tasks: data.tasks.model.tasks,
				departments: data.tasks.model.departments,
				categories: data.tasks.model.categories,
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
