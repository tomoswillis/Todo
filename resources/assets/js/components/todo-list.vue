<template>
	<div class="e-container mx-auto sm:w-full md:w-3/5">
		<h2 class="text-center e-h1 mt-10 mb-5">
			My Todo List
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
		<h2 class="flex-none text-base mb-2 text-grey-600">
			Filters:
		</h2>
		<div class="flex mb-5 button-filters">
			<button
				class="e-button"
				:class="{ active: filter === 'all' }"
				@click="filter = 'all' "
			>
				All
			</button>
			<button
				class="e-button ml-2"
				:class="{ active: filter === 'active' }"
				@click="filter = 'Active' "
			>
				Active
			</button>
			<button
				class="e-button ml-2"
				:class="{ active: filter === 'completed' }"
				@click="filter = 'completed' "
			>
				Completed
			</button>
		</div>
		<transition-group
			name="bounce"
			enter-active-class="animated slideInUp"
			leave-active-class="animated slideOutRight"
		>
			<div
				v-for="(todo, index) in todosFiltered"
				:key="todo.id"
				class="todo-item flex text-xl flex flex-row items-center p-2 bg-grey-200 mb-2 rounded"
			>
				<div
					class="w-12 text-center"
					style="border-right: 1px solid grey"
					v-text="todo.due"
				/>
				<div class="todo-item-left flex items-center flex-auto ml-5">
					<input v-model="todo.completed" class="tick" type="checkbox">
					<!-- v-text is the same as {{ some item }} -->
					<div
						v-if="!todo.editing"
						class="ml-2 e-4"
						:class="{ 'line-through text-gray-100': todo.completed }"
						@click="editTodo(todo.id)"
						v-text="todo.title"
					/>

					<!-- blur is then something is no longer focused -->
					<input
						v-else
						v-model="todo.title"
						v-focus
						type="text"
						class="todo-item-edit ml-5 bg-transparent text-grey-600"
						@blur="doneEdit(todo.id)"
						@keyup.enter="doneEdit(todo.id)"
						@keyup.esc="cancleEdit(todo.id)"
					>
				</div>
				<!-- <input
					v-model="todo.due"
					v-focus
					type="number"
					@blur="doneEdit(todo.id)"
					@keyup.enter="doneEdit(todo.id)"
					@keyup.esc="cancleEdit(todo.id)"
				> -->
				<button class="remove-item" @click="removeTodo(index)">
					&times;
				</button>
			</div>
		</transition-group>
		<hr class="mt-5">
		<div class="filters">
			<div class="flex justify-between my-2">
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
					{{ remaining }} Items Left
				</div>
			</div>
			<transition name="fade">
				<button
					v-if="showClearCompleted"
					class="e-button w-full mt-2"
					@click="clearCompleted"
				>
					Clear Completed
				</button>
			</transition>
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
				idForTodo: 4,
				beforeEditCache: '',
				filter: 'all',
				due: 1,
				todos: [
					{
						id: 1,
						title: 'Finish task',
						completed: false,
						editing: false,
						due: 23,
					},
					{
						id: 2,
						title: 'Go for a run',
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
					return this.todos.slice().sort((a, b) => a.due - b.due);
				} else if (this.filter === 'active') {
					return this.todos.filter(todo => !todo.completed);
				} else if (this.filter === 'completed') {
					return this.todos.filter(todo => todo.completed);
				} return this.todos.slice().sort((a, b) => a.due - b.due);
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
					due: this.due,
				});

				//	this clears the newTodo
				this.newTodo = '';
				//	This will add one and update the idForTodo in the data object
				this.idForTodo += 1;
				this.due = 1;
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

.remove-item:hover{
	cursor: pointer;
	transition: all .2s;
	@apply
		text-red;
}
.todo-item{
	animation-duration: 0.4s;
}
.button-filters button{
	width: 8em;
	padding: 0.8em;
	font-size: 0.9em;
}

.todo-input-date:focus{
	border: 1px solid rgb(104, 104, 104);
	@apply
		;
}

.todo-input-date{
	border: 1px solid rgb(180, 180, 180);
	@apply
			ml-1
			px-2;
}
</style>
