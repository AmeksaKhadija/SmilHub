@if (session('success'))
    <div class="alert alert-success" style="background-color: #10b981; color: white; padding: 15px; margin: 20px 0; border-radius: 8px;">
        {{ session('success') }}
    </div>
@endif