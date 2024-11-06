<div>test</div>
<div class="admin__content">
    <form class="admin-form" action="/admin/representative" method="post">
        @csrf
        <div class="admin-form__group">
            <div class="profile-solid icon"></div>
            <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
        </div>
        <div class="error-message__group">
            <p class="admin-form__error-message">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="admin-form__group">
            <div class="mail-solid icon"></div>
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="error-message__group">
            <p class="admin-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="admin-form__group">
            <div class="lock-solid icon"></div>
            <input class="register-form__input" type="password" name="password" placeholder="Password">

        </div>
        <div class="error-message__group">
            <p class="admin-form__error-message">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="admin-form__group__button">
            <button class="admin-form__button" type="submit">
                作成
            </button>
        </div>
    </form>
</div>
<div class="admin__logout">
    <form method="post" action="{{ route('admin.login.destroy') }}">
        @method('DELETE')
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div>