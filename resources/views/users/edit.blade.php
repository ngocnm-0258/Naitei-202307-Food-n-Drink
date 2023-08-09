<x-app-layout>
    <x-slot name="header">
        {{ __('user.edit.title') }}    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $user->id }}" />
                        <div class="mb-4">
                            <label for="username"
                                class="block text-sm font-medium text-gray-700">{{ __('user.username') }}</label>
                            <input type="text" name="username" id="username" value="{{ $user->username }}"
                                class="form-input mt-1 block w-full rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="fullname"
                                class="block text-sm font-medium text-gray-700">{{ __('user.fullname') }}</label>
                            <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}"
                                class="form-input mt-1 block w-full rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="form-input mt-1 block w-full rounded-md">
                        </div>
                        <div>
                            <button type="submit" class="button edit">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
