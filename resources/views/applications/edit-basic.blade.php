
<div class="panel-body container-fluid">

  <div class="div-wrap">

    <h4 class="div-title">{{ __('applications.application_edit') }}</h4>


      <div class="example">
        <form action="/applications/update/{{$application->id}}" method="POST" >


          {{ method_field('POST') }}

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


          <div class="row">

            <div class="form-group col-xs-12 col-md-8">
              <label class="form-control-label" for="application">
              			Código de la aplicación
              </label>
              <input type="text" class="form-control"
			        id="code" name="code" value="{{ old('code', $application->code) }}" placeholder="código" autocomplete="off">

            </div>

          </div>

          <div class="row">
             <div class="form-group col-xs-12 col-md-8">

               <label class="form-control-label" for="application">
               			Nombre de la aplicación
               </label>
               <input type="text" class="form-control"
 			        id="name" name="name" value="{{ old('name', $application->name) }}" placeholder="nombre" autocomplete="off">

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
