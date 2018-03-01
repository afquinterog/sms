
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

    @component('components.forms.errors') @endcomponent


		<div class="row row-lg">

      @component('components.forms.tabs')

        @slot('tabTitles')

          @component('components.forms.tab-title')
            @slot('title') Basicos @endslot
            @slot('name') basic @endslot
            @slot('active') basic @endslot
          @endcomponent

        @endslot


        @slot('tabContent')

          @component('components.forms.tab-item')
              @slot('name') basic @endslot
              @slot('active') basic @endslot

              @include('applications.edit-basic')

          @endcomponent

        @endslot


      @endcomponent


		</div>

	@endcomponent


@endsection
