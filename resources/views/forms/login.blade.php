<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <input type="email" name="email" class="mj-model-input @error('email') is-invalid @enderror" placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <input type="Password" name="password" class="mj-model-input @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <button class="btn mg-btn-primary mj-modelbtn">Log In</a>
        </div>
    </div>
</form>