@livewireScripts()
<script type="module">
    $(document).on('click', '#btn-actualizar-ambiente', function(){
        var id = $(this).data('id-llave')
        $('#id-llave').val(id)
    })
</script>
<div>
    <!-- Main modal -->
    <div id="actualizar-llave" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="actualizar-llave">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar llave</h3>
                    <form class="space-y-6" method="POST" action="{{ route('actualizar-llave')}}">
                        @csrf @method('PATCH')
                        <div>
                            <input type="hidden" name="id-llave" id="id-llave">
                            <div>

                                <select id="id-ambiente" name="id-ambiente"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 dark:bg-white dark:border-bg-white dark:placeholder-gray-400 dark:text-black dark:focus:ring-lime-500 dark:focus:border-lime-500">
                                <option selected value="0">Seleccione un ambiente</option>
                                @foreach ( $ambientes as $ambiente )
                                   <option value="{{$ambiente->id}}">{{$ambiente->nombre_ambiente}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <x-button class="ml-4">
                            {{ __('Guardar') }}
                        </x-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
