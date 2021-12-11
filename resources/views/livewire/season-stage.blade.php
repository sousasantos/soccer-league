<div>
    <h1>teams</h1>

    @if ($stages)
        @forelse($stages as $stage)
            <p>{{ $stage->id }} -- {{ $stage->name }}</p>
            @foreach ($stage->standings as $standing)
                <small>{{ $standing->team_name }} -- {{ $standing->points }}</small><br>
            @endforeach
        @empty
            <h4>Empty</h4>
        @endforelse  
    @endif
</div>
