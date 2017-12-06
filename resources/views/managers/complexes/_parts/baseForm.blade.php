<div class="field">
    <label for="name" class="label">Complex Name</label>
    <p class="control">
        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text"
        name="name" id="name" required
        value="{{ old('name') ? old('name') : isset($complex) ? $complex->name : '' }}">
        @if($errors->has('name'))
            <p class="help is-danger">
                {{ $errors->first('name') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="description" class="label">Description</label>
    <p class="control">
        <textarea name="description" id="" cols="30" rows="10" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{ old('description') ? old('description') : isset($complex) ? $complex->description : '' }}</textarea>
        @if($errors->has('description'))
            <p class="help is-danger">
                {{ $errors->first('description') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="address" class="label">Complex Address</label>
    <p class="control">
        <input class="input {{ $errors->has('address') ? 'is-danger' : '' }}" type="text"
        name="address" id="address" required
        value="{{ old('address') ? old('address') : isset($complex) ? $complex->address : '' }}">
        @if($errors->has('address'))
            <p class="help is-danger">
                {{ $errors->first('address') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="address2" class="label">Complex Address 2</label>
    <p class="control">
        <input class="input {{ $errors->has('address2') ? 'is-danger' : '' }}" type="text"
        name="address2" id="address2" placeholder="Suite #, etc."
        value="{{ old('address2') ? old('address2') : isset($complex) ? $complex->address2 : '' }}">
        @if($errors->has('address2'))
            <p class="help is-danger">
                {{ $errors->first('address2') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="city" class="label">City</label>
    <p class="control">
        <input class="input {{ $errors->has('city') ? 'is-danger' : '' }}" type="text"
        name="city" id="city" required
        value="{{ old('city') ? old('city') : isset($complex) ? $complex->city : '' }}">
        @if($errors->has('city'))
            <p class="help is-danger">
                {{ $errors->first('city') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="state" class="label">State</label>
    <p class="control">
        <select name="state" id="state" class="select" required>
            <option value="">Select a State</option>
            <option value="AL"{{ old('state') == 'AL' ? ' selected' : isset($complex) && $complex->state == 'AL' ? ' selected' : '' }}>
                Alabama</option>
            <option value="AK"{{ old('state') == 'AK' ? ' selected' : isset($complex) && $complex->state == 'AK' ? ' selected' : '' }}>
                Alaska</option>
            <option value="AZ"{{ old('state') == 'AZ' ? ' selected' : isset($complex) && $complex->state == 'AZ' ? ' selected' : '' }}>
                Arizona</option>
            <option value="AR"{{ old('state') == 'AR' ? ' selected' : isset($complex) && $complex->state == 'AR' ? ' selected' : '' }}>
                Arkansas</option>
            <option value="CA"{{ old('state') == 'CA' ? ' selected' : isset($complex) && $complex->state == 'CA' ? ' selected' : '' }}>
                California</option>
            <option value="CO"{{ old('state') == 'CO' ? ' selected' : isset($complex) && $complex->state == 'CO' ? ' selected' : '' }}>
                Colorado</option>
            <option value="CT"{{ old('state') == 'CT' ? ' selected' : isset($complex) && $complex->state == 'CT' ? ' selected' : '' }}>
                Connecticut</option>
            <option value="DE"{{ old('state') == 'DE' ? ' selected' : isset($complex) && $complex->state == 'DE' ? ' selected' : '' }}>
                Delaware</option>
            <option value="DC"{{ old('state') == 'DC' ? ' selected' : isset($complex) && $complex->state == 'DC' ? ' selected' : '' }}>
                District Of Columbia</option>
            <option value="FL"{{ old('state') == 'FL' ? ' selected' : isset($complex) && $complex->state == 'FL' ? ' selected' : '' }}>
                Florida</option>
            <option value="GA"{{ old('state') == 'GA' ? ' selected' : isset($complex) && $complex->state == 'GA' ? ' selected' : '' }}>
                Georgia</option>
            <option value="HI"{{ old('state') == 'HI' ? ' selected' : isset($complex) && $complex->state == 'HI' ? ' selected' : '' }}>
                Hawaii</option>
            <option value="ID"{{ old('state') == 'ID' ? ' selected' : isset($complex) && $complex->state == 'ID' ? ' selected' : '' }}>
                Idaho</option>
            <option value="IL"{{ old('state') == 'IL' ? ' selected' : isset($complex) && $complex->state == 'IL' ? ' selected' : '' }}>
                Illinois</option>
            <option value="IN"{{ old('state') == 'IN' ? ' selected' : isset($complex) && $complex->state == 'IN' ? ' selected' : '' }}>
                Indiana</option>
            <option value="IA"{{ old('state') == 'IA' ? ' selected' : isset($complex) && $complex->state == 'IA' ? ' selected' : '' }}>
                Iowa</option>
            <option value="KS"{{ old('state') == 'KS' ? ' selected' : isset($complex) && $complex->state == 'KS' ? ' selected' : '' }}>
                Kansas</option>
            <option value="KY"{{ old('state') == 'KY' ? ' selected' : isset($complex) && $complex->state == 'KY' ? ' selected' : '' }}>
                Kentucky</option>
            <option value="LA"{{ old('state') == 'LA' ? ' selected' : isset($complex) && $complex->state == 'LA' ? ' selected' : '' }}>
                Louisiana</option>
            <option value="ME"{{ old('state') == 'ME' ? ' selected' : isset($complex) && $complex->state == 'ME' ? ' selected' : '' }}>
                Maine</option>
            <option value="MD"{{ old('state') == 'MD' ? ' selected' : isset($complex) && $complex->state == 'MD' ? ' selected' : '' }}>
                Maryland</option>
            <option value="MA"{{ old('state') == 'MA' ? ' selected' : isset($complex) && $complex->state == 'MA' ? ' selected' : '' }}>
                Massachusetts</option>
            <option value="MI"{{ old('state') == 'MI' ? ' selected' : isset($complex) && $complex->state == 'MI' ? ' selected' : '' }}>
                Michigan</option>
            <option value="MN"{{ old('state') == 'MN' ? ' selected' : isset($complex) && $complex->state == 'MN' ? ' selected' : '' }}>
                Minnesota</option>
            <option value="MS"{{ old('state') == 'MS' ? ' selected' : isset($complex) && $complex->state == 'MS' ? ' selected' : '' }}>
                Mississippi</option>
            <option value="MO"{{ old('state') == 'MO' ? ' selected' : isset($complex) && $complex->state == 'MO' ? ' selected' : '' }}>
                Missouri</option>
            <option value="MT"{{ old('state') == 'MT' ? ' selected' : isset($complex) && $complex->state == 'MT' ? ' selected' : '' }}>
                Montana</option>
            <option value="NE"{{ old('state') == 'NE' ? ' selected' : isset($complex) && $complex->state == 'NE' ? ' selected' : '' }}>
                Nebraska</option>
            <option value="NV"{{ old('state') == 'NV' ? ' selected' : isset($complex) && $complex->state == 'NV' ? ' selected' : '' }}>
                Nevada</option>
            <option value="NH"{{ old('state') == 'NH' ? ' selected' : isset($complex) && $complex->state == 'NH' ? ' selected' : '' }}>
                New Hampshire</option>
            <option value="NJ"{{ old('state') == 'NJ' ? ' selected' : isset($complex) && $complex->state == 'NJ' ? ' selected' : '' }}>
                New Jersey</option>
            <option value="NM"{{ old('state') == 'NM' ? ' selected' : isset($complex) && $complex->state == 'NM' ? ' selected' : '' }}>
                New Mexico</option>
            <option value="NY"{{ old('state') == 'NY' ? ' selected' : isset($complex) && $complex->state == 'NY' ? ' selected' : '' }}>
                New York</option>
            <option value="NC"{{ old('state') == 'NC' ? ' selected' : isset($complex) && $complex->state == 'NC' ? ' selected' : '' }}>
                North Carolina</option>
            <option value="ND"{{ old('state') == 'ND' ? ' selected' : isset($complex) && $complex->state == 'ND' ? ' selected' : '' }}>
                North Dakota</option>
            <option value="OH"{{ old('state') == 'OH' ? ' selected' : isset($complex) && $complex->state == 'OH' ? ' selected' : '' }}>
                Ohio</option>
            <option value="OK"{{ old('state') == 'OK' ? ' selected' : isset($complex) && $complex->state == 'OK' ? ' selected' : '' }}>
                Oklahoma</option>
            <option value="OR"{{ old('state') == 'OR' ? ' selected' : isset($complex) && $complex->state == 'OR' ? ' selected' : '' }}>
                Oregon</option>
            <option value="PA"{{ old('state') == 'PA' ? ' selected' : isset($complex) && $complex->state == 'PA' ? ' selected' : '' }}>
                Pennsylvania</option>
            <option value="RI"{{ old('state') == 'RI' ? ' selected' : isset($complex) && $complex->state == 'RI' ? ' selected' : '' }}>
                Rhode Island</option>
            <option value="SC"{{ old('state') == 'SC' ? ' selected' : isset($complex) && $complex->state == 'SC' ? ' selected' : '' }}>
                South Carolina</option>
            <option value="SD"{{ old('state') == 'SD' ? ' selected' : isset($complex) && $complex->state == 'SD' ? ' selected' : '' }}>
                South Dakota</option>
            <option value="TN"{{ old('state') == 'TN' ? ' selected' : isset($complex) && $complex->state == 'TN' ? ' selected' : '' }}>
                Tennessee</option>
            <option value="TX"{{ old('state') == 'TX' ? ' selected' : isset($complex) && $complex->state == 'TX' ? ' selected' : '' }}>
                Texas</option>
            <option value="UT"{{ old('state') == 'UT' ? ' selected' : isset($complex) && $complex->state == 'UT' ? ' selected' : '' }}>
                Utah</option>
            <option value="VT"{{ old('state') == 'VT' ? ' selected' : isset($complex) && $complex->state == 'VT' ? ' selected' : '' }}>
                Vermont</option>
            <option value="VA"{{ old('state') == 'VA' ? ' selected' : isset($complex) && $complex->state == 'VA' ? ' selected' : '' }}>
                Virginia</option>
            <option value="WA"{{ old('state') == 'WA' ? ' selected' : isset($complex) && $complex->state == 'WA' ? ' selected' : '' }}>
                Washington</option>
            <option value="WV"{{ old('state') == 'WV' ? ' selected' : isset($complex) && $complex->state == 'WV' ? ' selected' : '' }}>
                West Virginia</option>
            <option value="WI"{{ old('state') == 'WI' ? ' selected' : isset($complex) && $complex->state == 'WI' ? ' selected' : '' }}>
                Wisconsin</option>
            <option value="WY"{{ old('state') == 'WY' ? ' selected' : isset($complex) && $complex->state == 'WY' ? ' selected' : '' }}>
                Wyoming</option>
        </select>
        @if($errors->has('state'))
            <p class="help is-danger">
                {{ $errors->first('state') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="zip" class="label">Zip</label>
    <p class="control">
        <input class="input {{ $errors->has('zip') ? 'is-danger' : '' }}" type="text"
        name="zip" id="zip" required
        value="{{ old('zip') ? old('zip') : isset($complex) ? $complex->zip : '' }}">
        @if($errors->has('zip'))
            <p class="help is-danger">
                {{ $errors->first('zip') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="phone" class="label">Phone</label>
    <p class="control">
        <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="text"
        name="phone" id="phone"
        value="{{ old('phone') ? old('phone') : isset($complex) ? $complex->phone : '' }}">
        @if($errors->has('phone'))
            <p class="help is-danger">
                {{ $errors->first('phone') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="phone2" class="label">Phone 2</label>
    <p class="control">
        <input class="input {{ $errors->has('phone2') ? 'is-danger' : '' }}" type="text"
        name="phone2" id="phone2"
        value="{{ old('phone2') ? old('phone2') : isset($complex) ? $complex->phone2 : '' }}">
        @if($errors->has('phone2'))
            <p class="help is-danger">
                {{ $errors->first('phone2') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="url" class="label">Website</label>
    <p class="control">
        <input class="input {{ $errors->has('url') ? 'is-danger' : '' }}" type="text"
        name="url" id="url"
        value="{{ old('url') ? old('url') : isset($complex) ? $complex->url : '' }}">
        @if($errors->has('url'))
            <p class="help is-danger">
                {{ $errors->first('url') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="" class="label">Rate Schedule</label>
    <div class="select">
        <select name="schedule_id" id="schedule_id">
            <option value="">Select a Rate Schedule</option>
            @foreach (Auth::user()->company->schedules as $r)
                <option {{ old('schedule_id') == $r->id ? 'selected' : isset($complex) && $complex->schedule_id == $r->id ? 'selected' : '' }} value="{{ $r->id }}">{{ $r->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<label for="" class="label">Photos</label>
<div class="file m-b-25">
  <label class="file-label">
    <input class="file-input" type="file" name="photos[]" multiple>
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose your photos…
      </span>
    </span>
  </label>
</div>
