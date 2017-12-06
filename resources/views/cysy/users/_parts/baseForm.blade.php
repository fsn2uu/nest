<div class="field">
    <label for="name" class="label">User Name</label>
    <p class="control">
        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" value="{{ old('name') }}"
        name="name" id="name" placeholder="Some Company" required value="{{ isset($user) ? $user->name : '' }}">
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
        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" value="{{ old('email') }}"
        name="email" id="email" placeholder="Some Company" required value="{{ isset($user) ? $user->email : '' }}">
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
        name="password" id="password" placeholder="Some Company" required value="{{ isset($user) ? $user->password : '' }}">
        @if($errors->has('password'))
            <p class="help is-danger">
                {{ $errors->first('password') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="company_id" class="label">Company</label>
    <p class="control">
        <select name="company_id" id="company_id" class="select {{ $errors->has('company_id') ? 'is-danger' : '' }}">
            <option value="">Select a Company</option>
            @foreach(\App\Company::all() as $r)
                <option {{ @$user->company_id == $r->id || old('company_id') == $r->id ? 'selected' : '' }}
                    value="{{ $r->id }}">{{ $r->name }}</option>
            @endforeach
        </select>
        <p class="help">
            Leave blank for CYSY employees.
        </p>
        @if($errors->has('company_id'))
            <p class="help is-danger">
                {{ $errors->first('company_id') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="role_id" class="label">Role</label>
    <p class="control">
        <select name="role_id" id="role_id" class="select {{ $errors->has('role_id') ? 'is-danger' : '' }}" required>
            <option value="">Select a Role</option>
            @foreach(\App\Role::all() as $r)
                <option {{ isset($user) && $user->hasRole($r->name) ? 'selected' : '' }} value="{{ $r->id }}">{{ $r->display_name }}</option>
            @endforeach
        </select>
        @if($errors->has('role_id'))
            <p class="help is-danger">
                {{ $errors->first('role_id') }}
            </p>
        @endif
    </p>
</div>
