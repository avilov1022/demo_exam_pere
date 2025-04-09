<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="text-center mb-20 text-5xl"></h1>
        <h1 class="text-center text-blue-500/100 mb-10 text-4xl">Регистрация</h1>
           <!-- Общее сообщение об ошибке -->
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <strong>Произошла ошибка при регистрации:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <!-- Login -->
          <div class="mt-4">
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" placeholder="Логин" maxlength="20" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Имя" maxlength="20" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Middlename -->
        <div class="mt-4">
            <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" required autofocus autocomplete="middlename" placeholder="Фамилия" maxlength="20" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div class="mt-4">
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" placeholder="Очество" maxlength="20" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- School -->
        <div class="mt-4">
            <x-text-input id="school" class="block mt-1 w-full" type="text" name="school" :value="old('school')" required autofocus autocomplete="school" placeholder="Школа" maxlength="20" />
            <x-input-error :messages="$errors->get('school')" class="mt-2" />
        </div>

        <!-- Сlass -->
        <div class="mt-4">
            <x-text-input id="class" class="block mt-1 w-full" type="text" name="class" :value="old('class')" required autofocus autocomplete="class" placeholder="Класс" maxlength="20" />
            <x-input-error :messages="$errors->get('class')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Почта" maxlength="20" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
 щас наушники будут уже. Где есть про шпоры? да, ты сказал
        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full" placeholder="Пароль" maxlength="20"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>
        

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Войти') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Зарегистрироваться') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
