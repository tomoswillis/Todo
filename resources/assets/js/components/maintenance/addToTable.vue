<template>
	<div>
		<form
			slot="inner"
			name="task"
			novalidate
			@submit.prevent="Submit"
		>
			<div class="mb-6 flex flex-col items-end mb-6">
				<input
					v-model="$data.title"
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


	export default {
		props: {
			type: {
				type: String,
				required: true,
			},
		},

		data() {
			return {
				title: '',
			};
		},

		methods: {
			Submit() {
				this.$store.dispatch('maintenance/push', { title: this.$data.title, type: this.$props.type });
				this.$data.title = '';
			},
		},
	};
</script>
