@props(['data', 'date', 'icon', 'color','currency'=>false])

<div class="col-xxl-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-grow-1 me-3">
            <p class="mb-1 fw-medium text-muted">{{ $slot }}</p>
            @if($currency)
            <h4 class="mb-1">@currency($data)</h4>
            @else
            <h4 class="mb-1">{{ $data  }}</h4>
            @endif
            <p class="mb-0 text-sm">{{ $date }}</p>
          </div>
          <div class="flex-shrink-0">
            <div class="avtar avtar-l {{ $color }} rounded-circle">
              <i class="{{ $icon }} f-28"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>