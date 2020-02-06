export default {
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
			const index = state[type].findIndex(title => title.id === id);

			state[type].splice(index, 1);
		},

		editList(state, { maintenanceObject, type }) {
			const index = state[type].findIndex(title => title.id === maintenanceObject.id); // eslint-disable-line

			state[type].splice(index, 1, maintenanceObject);
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
};
