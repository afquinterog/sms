
<div class="panel-body container-fluid">

  <div class="div-wrap">

    <h4 class="div-title">{{ __('messages.messages_basic_information') }}</h4>


      <div class="example">
        <form action="/messages/store" method="POST" >

          {{ method_field('POST') }}

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $message->id }}">
         

          <div class="row">

            <div class="form-group col-xs-12 col-md-8">
              
              @component('components.forms.form-item-select', [ 'items' => $locations ] )
                @slot('title') Aplicaciones @endslot
                @slot('name') location_id @endslot
                @slot('value') {{ $message->location_id }} @endslot
              @endcomponent

            </div>

          </div>

          <div class="row">
             <div class="form-group col-xs-12 col-md-12">

              @component('components.forms.form-item-textarea')
                @slot('title') Mensaje @endslot
                @slot('placeholder') Mensaje a enviar @endslot
                @slot('name') message @endslot
                @slot('rows') 5 @endslot
                @slot('value') {{ $message->message }} @endslot
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

