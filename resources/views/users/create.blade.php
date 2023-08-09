<x-app-layout>
    <x-slot name="header">
        {{ __('user.title') }}
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="mb-4 text-4xl font-bold">{{ __('message.user.create.title') }}</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700 dark:text-gray-300"
                    for="username">{{ __('message.user.username') }}</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none dark:text-gray-300"
                    id="username" name="username" type="text">
            </div>
            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700 dark:text-gray-300"
                    for="fullname">{{ __('message.user.fullName') }}:</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none dark:text-gray-300"
                    id="fullname" name="fullname" type="text">
            </div>
            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700 dark:text-gray-300"
                    for="email">Email:</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none dark:text-gray-300"
                    id="email" name="email" type="email">
            </div>
            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700 dark:text-gray-300"
                    for="password">{{ __('message.user.password') }}:</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none dark:text-gray-300"
                    id="password" name="password" type="password">
            </div>

            <!-- Add more input fields here -->
            <button type="submit"
                class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none">
                {{ __('Create') }} </button>
        </form>
    </div>
</x-app-layout>
