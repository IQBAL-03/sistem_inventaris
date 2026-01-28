<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Carbon::setLocale('id');
        
        \Illuminate\Auth\Notifications\VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new \Illuminate\Notifications\Messages\MailMessage)
                ->subject('Verifikasi Alamat Email - ' . config('app.name'))
                ->greeting('Halo, ' . $notifiable->name . '!')
                ->line('Terima kasih telah bergabung di ' . config('app.name') . '.')
                ->line('Silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda dan mengaktifkan akun Anda.')
                ->action('Verifikasi Email Sekarang', $url)
                ->line('Jika Anda tidak merasa mendaftar di sistem kami, abaikan saja email ini.')
                ->salutation('Salam hangat, Tim ' . config('app.name'));
        });
    }
}
