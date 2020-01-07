<template>
	<div>
		<edit />
	</div>
</template>

<script>
	import Edit from './edit';

	export default {
		components: {
			Edit,
		},

		props: {
			today: {
				type: Array,
				required: true,
			},
		},


	};
</script>
