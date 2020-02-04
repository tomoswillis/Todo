<template>
	<div>
		<div
			class="mt-5 font-normal flex justify-between border-b border-grey-300"
		>
			<div v-if="!editing">
				{{ table.title }}
			</div>
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
					text-xl
					text-grey-600"
				type="text"
			>
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
						@click.prevent="deleteItem(table.id)"
					>
						<i class="fa fa-trash w3-large mx-3" />
					</button>

					<button
						v-if="$data.editing"
						type="submit"
						value="save"
						class="px-10 rounded-xl tasks--department--bg flex-1"
						@click="editItem"
					>
						Save
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {

		props: {
			table: {
				type: Object,
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
					id: this.$props.table.id,
					title: this.$props.table.title,
				},

				editing: false,

			};
		},

		methods: {

			updateTask() {
				this.$data.editing = false;
				this.onSubmit();
			},

			deleteItem() {
				this.$store.dispatch('maintenance/delete', {
					id: this.$props.table.id,
					type: this.$props.type,
				});
			},

			editItem() {
				this.$store.dispatch('maintenance/edit', {
					foo: this.$data.form,
					id: this.$props.table.id,
					type: this.$props.type,
				});
				this.$data.editing = false;
			},
		},
	};
</script>
