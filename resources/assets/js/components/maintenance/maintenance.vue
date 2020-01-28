<template>
	<div class="bg-grey-100 flex px-5 h-screen tasks--title">
		<div
			class="
				bg-white
				mr-5
				text-center
				border
				border-grey-500
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

		<div class="w-screen mt-5">
			<div>
				<h2 class="tasks--title text-2xl mb-3">
					{{ activeTable.heading }}
				</h2>

				<addToTable
					:action="`${activeTable.edit.inputAction}`"
					:table="activeTable.edit.table"
				/>

				<div
					class="bg-transparent p-3 mt-2 rounded tasks--shadow"
				>
					<div
						v-for="initialList in activeTable.edit"
						:key="initialList.id"
						class="mt-5 font-normal flex justify-between border-b border-grey-300"
					>
						<listItems
							:initialList="initialList"
						/>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	// import edit from './edit';
	import listItems from './listItems';

	export default {
		components: {
			edit,
			listItems,
		},

		props: {
			initialList: {
				type: Object,
				required: true,
			},
		},

		data() {
			return {
				selected: 'departments',
			};
		},

		computed: {
			list() {
				return this.$store.state.mM.list;
			},

			activeTable() {
				const tableData = {
					categories: {
						heading: 'Add a Category',
						inputAction: '/category/store',
						action: '',
						deleteItem: '/category/delete/',
					},
					departments: {
						heading: 'Add a Department',
						inputAction: '/department/store',
						action: '',
						deleteItem: '/department/delete/',
					},
				};

				const { selected } = this.$data;

				return {
					heading: tableData[selected].heading,
					edit: {
						table: this.list[selected],
						inputAction: tableData[selected].inputAction,
						deleteSlug: tableData[selected].deleteItem,
						action: tableData[selected].action,
						whichSelected: selected,
					},
				};
			},
		},

		mounted() {
			this.$store.commit('mM/updateList', { list: this.$props.initialList });

			// store.commit('a/increment');
		},

		methods: {
			deleteTask(id) {
				const index = this.$data.tables[this.$data.selected].findIndex(task => task.id === id);
				this.$data.tables[this.$data.selected].splice(index, 1);
				// console.log(this.$data.tables[this.$data.selected].findIndex(task => task.id === id));
			},
		},
	};
</script>
