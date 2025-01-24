<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Smaž profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Jakmile bude váš účet smazán, budou trvale smazána všechna data s ním spojená. Před smazáním účtu si prosím stáhněte všechna data nebo informace, které si přejete zachovat.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Smaž profil') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Opravdu chcete smazat svůj účet?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Jakmile bude váš účet smazán, budou trvale smazána všechna jeho data. Zadejte prosím své heslo pro potvrzení, že chcete trvale smazat svůj účet.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Heslo') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Heslo') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Zpět') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Smaž profil') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
