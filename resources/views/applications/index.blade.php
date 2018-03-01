@extends('layouts.web')


@section('content')

	@component('components.page')
	  @slot('title') {{ __('applications.applications_title') }} @endslot

	  @slot('breadcrumbs')
	  	<ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
	        <li class="breadcrumb-item active"><a href="#"> {{ __('applications.applications_title') }} </a></li>
	      </ol>
	  @endslot

	  @component('components.forms.success') @endcomponent


		@component('components.table')

				@slot('filters')
					<form class="form-inline">
			      <div class="form-group">
			        <label class="sr-only" for="inputInlineUsername">{{ __('applications.filter') }}</label>
			        <input type="text" class="form-control"
			        id="filter" name="filter" value="{{ old('filter') }}" placeholder="Filtro" autocomplete="off">
			      </div>

			      <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-outline">{{ __('applications.search') }}</button>
			      </div>
			    </form>
				@endslot

				@slot('columns')
					 <th> {{ __('applications.code') }} </th>
	         <th> {{ __('applications.name') }}</th>

	         <th> {{ __('applications.created_at') }}</th>

	         <th class="text-nowrap">{{ __('applications.actions') }}</th>
				@endslot

				@foreach ($applications as $application)

	        <tr>
	        	<td>{{ $application->code }}</td>

	        	<td>{{ $application->name }}</td>
	        	<td>{{ $application->created_at }}</td>


	        	<td class="text-nowrap">

	        		@component('components.table-option')
								@slot('title') {{ __('applications.edit') }} @endslot
								@slot('route') {{ url('/applications/edit/' . $application->id) }} @endslot
								@slot('icon') wb-wrench @endslot
							@endcomponent

	        	</td>
		      </tr>

	   		@endforeach

		@endcomponent


		@component('components.pagination')
			{{ $applications->appends(['filter' => old('filter')] )->links() }}
		@endcomponent


		<div class="site-action" data-plugin="actionBtn">
			<a href="applications/create">
	    <button type="button" class="site-action-toggle btn-raised btn btn-primary btn-floating">
	      <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
	      <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
	    </button>
	  	</a>

  </div>

	@endcomponent


@endsection
