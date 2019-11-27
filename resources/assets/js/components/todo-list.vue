<template>
	<div>
		<!--input (text area// V-model takes the input (Value and input) and applys it to the data object. @keyup.enter runs the addTodo funtion)  -->
		<input
			v-model="newTodo"
			type="text"
			class="todo-input"
			placeholder="What needs to be done"
			@keyup.enter="addTodo"
		>

		<div
			v-for="(todo, index) in todosFiltered"
			:key="todo.id"
			class="todo-item flex justify-between"
		>
			<div class="todo-item-left">
				<input v-model="todo.completed" type="checkbox">
				<!-- v-text is the same as {{ some item }} -->
				<div
					v-if="!todo.editing"
					:class="{ 'line-through': todo.completed }"
					@click="editTodo(todo.id)"
					v-text="todo.title"
				/>

				<!-- blur is then something is no longer focused -->
				<input
					v-else
					v-model="todo.title"
					v-focus
					type="text"
					class="todo-item-edit"
					@blur="doneEdit(todo.id)"
					@keyup.enter="doneEdit(todo.id)"
					@keyup.esc="cancleEdit(todo.id)"
				>
			</div>
			<div class="remove-item" @click="removeTodo(index)">
				&times;
			</div>
		</div>
		<div class="filters">
			<div>
				<label>
					<input
						type="checkbox"
						:checked="!anyRemaining"
						@change="checkAllTodos"
					> Check All
				</label>
			</div>
			<div>
				<button
					class="e-button"
					:class="{ active: filter === 'all' }"
					@click="filter = 'all' "
				>
					All
				</button>
				<button
					class="e-button"
					:class="{ active: filter === 'active' }"
					@click="filter = 'Active' "
				>
					Active
				</button>
				<button
					class="e-button"
					:class="{ active: filter === 'completed' }"
					@click="filter = 'completed' "
				>
					Completed
				</button>
			</div>
			<div>
				<transition name="fade">
					<button
						v-if="showClearCompleted"
						class="e-button"
						@click="clearCompleted"
					>
						Clear Completed
					</button>
				</transition>
			</div>
			<div>
				{{ remaining }} Items Left
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		// name: 'todo-list',
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
				idForTodo: 3,
				beforeEditCache: '',
				filter: 'all',
				todos: [
					{
						id: 1,
						title: 'Finish task',
						completed: false,
						editing: false,
					},
					{
						id: 2,
						title: 'Go for a run',
						completed: false,
						editing: false,
					},
				],
			};
		},

		computed: {
			remaining() {
				return this.todos.filter(todo => !todo.completed).length;
			},
			anyRemaining() {
				return this.remaining !== 0;
			},
			todosFiltered() {
				if (this.Filter === 'all') {
					return this.todos;
				} else if (this.filter === 'active') {
					return this.todos.filter(todo => !todo.completed);
				} else if (this.filter === 'completed') {
					return this.todos.filter(todo => todo.completed);
				} return this.todos;
			},
			showClearCompleted() {
				return this.todos.filter(todo => todo.completed).length > 0;
			},
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
				this.todos.push({
					id: this.idForTodo,
					title: this.newTodo,
					completed: false,
				});

				//	this clears the newTodo
				this.newTodo = '';
				//	This will add one and update the idForTodo in the data object
				this.idForTodo += 1;
			},

			findTodo(i) {
				return this.todos.find(todo => todo.id === i);
			},

			removeTodo(index) {
				this.todos.splice(index, 1);
			//	.splice
			},

			editTodo(v) {
				this.beforeEditCache = this.findTodo(v).title;
				this.findTodo(v).editing = true;
			},


			doneEdit(v) {
				this.findTodo(v).editing = false;
			},

			cancleEdit(v) {
				this.findTodo(v).title = this.beforeEditCache;
				this.findTodo(v).editing = false;
			},
			checkAllTodos(event) {
				this.todos.forEach(todo => todo.completed = event.target.checked);
			},
			clearCompleted() {
				this.todos = this.todos.filter(todo => !todo.completed);
			},
		},
	};
</script>

<style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css");
.fade-enter-active, .fade-leave-active {
	transition: opacity .3s;
}

.fade-enter, .fade-leave-to {
	opacity: 0;
}
</style>
