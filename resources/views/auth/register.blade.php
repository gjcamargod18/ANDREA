
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="relative overflow-x-auto">
                    <div class="min-h-screen flex flex-col">
                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <x-label for="name" value="{{ __('Nombre Completo') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>
                            <div class="mt-4">
                                <x-select-td></x-select-td>
                            </div>
                            <div class="mt-4">
                                <x-label for="documento" value="{{ __('Documento') }}" />
                                <x-input id="documento" class="block mt-1 w-full" type="text" name="documento"
                                    :value="old('documento')" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-component-input-select></x-component-input-select>
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">


                                <x-button class="ml-4">
                                    {{ __('Registrar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

