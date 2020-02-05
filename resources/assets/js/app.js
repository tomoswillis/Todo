/* eslint-disable no-new */

import Vue from 'vue';
import Vuex from 'vuex';
import svg4everybody from 'svg4everybody';

import './bootstrap';
import lang from './i18n';

import Task from './components/tasks/task';
import Maintenance from './components/maintenance/maintenance';

Vue.use(Vuex);

Vue.filter('trans', (...args) => lang.get(...args));

const store = new Vuex.Store({
	modules: {
		tasks: {
			namespaced: true,

			state: {
				list: [],
			},

			mutations: {
				updatelist(state, payload) {
					state.list = payload.list; //eslint-disable-line
				},

				delete(state, { id }) {
					const index = state.list.findIndex(task => task.id === id);
					state.list.splice(index, 1);
				},

				addToList(state, { task }) {
					state.list.push(task);
				},

				editList(state, { task }) {
					const index = state.list.findIndex(list => list.id === task.id);
					state.list.splice(index, 1, task);
				},
			},

			actions: {
				async push({ commit }, { task }) {
					// TODO: check for errors
					const response = await axios.post('/task/store', task);

					commit('addToList', { task: response.data.task });
				},

				async edit({ commit }, { task }) {
					// TODO: check for errors
					// console.log({ task });
					const response = await axios.post(`/task/edit/${task.id}`, task);

					commit('editList', { task: response.data.task });
				},

				async delete({ commit }, { id }) {
					// TODO: check for errors
					// console.log({ task });
					await axios.get(`/tasks/delete/${id}`);

					commit('delete', { id });
				},
			},
		},

		maintenance: {
			namespaced: true,

			state: {
				categories: [],
				departments: [],
			},

			mutations: {
				updatelist(state, payload) {
					state.categories = payload.list.categories; //eslint-disable-line
					state.departments = payload.list.departments; //eslint-disable-line
				},

				addToList(state, { data, type }) {
					state[type].push(data);
				},

				delete(state, { id, type }) {
					const index = store.state.maintenance[type].findIndex(title => title.id === id);
					store.state.maintenance[type].splice(index, 1);
				},

				editList(state, { maintenanceObject, type }) {
					const index = store.state.maintenance[type].findIndex(title => title.id === maintenanceObject.id);//eslint-disable-line
					store.state.maintenance[type].splice(index, 1, maintenanceObject);
				},
			},

			actions: {
				async push({ commit }, { title, type }) {
					const stateNames = {
						categories: 'category',
						departments: 'department',
					};

					const response = await axios.post(`/${stateNames[type]}/store`, { title });

					commit('addToList', {
						data: response.data[stateNames[type]],
						type,
					});
				},

				async delete({ commit }, { id, type }) {
					const stateNames = {
						categories: 'category',
						departments: 'department',
					};
					await axios.get(`/${stateNames[type]}/delete/${id}`);
					commit('delete', { id, type });
				},

				async edit({ commit }, { maintenanceObject, type }) {
					const stateNames = {
						categories: 'category',
						departments: 'department',
					};
					const response = await axios.post(`/${stateNames[type]}/edit/${maintenanceObject.id}`, maintenanceObject);

					commit('editList', { maintenanceObject: response.data[stateNames[type]], type });
				},
			},
		},
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
	},
});
