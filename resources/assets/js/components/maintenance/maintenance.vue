<template>
	<div class="px-5 h-screen tasks--title">
		<div
			class="
				text-center
				min-w-screen
			"
		>
			<h1 class="tasks--title text-2xl mt-5">
				Edit
			</h1>
			<div class="mt-3 font-normal">
				<button
					class=" p-3"
					@click.prevent="$data.selected = 'departments'"
				>
					Departments
				</button>
				<button
					class=" p-3"
					@click="$data.selected = 'categories'"
				>
					Categories
				</button>
			</div>
		</div>

		<div class=" mt-5">
			<div>
				<h2 class="tasks--title text-2xl mb-3">
					{{ activeTable.heading }}
				</h2>

				<addToTable
					:type="selected"
				/>

				<h2 class="tasks--title text-2xl mb-3">
					Current Entries
				</h2>

				<div
					class="bg-transparent p-3 mt-2 rounded tasks--shadow ani"
				>
					<transitionGroup name="slide-fade">
						<div
							v-for="table in activeTable.edit.table"
							:key="`${table.id}${$data.selected}`"
							v-bind="activeTable.edit"
						>
							<edit
								:table="table"
								:type="selected"
							/>
						</div>
					</transitionGroup>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import edit from './edit';
	import addToTable from './addToTable';

	export default {
		components: {
			edit,
			addToTable,
		},

		data() {
			return {
				selected: 'departments',
			};
		},

		computed: {
			activeTable() {
				const tableData = {
					categories: {
						heading: 'Add a Category',
						type: 'category',
					},
					departments: {
						heading: 'Add a Department',
						type: 'department',
					},
				};

				const { selected } = this.$data;

				return {
					heading: tableData[selected].heading,
					edit: {
						table: this.$store.state.maintenance[selected],
						type: tableData[selected].type,
					},
				};
			},
		},
	};
</script>
