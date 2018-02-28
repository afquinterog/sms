<div class="site-menubar site-menubar-light">
    {{-- Site menu component --}}
   <div class="site-menubar-body">
      <div>
        <div>

          <ul class="site-menu" data-plugin="menu">

            <li class="site-menu-category">Options</li>


            @component('components.menu-item-title')
              @slot('title') Dashboard @endslot
              @slot('route') dashboard @endslot
            @endcomponent


            @component('components.menu-item-title')

              @slot('title') Mensajes @endslot
              @slot('route') javascript::void(0) @endslot

             {{--  @component('components.menu-item-title-internal')

                @slot('title') Clientes @endslot
                @slot('route') javascript::void(0) @endslot

                  @component('components.menu-item')
                    @slot('title') Listado @endslot
                    @slot('route') customers @endslot
                  @endcomponent

                   @component('components.menu-item')
                    @slot('title') Categorias @endslot
                    @slot('route') customers @endslot
                  @endcomponent

              @endcomponent --}}

              @component('components.menu-item')
                @slot('title') Listado @endslot
                @slot('route') messages @endslot
              @endcomponent

              @component('components.menu-item')
                @slot('title') Aplicaciones @endslot
                @slot('route') applications @endslot
              @endcomponent

              @component('components.menu-item')
                @slot('title') Paises @endslot
                @slot('route') messages @endslot
              @endcomponent

            @endcomponent



          </ul>

        </div>
      </div>
    </div>
    {{-- End site menu component --}}
  </div>
