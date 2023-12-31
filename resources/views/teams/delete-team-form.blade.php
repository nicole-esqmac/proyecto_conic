<x-action-section>
    <x-slot name="title">
        {{ __('Eliminar equipo') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Eliminar permanentemente este equipo.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Una vez eliminado un equipo, todos sus recursos y datos se borrarán permanentemente. Antes de eliminar este equipo, descargue cualquier dato o información relativa a este equipo que desee conservar.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Eliminar equipo') }}
            </x-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Eliminar equipo') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Está seguro de que desea eliminar este equipo? Una vez eliminado un equipo, todos sus recursos y datos se borrarán permanentemente.') }}
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Eliminar equipo') }}
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    </x-slot>
</x-action-section>
