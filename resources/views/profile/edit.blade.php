<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if(session('success'))
                <x-notification type="success" :message="session('success')" />
            @endif
            @if(session('updated'))
                <x-notification type="updated" :message="session('updated')" />
            @endif
            @if(session('deleted'))
                <x-notification type="deleted" :message="session('deleted')" />
            @endif
            @if(session('error'))
                <x-notification type="error" :message="session('error')" />
            @endif
            <div class="glass-card p-10 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="glass-card p-10 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="glass-card p-10 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
