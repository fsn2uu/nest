<div class="field">
    <label for="name" class="label">Full Name</label>
    <p class="control">
        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text"
        name="name" id="name" required value="{{ isset($user) ? $user->name : old('name') }}">
        @if($errors->has('name'))
            <p class="help is-danger">
                {{ $errors->first('name') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="email" class="label">Email Address</label>
    <p class="control">
        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text"
        name="email" id="email" required value="{{ isset($user) ? $user->email : old('email') }}">
        @if($errors->has('email'))
            <p class="help is-danger">
                {{ $errors->first('email') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="password" class="label">Password</label>
    <p class="control">
        <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password"
        name="password" id="password" required>
        @if($errors->has('password'))
            <p class="help is-danger">
                {{ $errors->first('password') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="role_id" class="label">Role</label>
    <p class="select is-fullwidth">
        <select name="role_id" id="role_id" class="select {{ $errors->has('role_id') ? 'is-danger' : '' }}" required>
            <option value="">Select a Role</option>
            @foreach(\App\Role::all() as $r)
                @if ($r->display_name != 'Cysy' && $r->display_name != 'Travelers')
                    <option {{ isset($user) && $user->hasRole($r->name) ? 'selected' : '' }} value="{{ $r->id }}">{{ $r->display_name }}</option>
                @endif
            @endforeach
        </select>
        @if($errors->has('role_id'))
            <p class="help is-danger">
                {{ $errors->first('role_id') }}
            </p>
        @endif
    </p>
</div>
