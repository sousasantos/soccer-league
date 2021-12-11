<div>
  <select
    class="form-select"
    wire:model="season_id"
    name="seasons"
  >
  <option
    selected
    value="0"
  >Select Season</option>
    @foreach ($seasons as $season)
      <option
        value="{{ $season->id }}"
      >
        {{ $season->name }}
      </option>
    @endforeach
  </select>
</div>
