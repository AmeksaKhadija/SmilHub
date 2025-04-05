@if(session('success'))
    <div class="alert alert-success" style="background-color: #10b981; color: white; padding: 15px; margin: 20px 0; border-radius: 8px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" style="background-color: #ef4444; color: white; padding: 15px; margin: 20px 0; border-radius: 8px;">
        {{ session('error') }}
    </div>
@endif