<div
  class="modal fade"
  id="team-modal" 
  tabindex="-1"
  role="dialog" 
  aria-labelledby="team-modal-label"
  aria-hidden="true">
  <div
    class="modal-dialog  modal-lg"
    role="document">
    <div class="modal-content">
      <div class="modal-header">
        @if ($team)
          <img 
            src="{{ $team->logo_path }}"
            class="rounded float-start logo"
            alt="{{ $team->name }}">
          <h5 
            class="modal-title mx-4" 
            id="team-modal-label">
            {{ $team->name }}
          </h5>
        @else
          <h5>Not found</h5>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          @if(optional($team)->players)
            @foreach($team->players as $player)
              <div class="col-12 my-2">
                <div class="row">
                  <div class="col-2">
                    <img
                      style="max-height:40px;max-width:40px"
                      src="{{ $player->image_path }}"
                      alt="{{ $player->display_name }}">
                  </div>
                  <div class="col-1 text-center">
                    <strong>{{ $player->number ?? ' - ' }}</strong>
                  </div>
                  <div class="col-6">
                    <small class="mx-3">
                      {{ $player->display_name }}
                    </small>
                  </div>
                  <div class="col-3">
                    <small class="mx-3">
                      {{ $player->position }}
                    </small>
                  </div>
                </div>
              </div>       
            @endforeach
          @endif
        </div>
      </div>
      <div class="modal-footer">
        <button 
          type="button"
          data-bs-dismiss="modal"
          class="btn btn-primary close-modal">Close</button>
      </div>
    </div>
  </div>
</div>
