<template>
	<div>
		<showToday />

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
			<transitionGroup name="slide-fade">
				<div
					v-for="task in list"
					:key="task.id"
				>
					<showToday
						v-if="(task.due_date === $props.today)"
					/>

					<edit :task="task" />
				</div>
			</transitionGroup>
		</div>
		<add-Task />
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

		data() {
			return {
				editing: false,
			};

		},

		computed: {
			dueTodayList() {
				return this.$store.state.tasks.list.filter(due => due.due_today === true);
			},

			list() {
				return this.$store.state.tasks.list;
			},

		},
	};
</script>
