<template>
	<div>
		<form
			slot="inner"
			name="task"
			:disabled="$data.isSubmitting"
			novalidate
			@submit.prevent="updateTask"
		>
			<div class="mb-6 flex flex-col items-end mb-6">
				<input
					v-model="$data.form.title"
					class="
						e-input
						rounded
						tasks--shadow
						x"
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
						rounded-lg
						tasks--shadow"
				>
			</div>
		</form>
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

			table: {
				type: Array,
				required: true,
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
