@extends('layouts.web')


@section('content')

	@component('components.page')
	  @slot('title') {{ __('messages.messages_title') }} @endslot

	  @slot('breadcrumbs')
	  	<ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
	        <li class="breadcrumb-item active"><a href="#"> {{ __('messages.messages_title') }} </a></li>
	      </ol>
	  @endslot

	  @component('components.forms.success') @endcomponent


		@component('components.table')

				@slot('filters')
					<form class="form-inline">
			      <div class="form-group">
			        <label class="sr-only" for="inputInlineUsername">{{ __('messages.filter') }}</label>
			        <input type="text" class="form-control" 
			        id="filter" name="filter" value="{{ old('filter') }}" placeholder="Filtro" autocomplete="off">
			      </div>
			     
			      <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-outline">{{ __('messages.search') }}</button>
			      </div>
			    </form>
				@endslot

				@slot('columns')
					 <th> {{ __('messages.message') }} </th>
	         <th> {{ __('messages.application') }}</th>
	         <th> {{ __('messages.provider') }}</th>
	         <th> {{ __('messages.created_at') }}</th>
	         <th> {{ __('messages.status') }}</th>
	         <th class="text-nowrap">{{ __('messages.actions') }}</th>
				@endslot

				@foreach ($messages as $message)

	        <tr>
	        	<td>{{ $message->message }}</td>
	        	<td>{{ $message->location->application->code }}</td>
	        	<td>{{ $message->location->provider }}</td>
	        	<td>{{ $message->created_at }}</td>
	        	<td>
	        	
	        		@if ( $message->status)
								<i class="icon wb-check-mini" aria-hidden="true"></i>
							@else
								<i class="icon wb-close-mini" aria-hidden="true"></i>
							@endif

	        	</td>

	        

	        	<td class="text-nowrap">

	        		@component('components.table-option')
								@slot('title') {{ __('messages.edit') }} @endslot
								@slot('route') {{ url('/messages/edit/' . $message->id) }} @endslot
								@slot('icon') wb-wrench @endslot
							@endcomponent

							{{-- @component('components.table-option')
								@slot('title') {{ __('messages.disable') }} @endslot
								@slot('route') {{ url('/messages/delete/' . $message->id) }} @endslot
								@slot('icon') wb-close @endslot
							@endcomponent 	 --}}

	        	</td>
		      </tr>

	   		@endforeach
							

		@endcomponent

		{{-- </div> --}}

		@component('components.pagination')
			{{ $messages->appends(['filter' => old('filter')] )->links() }}
		@endcomponent


		<div class="site-action" data-plugin="actionBtn">
			<a href="messages/create">
	    <button type="button" class="site-action-toggle btn-raised btn btn-primary btn-floating">
	      <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
	      <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
	    </button>
	  	</a>
		  
  </div>

	@endcomponent 


@endsection