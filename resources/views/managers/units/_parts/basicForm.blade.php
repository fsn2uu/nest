<div class="field">
    <label for="name" class="label">Unit Name</label>
    <p class="control">
        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text"
        name="name" id="name" value="{{ isset($unit) ? $unit->name : '' }}">
        <p class="help">
            Do not enter the unit number here.  Unit numbers will automatically be added to the name by the system.
            If your unit name is 'complex name - unit number', leave this field blank.
        </p>
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
        <textarea name="description" id="description" cols="30" rows="10"
        class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{ isset($unit) ? $unit->description : '' }}</textarea>
        @if($errors->has('description'))
            <p class="help is-danger">
                {{ $errors->first('description') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="type" class="label">Unit Type</label>
    <p class="select is-fullwidth">
        <select name="type" id="type" class="select {{ $errors->has('type') ? 'is-danger' : '' }}">
            <option value="">Select a Unit Type</option>
            <option {{ old('type') && old('type') == 'condominium' ? 'selected' : isset($unit) && $unit->type == 'condominium' ? 'selected' : '' }} value="condominium">Condo</option>
            <option {{ old('type') && old('type') == 'townhome' ? 'selected' : isset($unit) && $unit->type == 'townhome' ? 'selected' : '' }} value="townhome">Townhome</option>
            <option {{ old('type') && old('type') == 'villa' ? 'selected' : isset($unit) && $unit->type == 'villa' ? 'selected' : '' }} value="villa">Villa</option>
            <option {{ old('type') && old('type') == 'single' ? 'selected' : isset($unit) && $unit->type == 'single' ? 'selected' : '' }} value="single">Single / Detached Home</option>
        </select>
    </p>
    @if ($errors->has('type'))
        <p class="help is-danger">
            {{ $errors->first('type') }}
        </p>
    @endif
</div>

<div class="field">
    <label for="name" class="label">Complex</label>
    <p class="select is-fullwidth">
        <select name="complex_id" id="complex_id" class="select {{ $errors->has('complex_id') ? ' is-danger' : '' }}">
            <option value="">Select a Complex</option>
            @foreach(App\Complex::all() as $row)
                <option value="{{ $row->id }}"{{ (@$unit->complex_id == $row->id || Request::get('complex_id') == $row->id)? ' selected' : '' }}>{{ $row->name }}</option>
            @endforeach
        </select>
        <p class="help">
            Complexes are not required.  Only choose a complex if the unit does not have a shared address.
        </p>
        @if($errors->has('complex_id'))
            <p class="help is-danger">
                {{ $errors->first('complex_id') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="unit_no" class="label">Unit Number</label>
    <p class="control">
        <input class="input {{ $errors->has('unit_no') ? 'is-danger' : '' }}" type="text"
        name="unit_no" id="unit_no" value="{{ isset($unit) ? $unit->unit_no : '' }}">
        <p class="help">
            Do not enter the word 'Unit' here.  'Unit' will be added where it is needed.
        </p>
        @if($errors->has('unit_no'))
            <p class="help is-danger">
                {{ $errors->first('unit_no') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="beds" class="label"># Bedrooms</label>
    <p class="control">
        <input class="input {{ $errors->has('beds') ? 'is-danger' : '' }}" type="text"
        name="beds" id="beds" value="{{ isset($unit) ? $unit->beds : '' }}">
        @if($errors->has('beds'))
            <p class="help is-danger">
                {{ $errors->first('beds') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="baths" class="label"># Bathrooms</label>
    <p class="control">
        <input class="input {{ $errors->has('baths') ? 'is-danger' : '' }}" type="text"
        name="baths" id="baths" value="{{ isset($unit) ? $unit->baths : '' }}">
        @if($errors->has('baths'))
            <p class="help is-danger">
                {{ $errors->first('baths') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="sleeps" class="label"># Sleeps</label>
    <p class="control">
        <input class="input {{ $errors->has('sleeps') ? 'is-danger' : '' }}" type="text"
        name="sleeps" id="sleeps" value="{{ isset($unit) ? $unit->sleeps : '' }}">
        @if($errors->has('sleeps'))
            <p class="help is-danger">
                {{ $errors->first('sleeps') }}
            </p>
        @endif
    </p>
</div>

<div class="form-check">
    <b-checkbox class="form-check-input" type="checkbox" name="pet_friendly" value="1"{{ (@$unit->pet_friendly == 1) ? ' checked' : '' }}>
        Pet Friendly
    </b-checkbox>
</div>

<div class="field">
    <label for="address" class="label">Address</label>
    <p class="control">
        <input class="input {{ $errors->has('address') ? 'is-danger' : '' }}" type="text"
        name="address" id="address" value="{{ isset($unit) ? $unit->address : '' }}">
        <p class="help">
            Add an address if the unit is not part of a complex.  Units added to complexes will inherit the address of the complex, unless you specify one here.
        </p>
        @if($errors->has('address'))
            <p class="help is-danger">
                {{ $errors->first('address') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="address2" class="label">Address 2</label>
    <p class="control">
        <input class="input {{ $errors->has('address2') ? 'is-danger' : '' }}" type="text"
        name="address2" id="address2" value="{{ isset($unit) ? $unit->address2 : '' }}">
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
        name="city" id="city" value="{{ isset($unit) ? $unit->city : '' }}">
        @if($errors->has('city'))
            <p class="help is-danger">
                {{ $errors->first('city') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="state" class="label">State</label>
    <p class="select is-fullwidth">
        <select name="state" id="state" class="select {{ $errors->has('state') ? 'is-danger' : '' }}">
            <option value="">Select a State</option>
            <option value="AL"{{ old('state') == 'AL' ? ' selected' : isset($unit) && $unit->state == 'AL' ? ' selected' : '' }}>
                Alabama</option>
            <option value="AK"{{ old('state') == 'AK' ? ' selected' : isset($unit) && $unit->state == 'AK' ? ' selected' : '' }}>
                Alaska</option>
            <option value="AZ"{{ old('state') == 'AZ' ? ' selected' : isset($unit) && $unit->state == 'AZ' ? ' selected' : '' }}>
                Arizona</option>
            <option value="AR"{{ old('state') == 'AR' ? ' selected' : isset($unit) && $unit->state == 'AR' ? ' selected' : '' }}>
                Arkansas</option>
            <option value="CA"{{ old('state') == 'CA' ? ' selected' : isset($unit) && $unit->state == 'CA' ? ' selected' : '' }}>
                California</option>
            <option value="CO"{{ old('state') == 'CO' ? ' selected' : isset($unit) && $unit->state == 'CO' ? ' selected' : '' }}>
                Colorado</option>
            <option value="CT"{{ old('state') == 'CT' ? ' selected' : isset($unit) && $unit->state == 'CT' ? ' selected' : '' }}>
                Connecticut</option>
            <option value="DE"{{ old('state') == 'DE' ? ' selected' : isset($unit) && $unit->state == 'DE' ? ' selected' : '' }}>
                Delaware</option>
            <option value="DC"{{ old('state') == 'DC' ? ' selected' : isset($unit) && $unit->state == 'DC' ? ' selected' : '' }}>
                District Of Columbia</option>
            <option value="FL"{{ old('state') == 'FL' ? ' selected' : isset($unit) && $unit->state == 'FL' ? ' selected' : '' }}>
                Florida</option>
            <option value="GA"{{ old('state') == 'GA' ? ' selected' : isset($unit) && $unit->state == 'GA' ? ' selected' : '' }}>
                Georgia</option>
            <option value="HI"{{ old('state') == 'HI' ? ' selected' : isset($unit) && $unit->state == 'HI' ? ' selected' : '' }}>
                Hawaii</option>
            <option value="ID"{{ old('state') == 'ID' ? ' selected' : isset($unit) && $unit->state == 'ID' ? ' selected' : '' }}>
                Idaho</option>
            <option value="IL"{{ old('state') == 'IL' ? ' selected' : isset($unit) && $unit->state == 'IL' ? ' selected' : '' }}>
                Illinois</option>
            <option value="IN"{{ old('state') == 'IN' ? ' selected' : isset($unit) && $unit->state == 'IN' ? ' selected' : '' }}>
                Indiana</option>
            <option value="IA"{{ old('state') == 'IA' ? ' selected' : isset($unit) && $unit->state == 'IA' ? ' selected' : '' }}>
                Iowa</option>
            <option value="KS"{{ old('state') == 'KS' ? ' selected' : isset($unit) && $unit->state == 'KS' ? ' selected' : '' }}>
                Kansas</option>
            <option value="KY"{{ old('state') == 'KY' ? ' selected' : isset($unit) && $unit->state == 'KY' ? ' selected' : '' }}>
                Kentucky</option>
            <option value="LA"{{ old('state') == 'LA' ? ' selected' : isset($unit) && $unit->state == 'LA' ? ' selected' : '' }}>
                Louisiana</option>
            <option value="ME"{{ old('state') == 'ME' ? ' selected' : isset($unit) && $unit->state == 'ME' ? ' selected' : '' }}>
                Maine</option>
            <option value="MD"{{ old('state') == 'MD' ? ' selected' : isset($unit) && $unit->state == 'MD' ? ' selected' : '' }}>
                Maryland</option>
            <option value="MA"{{ old('state') == 'MA' ? ' selected' : isset($unit) && $unit->state == 'MA' ? ' selected' : '' }}>
                Massachusetts</option>
            <option value="MI"{{ old('state') == 'MI' ? ' selected' : isset($unit) && $unit->state == 'MI' ? ' selected' : '' }}>
                Michigan</option>
            <option value="MN"{{ old('state') == 'MN' ? ' selected' : isset($unit) && $unit->state == 'MN' ? ' selected' : '' }}>
                Minnesota</option>
            <option value="MS"{{ old('state') == 'MS' ? ' selected' : isset($unit) && $unit->state == 'MS' ? ' selected' : '' }}>
                Mississippi</option>
            <option value="MO"{{ old('state') == 'MO' ? ' selected' : isset($unit) && $unit->state == 'MO' ? ' selected' : '' }}>
                Missouri</option>
            <option value="MT"{{ old('state') == 'MT' ? ' selected' : isset($unit) && $unit->state == 'MT' ? ' selected' : '' }}>
                Montana</option>
            <option value="NE"{{ old('state') == 'NE' ? ' selected' : isset($unit) && $unit->state == 'NE' ? ' selected' : '' }}>
                Nebraska</option>
            <option value="NV"{{ old('state') == 'NV' ? ' selected' : isset($unit) && $unit->state == 'NV' ? ' selected' : '' }}>
                Nevada</option>
            <option value="NH"{{ old('state') == 'NH' ? ' selected' : isset($unit) && $unit->state == 'NH' ? ' selected' : '' }}>
                New Hampshire</option>
            <option value="NJ"{{ old('state') == 'NJ' ? ' selected' : isset($unit) && $unit->state == 'NJ' ? ' selected' : '' }}>
                New Jersey</option>
            <option value="NM"{{ old('state') == 'NM' ? ' selected' : isset($unit) && $unit->state == 'NM' ? ' selected' : '' }}>
                New Mexico</option>
            <option value="NY"{{ old('state') == 'NY' ? ' selected' : isset($unit) && $unit->state == 'NY' ? ' selected' : '' }}>
                New York</option>
            <option value="NC"{{ old('state') == 'NC' ? ' selected' : isset($unit) && $unit->state == 'NC' ? ' selected' : '' }}>
                North Carolina</option>
            <option value="ND"{{ old('state') == 'ND' ? ' selected' : isset($unit) && $unit->state == 'ND' ? ' selected' : '' }}>
                North Dakota</option>
            <option value="OH"{{ old('state') == 'OH' ? ' selected' : isset($unit) && $unit->state == 'OH' ? ' selected' : '' }}>
                Ohio</option>
            <option value="OK"{{ old('state') == 'OK' ? ' selected' : isset($unit) && $unit->state == 'OK' ? ' selected' : '' }}>
                Oklahoma</option>
            <option value="OR"{{ old('state') == 'OR' ? ' selected' : isset($unit) && $unit->state == 'OR' ? ' selected' : '' }}>
                Oregon</option>
            <option value="PA"{{ old('state') == 'PA' ? ' selected' : isset($unit) && $unit->state == 'PA' ? ' selected' : '' }}>
                Pennsylvania</option>
            <option value="RI"{{ old('state') == 'RI' ? ' selected' : isset($unit) && $unit->state == 'RI' ? ' selected' : '' }}>
                Rhode Island</option>
            <option value="SC"{{ old('state') == 'SC' ? ' selected' : isset($unit) && $unit->state == 'SC' ? ' selected' : '' }}>
                South Carolina</option>
            <option value="SD"{{ old('state') == 'SD' ? ' selected' : isset($unit) && $unit->state == 'SD' ? ' selected' : '' }}>
                South Dakota</option>
            <option value="TN"{{ old('state') == 'TN' ? ' selected' : isset($unit) && $unit->state == 'TN' ? ' selected' : '' }}>
                Tennessee</option>
            <option value="TX"{{ old('state') == 'TX' ? ' selected' : isset($unit) && $unit->state == 'TX' ? ' selected' : '' }}>
                Texas</option>
            <option value="UT"{{ old('state') == 'UT' ? ' selected' : isset($unit) && $unit->state == 'UT' ? ' selected' : '' }}>
                Utah</option>
            <option value="VT"{{ old('state') == 'VT' ? ' selected' : isset($unit) && $unit->state == 'VT' ? ' selected' : '' }}>
                Vermont</option>
            <option value="VA"{{ old('state') == 'VA' ? ' selected' : isset($unit) && $unit->state == 'VA' ? ' selected' : '' }}>
                Virginia</option>
            <option value="WA"{{ old('state') == 'WA' ? ' selected' : isset($unit) && $unit->state == 'WA' ? ' selected' : '' }}>
                Washington</option>
            <option value="WV"{{ old('state') == 'WV' ? ' selected' : isset($unit) && $unit->state == 'WV' ? ' selected' : '' }}>
                West Virginia</option>
            <option value="WI"{{ old('state') == 'WI' ? ' selected' : isset($unit) && $unit->state == 'WI' ? ' selected' : '' }}>
                Wisconsin</option>
            <option value="WY"{{ old('state') == 'WY' ? ' selected' : isset($unit) && $unit->state == 'WY' ? ' selected' : '' }}>
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
        name="zip" id="zip" value="{{ isset($unit) ? $unit->zip : '' }}">
        @if($errors->has('zip'))
            <p class="help is-danger">
                {{ $errors->first('zip') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="schedule_id" class="label">Rate Schedule</label>
    <p class="select is-fullwidth">
        <select name="schedule_id" id="schedule_id" class="select">
            <option value="">Select a Rate Schedule</option>
            @foreach(\App\Schedule::all() as $r)
                <option value="{{ $r->id }}"{{ (@$unit->schedule_id == $r->id) ? ' selected' : '' }}>{{ $r->name }}</option>
            @endforeach
        </select>
        @if($errors->has('schedule_id'))
            <p class="help is-danger">
                {{ $errors->first('schedule_id') }}
            </p>
        @endif
    </p>
</div>

<label for="" class="label">Photos<i class="fa fa-info-circle pic-help m-l-15"></i></label>
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
[POPOVER]You can upload as many photos as you like, however, keep in mind that most travelers won't watch the photos for long.  Also, remember that photos must adhere to the quality standards you agreed to when you created your account.[/POPOVER]
