<template>
	<div>
		<addToTable
			:type="$props.type"
		/>

		<h2 class="tasks--title text-2xl mb-3">
			Current Entries
		</h2>
		<div
			class="bg-transparent p-3 mt-2 rounded tasks--shadow"
		>
			<div
				v-for="initialList in table"
				:key="initialList.id"
				class="mt-5 font-normal flex justify-between border-b border-grey-300"
			>
				<div v-if="!editing">
					{{ initialList.title }}
				</div>
				<div v-else>
					<h1>hello</h1>
				</div>
				<div>
					<div class="flex">
						<button
							v-if="!$data.editing"
							class="text-red"
							:disabled="$data.editing"
							@click.prevent="$data.editing = true"
						>
							<i class="fa fa-edit w3-large" />
						</button>

						<button
							v-if="!$data.editing"
							class="text-red"
							@click.prevent="deleteTask(initialList.id)"
						>
							<i class="fa fa-trash w3-large mx-3" />
						</button>

						<button
							v-if="$data.editing"
							type="submit"
							value="save"
							class="px-10 rounded-xl tasks--department--bg flex-1"
						>
							Save
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import addToTable from './addToTable';

	export default {
		components: {
			addToTable,
		},

		props: {
			table: {
				type: Array,
				required: true,
			},

			type: {
				type: String,
				required: true,
			},
		},

		data() {
			return {
				form: {
					title: this.$props.table.title,
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
