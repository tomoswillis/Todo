<template>
	<div class="e-container mx-auto sm:w-full md:w-3/5">
		<h2 class="text-center e-h1 mt-10 mb-5">
			My Todo List ... Maybe Calender
		</h2>
		<!--input (text area// V-model takes the input (Value and input) and applys it to the data object. @keyup.enter runs the addTodo funtion)  -->
		<input
			v-model="newTodo"
			type="text"
			class="todo-input e-input rounded mb-2"
			placeholder="What needs to be done"
			@keyup.enter="addTodo"
		>
		<div class="flex w-64 items-center mb-5">
			<h2 class="flex-none text-base text-grey-600">
				Due Date:
			</h2>
			<input
				v-model="due"
				v-focus
				type="number"
				class="todo-input-date w-10 text-center rounded"
			>
		</div>
		<todo-list
			:initial-list="$data.list"
			@removeTodo="removeTodo"
		/>
	</div>
</template>

<script>
	import TodoList from './todo-list';

	export default {
		components: {
			TodoList,
		},

		directives: {
			focus: {
				// directive definition
				inserted(el) {
					el.focus();
				},
			},
		},

		data() {
			return {
				newTodo: '',
				idForTodo: 6,
				beforeEditCache: '',
				due: 1,
				list: [
					{
						id: 1,
						title: 'Finish task',
						completed: false,
						editing: false,
						due: 23,
					},
					{
						id: 2,
						title: 'Go for a run!',
						completed: false,
						editing: false,
						due: 24,
					},
					{
						id: 3,
						title: 'Finish Making Todo App',
						completed: false,
						editing: false,
						due: 21,
					},
					{
						id: 4,
						title: 'going',
						completed: false,
						editing: false,
						due: 29,
					},
					{
						id: 5,
						title: 'home',
						completed: false,
						editing: false,
						due: 12,
					},
				],
			};
		},
		methods: {
			//	'this' must be used when refering to the data.
			//	.trim() removes the white space
			//	.length counts the about of chars in the string given
			/**
			 * The if statment is looking to see if the newTodo has been given
			 * a value that is === to 0.
			 * If it has then return
			 */
			//	if there is a string carry on ----->
			addTodo() {
				if (this.newTodo.trim().length === 0) return;

				//	.push pushes the items in brackets to the array, in this case todos
				//	this will create a new item in the array
				this.list.push({
					id: this.idForTodo,
					title: this.newTodo,
					completed: false,
					due: this.due,
				});

				//	this clears the newTodo
				this.newTodo = '';
				//	This will add one and update the idForTodo in the data object
				this.idForTodo += 1;
				this.due = 1;
			},

			removeTodo(id) {
				for (let i = 0; i < this.list.length; i += 1) {
					if (this.list[i].id === id) {
						this.list.splice(i, 1);
					}
				}
			},
		},
	};
</script>
