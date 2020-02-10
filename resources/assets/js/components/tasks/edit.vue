<template>
	<form
		slot="inner"
		name="task"
		:disabled="$data.isSubmitting"
		novalidate
		@submit.prevent="updateTask"
	>
		<div class="flex">
			<div class="max-w-sm flex-auto items-center">
				<div class="flex items-center">
					<h2
						v-if="!$data.editing"
						class="tasks tasks--title text-2xl"
					>
						{{ $data.form.title }}
					</h2>

					<input
						v-else
						v-model="$data.form.title"
						class="
							bg-transparent
							border-0
							e-input
							p-0
							pl-0
							tasks
							tasks--title
							text-2xl
							text-grey-200"
						type="text"
					>
				</div>

				<div class="tasks tasks--department--bg  rounded-lg my-2 inline-block tasks--shadow">
					<h3 class="tasks tasks--department px-2 text-sm">
						<strong>Asigned By:</strong>
						Tomos
					</h3>
				</div>

				<div>
					<p
						v-if="!$data.editing"
						class="mb-2 tasks tasks--description"
					>
						{{ $data.form.description }}
					</p>

					<textarea
						v-else
						v-model="$data.form.description"
						rows="2"
						cols="30"
						class="
							bg-transparent
							border-0
							e-input
							mb-2
							p-0
							tasks
							tasks--description
							text-grey-200"
						type="text"
					/>
				</div>
			</div>

			<div class="">
				<div
					class="
						h-20
						relative
						tasks
						tasks--transparent-bg
						rounded-xl
						pr-2
						pl-10
						tasks--shadow"
				>
					<div>
						<p
							v-if="!$data.editing"
							class="tasks tasks--day text-right text-3xl"
							v-text="date.dayOfMonth"
						/>

						<input
							v-if="$data.editing"
							v-model="$data.form.due"
							value=""
							type="date"
							name="due"
							class="
								border-none
								e-input
								rounded
								tasks
								tasks--shadow"
						>
					</div>

					<div class="flex flex-col-reverse justify-around relitive">
						<div class="mb-1 py-1 rounded-lg tasks tasks--department ux w-24">
							<p
								v-if="!$data.editing"
								v-text="$props.task.department.title"
							/>

							<select
								v-else
								v-model="$data.form.department"
								name="department"
								class="
									tasks
									tasks--department
									bg-transparent
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

						<div>
							<p
								v-if="!$data.editing"
								class="tasks tasks--month text-right"
							>
								{{ date.month }}
							</p>
						</div>
					</div>
				</div>

				<div>
					<h4
						class="
							tasks
							tasks--department
							tasks--department--bg
							rounded-lg
							pl-2
							mt-3
							tasks--shadow
							text-sm
							inline-block
							uppercase
						"
					>
						<!-- <strong>Status:</strong> -->

						<!-- <select name="" id="" class="e-select w-20">
							@if($task['progress'] == $flag)
								<option value="{{task.id}}" selected>{{ ucfirst($flag) }}</option>
							@else
								<option value="{{$task['id']}}">{{ ucfirst($flag) }}</option>
							@endif
						</select> -->
					</h4>
				</div>
			</div>
		</div>

		<div class="flex mb-5">
			<button
				v-if="!$data.editing"
				class="text-white"
				:class="{ 'opacity-50': $data.editing }"
				:disabled="$data.editing"
				@click.prevent="setTaskEditable"
			>
				<i class="fa fa-edit w3-large" />
			</button>

			<button
				v-if="!$data.editing"
				class="text-white"
				:class="{ 'opacity-50': $data.editing }"
				@click.prevent="$store.dispatch('delete', { id: $props.task.id })"
			>
				<i class="fa fa-trash w3-large mx-3" />
			</button>

			<button
				v-if="$data.editing"
				value="save"
				class="px-10 rounded-xl tasks--department--bg flex-1"
				@click="$store.dispatch('edit', { task: $data.form })"
			>
				Save
			</button>
		</div>
	</form>
</template>


<script>
	import { DateTime } from 'luxon';

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

			task: {
				type: Object,
				required: true,
			},

			departments: {
				type: Array,
				required: true,
			},
		},

		data() {
			return {
				form: {
					id: this.$props.task.id,
					title: this.$props.task.title,
					description: this.$props.task.description,
					due: this.$props.task.due_date,
					department: this.$props.task.department_id,
				},

				editing: false,
			};
		},

		computed: {
			date() {
				return {
					dayOfMonth: DateTime.fromISO(this.$data.form.due).day,
					month: DateTime.fromISO(this.$data.form.due).toFormat('LLLL'),
				};
			},
		},

		methods: {
			setTaskEditable() {
				this.$data.editing = true;
			},

			updateTask() {
				this.$data.editing = false;

				// this.onSubmit();
			},
		},
	};
</script>
