<template>
	<div class="e-container width-holder center tasks tasks--bg tasks--shadow text-white rounded-xl pb-2 relative">
		<div class="font-semibold inline-block px-6 py-2 tasks tasks--tab-title  tasks--tab-title--form text-lg w-40">
			<h6>Your Tasks</h6>
		</div>

		<!-- <div class="flex pb-10 pt-10">
			<div>
				<select name="" id="" class=" tasks tasks--transparent-bg py-2 px-5">
					<option value="#">Ascending</option>
					<option value="#">Descending</option>
				</select>
			</div>

			<div class="">
				<select name="" id="" class=" tasks tasks--transparent-bg py-2 px-5 ml-2">
					<option value="#">Filter</option>
					<option value="#">Descending</option>
				</select>
			</div>

			<div class="">
				<select name="" id="" class=" tasks tasks--transparent-bg py-2 px-5 ml-2">
					<option value="#">Filter</option>
					<option value="#">Descending</option>
				</select>
			</div>
		</div> -->
		<form>
			<div
				class=""
				v-for="task in computedList"
				:key="task.id"
			>
				<pre v-html="task.editing ? 'EDITING' : 'N/A'" />

				<div class="flex">
					<div class="max-w-sm flex-auto items-center">
						<div class="flex items-center">
							<h2
								v-if="!task.editing"
								class="tasks tasks--title text-2xl"
							>
								{{ task.title }}
							</h2>

							<input
								v-else
								v-model="task.title"
								class="bg-transparent border-0 e-input p-0 pl-0 tasks tasks--title text-2xl text-grey-200"
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
								v-if="!task.editing"
								class="mb-2 tasks tasks--description"
							>
								{{ task.description }}
							</p>

							<textarea
								v-else
								v-model="task.description"
								rows="2"
								cols="30"
								class="bg-transparent border-0 e-input mb-2 p-0 tasks tasks--description text-grey-200"
								type="text"
							>
							</textarea>
						</div>
					</div>

					<div class="">
						<div class="h-20 relative tasks tasks--transparent-bg rounded-xl pr-2 pl-10 tasks--shadow">
							<div>
								<p
									v-if="!task.editing"
									class="tasks tasks--day text-right text-3xl"
								>
									{{ task.date.dayOfMonth }}
								</p>
								<input
									v-if="task.editing"
									type="date"
									name="due"
									value=""
									v-model="task.due_date"
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
									<p  v-if="!task.editing">
										{{ task.department.title }}
									</p>

									<select
										v-else
										name="department"
										class="
											tasks
											tasks--department
											bg-transparent
											w-full"
									>
										<option value="`${task.department.id}`">
											{{ task.department.title }}
										</option>

										<option value="1">
											UX
										</option>

										<option value="2">
											Backend
										</option>
									</select>
								</div>

								<div>
									<p
										v-if="!task.editing"
										class="tasks tasks--month text-right"
									>
										{{ task.date.month }}
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
						v-if="!task.editing"
						class="text-white"
						:class="{ 'opacity-50': task.editing }"
						:disabled="task.editing"
						@click.prevent="setTaskEditable(task.id)"
					>
						<i class="fa fa-edit w3-large" />
					</button>

					<button
						v-if="!task.editing"
						class="text-white"
						:class="{ 'opacity-50': task.editing }"
						@click.prevent="deleteTask(task.id)"
					>
						<i class="fa fa-trash w3-large mx-3" />
					</button>

					<button
						v-if="task.editing"
						@click="editComplete(task.id)"
						class="px-10 rounded-xl tasks--department--bg flex-1">
						Save
					</button>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	import { DateTime } from 'luxon';

	export default {
		props: {
			initialList: {
				type: Array,
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

		methods: {
			deleteTask(id) {
				axios.get(`/tasks/delete/${id}`);

				this.$data.list.splice(this.findIndexById(id), 1);
			},

			setTaskEditable(id) {
				this.$data.list[this.findIndexById(id)].editing = true;
			},

			findIndexById(id) {
				return this.$data.list.findIndex(task => task.id === id);
			},

			editComplete(id) {
				this.$data.list[this.findIndexById(id)].editing = false;
			},
		},
	};
</script>
