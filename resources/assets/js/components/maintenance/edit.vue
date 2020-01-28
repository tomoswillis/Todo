<template>
	<div>
		<addToTable
			:action="`${this.$props.inputAction}`"
			:table="table"
		/>

		<h2 class="tasks--title text-2xl mb-3">
			Current Entries
		</h2>
		<div
			class="bg-transparent p-3 mt-2 rounded tasks--shadow"
		>
			<!-- <div
				v-for="initialList in table"
				:key="initialList.id"
				class="mt-5 font-normal flex justify-between border-b border-grey-300"
			>
				<listItems
					:initialList="initialList"
				/>
			</div> -->
		</div>
	</div>
</template>

<script>
	import Form from '../../mixins/form';
	// import addToTable from './addToTable';
	// import listItems from './listItems';

	export default {
		components: {
			// addToTable,

		},

		mixins: [
			Form,
		],

		props: {
			table: {
				type: Object,
				required: true,
			},

			action: {
				type: String,
				default: '',
			},

			inputAction: {
				type: String,
				default: '',
			},

			deleteSlug: {
				type: String,
				default: '',
			},
		},

		data() {
			return {
				form: {
					// title: this.$props.table.title,
				},

				editing: false,
			};
		},

		methods: {
			deleteTask(id) {
				axios.get(this.$props.deleteSlug + id);

				this.$emit('delete', id);
			},

			updateTask() {
				this.$data.editing = false;

				this.onSubmit();
			},
		},
	};
</script>
