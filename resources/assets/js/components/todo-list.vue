<template>
	<div>
		<div class="flex mb-5 button-filters">
			<h2 class="text-base mr-2 text-grey-600">
				Sort:
			</h2>
			<!-- <button
				class="e-button"
				@click="filterDueAss"
			>
				Date Assending
			</button>
			<button
				class="e-button ml-2"
				@click="filterDueDec"
			>
				Date Decending
			</button> -->
			<select @change="onChange($event)">
				<option>Assending</option>
				<option>Decending</option>
				<option>Completed</option>
			</select>
			<!-- <button
				class="e-button ml-2"
				@click="filterComp"
			>
				Completed
			</button> -->
		</div>
		<transition-group
			name="bounce"
			enter-active-class="animated slideInUp"
			leave-active-class="animated slideOutRight"
		>
			<div
				v-for="todo in $data.todos"
				:key="todo.id"
				class="todo-item flex text-xl flex flex-row items-center p-2 bg-grey-200 mb-2 rounded"
			>
				<div
					v-if="!todo.editing"
					class="w-12 text-center"
					style="border-right: 1px solid grey"
					@click="editTodo(todo.id)"
					v-text="todo.due"
				/>
				<input
					v-else
					v-model="todo.due"
					v-focus
					style="border-right: 1px solid grey"
					class="bg-transparent text-grey-600 w-12 text-center"
					type="number"
					@blur="doneEdit(todo.id)"
					@keyup.enter="doneEdit(todo.id)"
					@keyup.esc="cancleEdit(todo.id)"
				>
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
				<button class="remove-item" @click="$emit('removeTodo', todo.id)">
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
		props: {
			initialList: {
				type: Array,
				default: () => {},
			},
		},

		data() {
			return {
				beforeEditCache: '',
				todos: this.$props.initialList,
				sortOut: '',
			};
		},

		computed: {
			remaining() {
				return this.todos.filter(todo => !todo.completed).length;
			},
			anyRemaining() {
				return this.remaining !== 0;
			},
			// todosFiltered() {
			// 	if (this.Filter === 'all') {
			// 		return this.todos.slice().sort((a, b) => a.due - b.due);
			// 	} else if (this.filter === 'active') {
			// 		return this.todos.filter(todo => !todo.completed);
			// 	} else if (this.filter === 'completed') {
			// 		return this.todos.filter(todo => todo.completed);
			// 	} return this.todos;
			// },
		},

		watch: {
			initialList() {
				this.todos = this.initialList;
				this.filterDueAss();
			},

			sortOut() {
				if (this.sortOut === 'Assending') this.filterDueAss();
				if (this.sortOut === 'Decending') this.filterDueDec();
				if (this.sortOut === 'Completed') this.filterComp();
				return 'Nothing';
			},
		},

		mounted() {
			this.filterDueAss();
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
			findTodo(i) {
				return this.todos.find(todo => todo.id === i);
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

			filterDueAss() {
				this.todos = this.initialList;
				this.todos = this.todos.slice().sort((a, b) => a.due - b.due);
			},

			filterDueDec() {
				this.todos = this.todos.slice().sort((a, b) => b.due - a.due);
			},

			filterNotComp() {
				this.todos = this.todos.filter(todo => !todo.completed);
			},

			filterComp() {
				this.todos = this.todos.filter(todo => todo.completed);
			},

			showClearCompleted() {
				this.todos = this.todos.filter(todo => todo.completed).length > 0;
			},

			onChange(event) {
				this.sortOut = (event.target.value);
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
