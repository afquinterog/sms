
<div class="panel-body container-fluid">

  <div class="div-wrap">

    <h4 class="div-title">{{ __('applications.application_edit') }}</h4>


      <div class="example">
        <form action="/applications/store" method="POST" >


          {{ method_field('POST') }}

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $application->id }}">


          <div class="row">
             <div class="form-group col-xs-12 col-md-8">

              @component('components.forms.form-item-text')
                @slot('title') Código de la aplicación @endslot
                @slot('placeholder') Código @endslot
                @slot('name') code @endslot
                @slot('rows') 5 @endslot
                @slot('value') {{ $application->code }} @endslot
              @endcomponent

            </div>
          </div>


          <div class="row">
             <div class="form-group col-xs-12 col-md-8">

              @component('components.forms.form-item-text')
                @slot('title') Nombre de la aplicación @endslot
                @slot('placeholder') Nombre @endslot
                @slot('name') name @endslot
                @slot('rows') 5 @endslot
                @slot('value') {{ $application->name }} @endslot
              @endcomponent

            </div>
          </div>


          <div class="row">
            <div class="form-group col-xs-12 col-md-4 offset-md-0">

              <button type="submit" class="btn btn-primary">Guardar </button>

            </div>
          </div>

        </form>
      </div>

  </div>
</div>
