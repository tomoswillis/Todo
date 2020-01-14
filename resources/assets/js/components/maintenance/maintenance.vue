<template>
    <div>
        <div v-for="department in categories" :key="department.id">
            {{ department.title }}
        </div>
    </div>
</template>
<script>
    export default {
        components: {

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
                users: this.$props.initialList.users,
                categories: this.$props.initialList.categories
            };
        },
    };
</script>
