<template>
	<div>
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
</template>

<script>


	export default {

		props: {


			initialList: {
				type: Array,
				required: true,
			},
		},

		data() {
			return {
				editing: false,
			};

		},

		computed: {

		},


	};
</script>
