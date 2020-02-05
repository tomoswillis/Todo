<template>
	<div>
		<div
			class="
				e-containter
				width-holder
				input-tab--bg
				rounded-xl
				text-white
				mb-10
				mt-5
				py-5
				tasks
				relative
				tasks--shadow"
		>
			<form
				slot="inner"
				name="task"
				:disabled="$data.isSubmitting"
				novalidate
				class="e-container"
				@submit.prevent="onSubmit"
			>
				<div
					class="
						font-semibold
						inline-block
						px-6
						py-2
						tasks
						tasks--tab-title
						text-lg
						w-40
						input-tab
						input-tab--color"
				>
					<h6>Add Task</h6>
				</div>
				<!-- {{--Task Title Input--}} -->
				<!-- <div class="alert alert-danger" >{{ $message }}</div> -->
				<input
					v-model="$data.form.task"
					type="text"
					name="task"
					value=""
					class="
						e-input
						tasks
						tasks--transparent-bg
						rounded
						tasks--shadow
						border-none
						text-white
						mt-5
					"
					placeholder="Next Todo"
				>
				<!-- {{--Task Due Date--}} -->
				<div class="flex justify-between my-5">
					<div class="flex-1">
						<div class="mr-2">
							<h4>Due Date</h4>
							<input
								v-model="$data.form.due"
								type="date"
								name="due"
								value=""
								class="
									e-input
									rounded
									tasks
									tasks--transparent-bg
									border-none
									tasks--shadow
									h-10
									w-full
									text-white
									p-2"
							>
						</div>
					</div>
					<!-- {{--Task Status--}} -->
					<div class="flex-1">
						<div class="ml-2">
							<h4>Status</h4>
							<select
								name="progress"
								class="
									tasks
									tasks--transparent-bg
									tasks--shadow
									h-10
									w-full"
							>
								<option value="planning">
									Planning
								</option>
								<option value="completed">
									Completed
								</option>
								<option value="cancelled">
									Cancelled
								</option>
							</select>
						</div>
					</div>
				</div>
				<!-- {{--Task Department--}} -->
				<div class="flex justify-between my-5">
					<div class="flex-1">
						<div class="mr-2">
							<h4>Department</h4>
							<select
								v-model="$data.form.department"
								name="department"
								class="
									tasks
									tasks--transparent-bg
									tasks--shadow
									h-10
									w-full"
							>
								<option
									v-for="department in $props.departments"
									:key="department.id"
									:value="department.id"
									v-text="department.title"
								/>
							</select>
						</div>
					</div>
					<!-- {{--Task Assigned To--}} -->
					<div class="flex-1">
						<div class="ml-2">
							<h4>Assign To</h4>
							<select
								name="assign"
								class="
									tasks
									tasks--transparent-bg
									tasks--shadow
									h-10
									w-full"
							>
								<option value="#">
									Tomos
								</option>
								<option value="#">
									Who?
								</option>
							</select>
						</div>
					</div>
				</div>
				<!-- {{--Task Description Input--}} -->
				<div class="mt-8 flex flex-col items-center">
					<textarea
						v-model="$data.form.description"
						rows="2"
						cols="50"
						class="
							e-input
							tasks
							tasks--transparent-bg
							rounded
							tasks--shadow
							border-none
							text-white"
						placeholder="Description"
						name="description"
					/>
					<input
						type="button"
						value="Add Task"
						class="
							e-button
							tasks
							uppercase
							mt-5
							tasks--form--add-task
							rounded-lg"
						@click="$store.dispatch('tasks/push', { task: $data.form })"
					>
				</div>
			</form>
		</div>
	</div>
</template>
<script>
	import Form from '../../mixins/form';

	export default {
		mixins: [
			Form,
		],

		props: {
			action: {
				type: String,
				default: '',
			},

			departments: {
				type: Array,
				required: true,
			},
		},

		data() {
			return {
				form: {
					task: '',
					description: '',
					due: '2020-01-01',
					department: '1',
					progress: 'planning',
				},
			};
		},
	};
</script>
