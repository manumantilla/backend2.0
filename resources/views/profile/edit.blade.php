<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile Edit') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Formulario para actualizar la información del perfil -->
            <div class="mb-4">
                        <div class="flex items-center">
                            <!-- Mostrar la imagen de la base de datos -->
                            @if(auth()->user()->foto && file_exists(public_path('perfil/' . auth()->user()->foto)))
                                <img src="{{ asset('perfil/' . auth()->user()->foto) }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
                            @else
                                <span class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">No Image</span>
                            @endif
                        </div>
                    </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Update Profile Information') }}</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
          <!-- Mostrar la foto del perfil si existe -->
  
            <!-- Formulario para actualizar la contraseña -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Change Password') }}</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Formulario para eliminar la cuenta -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Delete Account') }}</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
