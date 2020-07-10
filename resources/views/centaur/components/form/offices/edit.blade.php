@component('Centaur::components.form.main', [
    'id'      => $id ?? '',
    'name'    => $name ?? '',
    'class'   => $class ?? '',
    'method'  => $method ?? '',
    'param'   => $param ?? '',
    'route'   => $route ?? '',
])
@slot('csrf')
@csrf
@endslot
@slot('elements')
    <div class="form-group @error ('city') has-error @enderror">
        <label for="city">City</label>
        <input class="form-control" name="city" type="text" id="city" value="{{ $param->city }}">
        @error('city')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @error ('phone') has-error @enderror">
        <label for="phone">Phone</label>
        <input class="form-control" name="phone" type="text" id="phone" value="{{ $param->phone }}">
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @error ('addressLine1') has-error @enderror">
        <label for="addressLine1">Address 1</label>
        <input class="form-control" name="addressLine1" type="text" id="addressLine1" value="{{ $param->addressLine1 }}">
        @error('addressLine1')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="addressLine2">Address 2</label>
        <input class="form-control" name="addressLine2" type="text" id="addressLine2" value="{{ $param->addressLine2 }}">
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <input class="form-control" name="state" type="text" id="state" value="{{ $param->state }}">
    </div>
    <div class="form-group @error ('country') has-error @enderror">
        <label for="country">Country</label>
        <input class="form-control" name="country" type="text" id="country" value="{{ $param->country }}">
        @error('country')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @error ('postalCode') has-error @enderror">
        <label for="postalCode">Postal Code</label>
        <input class="form-control" name="postalCode" type="text" id="postalCode" value="{{ $param->postalCode }}">
        @error('postalCode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @error ('territory') has-error @enderror">
        <label for="territory">Territory</label>
        <input class="form-control" name="territory" type="text" id="territory" value="{{ $param->territory }}">
        @error('territory')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
@endslot
@slot('hidden')
    @method('PUT')
@endslot
@slot('buttons')
<button type="submit" class="btn btn-success btn-lg btn-block">Save changes</button>
<a href="{{ route('offices.index') }}" type="button" class="btn btn-danger btn-lg btn-block">Cancel</a>
@endslot
@endcomponent
