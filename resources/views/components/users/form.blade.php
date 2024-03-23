<form action="{{ $action }}" method="post">
    @csrf <!-- Diretiva do Blade contra o Cross-Site Request Forgery -->

    @if($update)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name" class="form-label">Nome</label>
        <input type="text"
               autofocus
               name="name"
               id="name"
               class="form-control"
               value="{{ isset($name) ? $name : old('name') }}">
    </div>
    <div class="form-group">
        <label for="email" class="form-label">E-mail</label>
        <input type="email"
               name="email"
               id="email"
               class="form-control"
               value="{{ isset($email) ? $email : old('email') }}">
    </div>
    @if(!$update)
        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   value="{{ old('password') }}">
        </div>
    @endif

    <button type="submit" class="btn btn-primary">
        {{ $button }}
    </button>
</form>
