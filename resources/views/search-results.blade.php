<x-app-layout>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

            <livewire:live-search :category="false" :search="$searchText" :searchType="$searchType" />
        </div>
    </div>

</x-app-layout>
