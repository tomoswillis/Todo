<template>
	<div>
		<input
			v-model="newTodo"
			type="text"
			class="todo-input"
			placeholder="What needs to be done"
			@keyup.enter="addTodo"
		>

		<div
			v-for="(todo, index) in todos"
			:key="todo.id"
			class="todo-item flex justify-between"
		>
			<div class="todo-item-left">
				<div
					v-if="!todo.editing"
					@click="editTodo(todo.id)"
					v-text="todo.title"
				/>

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
		methods: {
			addTodo() {
				if (this.newTodo.trim().length === 0) return;

				this.todos.push({
					id: this.idForTodo,
					title: this.newTodo,
					completed: false,
				});

				this.newTodo = '';

				this.idForTodo += 1;
			},
			removeTodo(index) {
				this.todos.splice(index, 1);
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

			findTodo(i) {
				return this.todos.find(todo => todo.id === i);
			},
		},
	};
</script>
