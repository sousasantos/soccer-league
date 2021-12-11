<div>
  <select
    wire:model="league_id"
    name="leagues"
  >
  <option value="0">Select League</option>
    @foreach ($leagues as $league)
      <option
        value="{{ $league->id }}"
      >
        {{ $league->name }}
      </option>
    @endforeach
  </select>
</div>
