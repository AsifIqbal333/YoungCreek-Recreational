  <!-- Success Alert -->
  @if (session('success'))
      <div class="alert alert-success" role="alert">{{ session('success') }}</div>
  @endif

  @if (session('status'))
      <div class="alert alert-success" role="alert">{{ session('status') }}</div>
  @endif

  <!-- Error Alert -->
  @if (session('error'))
      <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
  @endif

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  {{-- <div class="alert alert-success" role="alert">alert message</div> --}}
