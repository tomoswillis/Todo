<template>
	<div>
		<form
			slot="inner"
			name="task"
			:disabled="$data.isSubmitting"
			novalidate
			@submit.prevent="updateTask"
		>
			<div class="mb-6">
				<input
					v-model="$data.form.title"
					class="
						e-input"
					type="text"
				>
				<input
					type="submit"
					value="Add"
					class="
						e-button
						tasks
						uppercase
						mt-5
						tasks--form--add-task
						rounded-lg"
				>
			</div>
		</form>

		<h2 class="e-h2 mb-3">
			Current Enteries
		</h2>
		<div
			class="bg-white p-3 mt-2 border border-grey-500"
		>
			<div
				v-for="initialList in table"
				:key="initialList.id"
				class="mt-2"
			>
				{{ initialList.title }}
				<hr>
			</div>
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
			table: {
				type: Array,
				required: true,
			},

			action: {
				type: String,
				default: '',
			},
		},

		data() {
			return {
				form: {
					title: this.$props.table.title,
				},
			};
		},

		methods: {
			updateTask() {
				this.$data.editing = false;

				this.onSubmit();
			},
		},
	};
</script>
