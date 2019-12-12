@extends('layouts/app')

@section('content')

	<App title="bar"></App>


@endsection
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
					px-2
					;
		}
		</style>