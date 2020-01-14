<template>
	<div class="bg-grey-400 flex pt-5 px-5 h-screen">
		<div
			class="
				bg-white
				w-40
				mr-5
				pt-3
				text-center
				h-64
				border
				border-grey-500

			"
		>
			<h1 class="e-h1">
				Edit
			</h1>
			<div class="mt-3">
				<button
					class="e-h5 p-3"
					@click="$data.selected = ('departments')"
				>
					Departments
				</button>
				<button class=" e-h5 p-3"
					@click="$data.selected = ('category')"
				>
					Categories
				</button>
			</div>
		</div>

		<div class="w-1/2">
			<div v-if="$data.selected = 'departments'">
				<h2 class="e-h2 mb-3">
					Add A Department
				</h2>
				<edit
					:table="departments"
					:action="'/department/store'"
				/>
			</div>

			<div v-else>
				<h2 class="e-h2 mb-3">
					Add A Category
				</h2>
				<edit
					:table="categories"
					:action="'/category/store'"
				/>
			</div>
		</div>
	</div>
</template>

<script>

	import edit from './edit';

	export default {
		components: {
			edit,
		},

		props: {
			initialList: {
				type: Object,
				required: true,
			},
		},

		data() {
			return {
				departments: this.$props.initialList.departments,
				categories: this.$props.initialList.categories,
				selected: 'category',
			};
		},
	};
</script>
