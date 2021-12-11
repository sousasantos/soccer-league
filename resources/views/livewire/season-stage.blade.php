<div>
    @if ($stages)
        @forelse($stages as $stage)
            <h3>{{ $stage->name }}</h3>
            <livewire:standing-table :stage_id="$stage->id" :key="time().$stage->id"/>
        @empty
            <h4>Empty</h4>
        @endforelse  
    @endif
</div>
