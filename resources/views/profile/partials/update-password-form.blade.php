<section>
    <header>
        <h2 class="text-lg font-bold text-gray-800 uppercase tracking-widest">
            Perbarui Kata Sandi
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Kata Sandi Saat Ini" class="text-gray-700 font-bold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-gray-50 border-none rounded-xl" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Kata Sandi Baru" class="text-gray-700 font-bold" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-gray-50 border-none rounded-xl" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Konfirmasi Kata Sandi" class="text-gray-700 font-bold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-gray-50 border-none rounded-xl" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn-gradient px-8 py-3">Simpan</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
