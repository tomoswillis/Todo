export default {
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
};
