<template>
	<div>
		<showToday
			:tasks="dueTodayList"
			:departments="departments"
		/>
		<div
			class="
			e-container
			width-holder
			center tasks
			tasks--bg
			tasks--shadow
			text-white
			rounded-xl
			pb-2
			relative"
		>
			<div
				class="
				font-semibold
				inline-block
				px-6
				py-2
				tasks
				tasks--tab-title
				tasks--tab-title--form
				text-lg
				w-40"
			>
				<h6>Your Tasks</h6>
			</div>

			<div class="flex pb-10 pt-10">
				<div>
					<select name="" class=" tasks tasks--transparent-bg py-2 px-5">
						<option value="#">
							Ascending
						</option>
						<option value="#">
							Descending
						</option>
					</select>
				</div>

				<div class="">
					<select name="" class=" tasks tasks--transparent-bg py-2 px-5 ml-2">
						<option value="#">
							Filter
						</option>
						<option value="#">
							Descending
						</option>
					</select>
				</div>

				<div class="">
					<select name="" class=" tasks tasks--transparent-bg py-2 px-5 ml-2">
						<option value="#">
							Filter
						</option>
						<option value="#">
							Descending
						</option>
					</select>
				</div>
			</div>

			<div
				v-for="task in $data.list"
				:key="task.id"
			>
				<showToday
					v-if="(task.due_date === $props.today)"
				/>

				<edit
					:task="task"
					:action="'/task/edit/' + task.id"
					:departments="departments"
					@delete="deleteTask"
				/>
			</div>
		</div>
		<add-Task
			:action="'/task/store'"
		/>
	</div>
</template>

<script>
	import Edit from './edit';
	import addTask from './add-task';
	import showToday from './show-today';

	export default {
		components: {
			Edit,
			addTask,
			showToday,
		},

		props: {
			departments: {
				type: Array,
				required: true,
			},

			initialList: {
				type: Array,
				required: true,
			},

			// today: {
			// 	type: Array,
			// 	required: true,
			// },
		},

		data() {
			return {
				list: this.$props.initialList.map(task => ({
					...task,
					editing: false,
				})),

				// bar: this.$props.today.map(task => ({
				// 	...task,
				// })),
			};

		},

		computed: {
			// footest() {
			// 	return this.$data.bar.map(task => ({
			// 		...task,
			// 	}));
			// },

			dueTodayList() {
				return this.$data.list.filter(due => due.due_today === true);
			},

		},

		methods: {
			deleteTask(id) {
				const taskIndex = this.$data.list.findIndex(task => task.id === id);
				this.$data.list.splice(taskIndex, 1);

				// const foo = this.$data.bar.findIndex(task => task.id === id);
				// this.$data.bar.splice(foo, 1);
			},
		},
	};
</script>
