<x-app-layout>
    <x-slot name="header">
        {{ __('user.show.title') }}
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6 ">
                    <p class="group relative ">
                        <strong>{{ __('user.username') }}:</strong>
                        {{ $user->username }}
                        <span
                            class="absolute -bottom-12 hidden rounded bg-slate-400 p-2 before:absolute before:-top-1 before:right-2 before:block before:h-4 before:w-4 before:rotate-45 before:bg-slate-400 group-hover:block">
                            {{ __('Create At') }}
                            {{ $user->created_at }}
                        </span>
                    </p>
                    <p class=""><strong>{{ __('user.fullname') }}:</strong>
                        {{ $user->fullName }}
                    </p>
                    <p class=""><strong>Email:</strong>
                        {{ $user->email }}
                    </p>
                    <div class="mt-4 flex justify-end pb-4">
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                            class="mr-2 button edit">
                            {{ __('Edit') }}
                        </a>
                        <form method="POST"
                            action="{{ route('users.destroy', $user->id) }}"class="button delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                data-confirm="{{ __('global.Confirm Delete') }}">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
