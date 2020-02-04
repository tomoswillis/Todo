<template>
	<div>
		<div
			class="mt-5 font-normal flex justify-between border-b border-grey-300"
		>
			<div v-if="!editing">
				{{ table.title }}
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
						@click.prevent="deleteItem(table.id)"
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
</template>

<script>
	export default {

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

			updateTask() {
				this.$data.editing = false;
				this.onSubmit();
			},

			deleteItem() {
				console.log(this.$props.table.id);
				this.$store.dispatch('maintenance/delete', {
					id: this.$props.table.id,
					type: this.$props.type,
				});
			},
		},
	};
</script>
