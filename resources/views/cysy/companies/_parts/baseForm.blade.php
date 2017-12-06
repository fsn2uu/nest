<div class="field">
    <label for="name" class="label">Company Name</label>
    <p class="control">
        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text"
        name="name" id="name" value="{{ isset($company) ? $company->name : old('name') }}">
        @if($errors->has('name'))
            <p class="help is-danger">
                {{ $errors->first('name') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="phone" class="label">Phone</label>
    <p class="control">
        <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="text"
        name="phone" id="phone" placeholder="(XXX) XXX-XXXX" value="{{ isset($company) ? $company->phone : '' }}">
        @if($errors->has('phone'))
            <p class="help is-danger">
                {{ $errors->first('phone') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="email" class="label">Email Address</label>
    <p class="control">
        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text"
        name="email" id="email" placeholder="info@company.com" value="{{ isset($company) ? $company->email : '' }}">
        @if($errors->has('email'))
            <p class="help is-danger">
                {{ $errors->first('email') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="address" class="label">Address</label>
    <p class="control">
        <input class="input {{ $errors->has('address') ? 'is-danger' : '' }}" type="text"
        name="address" id="address" placeholder="123 Main Street" value="{{ isset($company) ? $company->address : '' }}">
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
        name="address2" id="address2" placeholder="Suite #" value="{{ isset($company) ? $company->address2 : '' }}">
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
        name="city" id="city" value="{{ isset($company) ? $company->city : '' }}">
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
        <div class="select {{ $errors->has('state') ? 'is-danger' : '' }}">
            <select name="state" id="state">
                <option value="">Select a State</option>
                <option value="AL"{{ (@$company->state == 'AL' || old('state') == 'AL')? ' selected' : '' }}>Alabama</option>
                <option value="AK"{{ (@$company->state == 'AK' || old('state') == 'AK')? ' selected' : '' }}>Alaska</option>
                <option value="AZ"{{ (@$company->state == 'AZ' || old('state') == 'AZ')? ' selected' : '' }}>Arizona</option>
                <option value="AR"{{ (@$company->state == 'AR' || old('state') == 'AR')? ' selected' : '' }}>Arkansas</option>
                <option value="CA"{{ (@$company->state == 'CA' || old('state') == 'CA')? ' selected' : '' }}>California</option>
                <option value="CO"{{ (@$company->state == 'CO' || old('state') == 'CO')? ' selected' : '' }}>Colorado</option>
                <option value="CT"{{ (@$company->state == 'CT' || old('state') == 'CT')? ' selected' : '' }}>Connecticut</option>
                <option value="DE"{{ (@$company->state == 'DE' || old('state') == 'DE')? ' selected' : '' }}>Delaware</option>
                <option value="DC"{{ (@$company->state == 'DC' || old('state') == 'DC')? ' selected' : '' }}>District Of Columbia</option>
                <option value="FL"{{ (@$company->state == 'FL' || old('state') == 'FL')? ' selected' : '' }}>Florida</option>
                <option value="GA"{{ (@$company->state == 'GA' || old('state') == 'GA')? ' selected' : '' }}>Georgia</option>
                <option value="HI"{{ (@$company->state == 'HI' || old('state') == 'HI')? ' selected' : '' }}>Hawaii</option>
                <option value="ID"{{ (@$company->state == 'ID' || old('state') == 'ID')? ' selected' : '' }}>Idaho</option>
                <option value="IL"{{ (@$company->state == 'IL' || old('state') == 'IL')? ' selected' : '' }}>Illinois</option>
                <option value="IN"{{ (@$company->state == 'IN' || old('state') == 'IN')? ' selected' : '' }}>Indiana</option>
                <option value="IA"{{ (@$company->state == 'IA' || old('state') == 'IA')? ' selected' : '' }}>Iowa</option>
                <option value="KS"{{ (@$company->state == 'KS' || old('state') == 'KS')? ' selected' : '' }}>Kansas</option>
                <option value="KY"{{ (@$company->state == 'KY' || old('state') == 'KY')? ' selected' : '' }}>Kentucky</option>
                <option value="LA"{{ (@$company->state == 'LA' || old('state') == 'LA')? ' selected' : '' }}>Louisiana</option>
                <option value="ME"{{ (@$company->state == 'ME' || old('state') == 'ME')? ' selected' : '' }}>Maine</option>
                <option value="MD"{{ (@$company->state == 'MD' || old('state') == 'MD')? ' selected' : '' }}>Maryland</option>
                <option value="MA"{{ (@$company->state == 'MA' || old('state') == 'MA')? ' selected' : '' }}>Massachusetts</option>
                <option value="MI"{{ (@$company->state == 'MI' || old('state') == 'MI')? ' selected' : '' }}>Michigan</option>
                <option value="MN"{{ (@$company->state == 'MN' || old('state') == 'MN')? ' selected' : '' }}>Minnesota</option>
                <option value="MS"{{ (@$company->state == 'MS' || old('state') == 'MS')? ' selected' : '' }}>Mississippi</option>
                <option value="MO"{{ (@$company->state == 'MO' || old('state') == 'MO')? ' selected' : '' }}>Missouri</option>
                <option value="MT"{{ (@$company->state == 'MT' || old('state') == 'MT')? ' selected' : '' }}>Montana</option>
                <option value="NE"{{ (@$company->state == 'NE' || old('state') == 'NE')? ' selected' : '' }}>Nebraska</option>
                <option value="NV"{{ (@$company->state == 'NV' || old('state') == 'NV')? ' selected' : '' }}>Nevada</option>
                <option value="NH"{{ (@$company->state == 'NH' || old('state') == 'NH')? ' selected' : '' }}>New Hampshire</option>
                <option value="NJ"{{ (@$company->state == 'NJ' || old('state') == 'NJ')? ' selected' : '' }}>New Jersey</option>
                <option value="NM"{{ (@$company->state == 'NM' || old('state') == 'NM')? ' selected' : '' }}>New Mexico</option>
                <option value="NY"{{ (@$company->state == 'NY' || old('state') == 'NY')? ' selected' : '' }}>New York</option>
                <option value="NC"{{ (@$company->state == 'NC' || old('state') == 'NC')? ' selected' : '' }}>North Carolina</option>
                <option value="ND"{{ (@$company->state == 'ND' || old('state') == 'ND')? ' selected' : '' }}>North Dakota</option>
                <option value="OH"{{ (@$company->state == 'OH' || old('state') == 'OH')? ' selected' : '' }}>Ohio</option>
                <option value="OK"{{ (@$company->state == 'OK' || old('state') == 'OK')? ' selected' : '' }}>Oklahoma</option>
                <option value="OR"{{ (@$company->state == 'OR' || old('state') == 'OR')? ' selected' : '' }}>Oregon</option>
                <option value="PA"{{ (@$company->state == 'PA' || old('state') == 'PA')? ' selected' : '' }}>Pennsylvania</option>
                <option value="RI"{{ (@$company->state == 'RI' || old('state') == 'RI')? ' selected' : '' }}>Rhode Island</option>
                <option value="SC"{{ (@$company->state == 'SC' || old('state') == 'SC')? ' selected' : '' }}>South Carolina</option>
                <option value="SD"{{ (@$company->state == 'SD' || old('state') == 'SD')? ' selected' : '' }}>South Dakota</option>
                <option value="TN"{{ (@$company->state == 'TN' || old('state') == 'TN')? ' selected' : '' }}>Tennessee</option>
                <option value="TX"{{ (@$company->state == 'TX' || old('state') == 'TX')? ' selected' : '' }}>Texas</option>
                <option value="UT"{{ (@$company->state == 'UT' || old('state') == 'UT')? ' selected' : '' }}>Utah</option>
                <option value="VT"{{ (@$company->state == 'VT' || old('state') == 'VT')? ' selected' : '' }}>Vermont</option>
                <option value="VA"{{ (@$company->state == 'VA' || old('state') == 'VA')? ' selected' : '' }}>Virginia</option>
                <option value="WA"{{ (@$company->state == 'WA' || old('state') == 'WA')? ' selected' : '' }}>Washington</option>
                <option value="WV"{{ (@$company->state == 'WV' || old('state') == 'WV')? ' selected' : '' }}>West Virginia</option>
                <option value="WI"{{ (@$company->state == 'WI' || old('state') == 'WI')? ' selected' : '' }}>Wisconsin</option>
                <option value="WY"{{ (@$company->state == 'WY' || old('state') == 'WY')? ' selected' : '' }}>Wyoming</option>
            </select>
        </div>
        @if($errors->has('state'))
            <p class="help is-danger">
                {{ $errors->first('state') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="zip" class="label">Zip Code</label>
    <p class="control">
        <input class="input {{ $errors->has('zip') ? 'is-danger' : '' }}" type="text"
        name="zip" id="zip" value="{{ isset($company) ? $company->zip : '' }}">
        @if($errors->has('zip'))
            <p class="help is-danger">
                {{ $errors->first('zip') }}
            </p>
        @endif
    </p>
</div>

<div class="field">
    <label for="url" class="label">Website</label>
    <p class="control">
        <input class="input {{ $errors->has('url') ? 'is-danger' : '' }}" type="text"
        name="url" id="url" value="{{ isset($company) ? $company->url : '' }}">
        @if($errors->has('url'))
            <p class="help is-danger">
                {{ $errors->first('url') }}
            </p>
        @endif
    </p>
</div>

<div class="file m-b-30">
  <label class="file-label">
    <input class="file-input" type="file" name="logo">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
  </label>

  @if(Request::segment(4) == 'edit')
      <p class="help m-l-20">
          Uploading a new logo will replace the existing one.
      </p>
  @endif
</div>
