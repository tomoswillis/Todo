<template>
	<div>
		<!-- <showToday
			:task="today"
		/> -->
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
				v-for="task in computedList"
				:key="task.id"
			>
				<showToday
					v-if="(task.due_date === $props.today)"
				/>

				<edit
					:task="task"
					:action="'/task/edit/' + task.id"
					:departments="departments"
				/>
			</div>
		</div>
		<add-Task
			:action="'/task/store'"
		/>
	</div>
</template>

<script>
	import { DateTime } from 'luxon';

	import Edit from './edit';
	import addTask from './add-task';

	export default {
		components: {
			Edit,
			addTask,
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

			today: {
				type: String,
				required: true,
			},
		},

		data() {
			return {
				list: this.$props.initialList.map(task => ({
					...task,
					editing: false,
				})),
			};

		},

		computed: {
			computedList() {
				return this.$data.list.map(task => ({
					...task,
					date: {
						dayOfMonth: DateTime.fromISO(task.due_date).day,
						month: DateTime.fromISO(task.due_date).toFormat('LLLL'),
					},
				}));
			},
		},
	};
</script>
