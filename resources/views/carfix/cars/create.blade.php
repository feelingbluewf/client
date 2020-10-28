@extends('layouts.app')

@section('content')

<!-- select2 js -->
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-weight: 600">
                    {{ __('Add a car') }}
                </div>
                <form action="{{ route('carfix.cars.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group has-feedback">
                            <label for="vin">VIN</label>
                            <input type="text" name="vin" class="form-control" id="vin" placeholder="VIN" value="{{ old('vin') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="car_number">Car Number</label>
                            <input type="text" name="car_number" class="form-control" id="car_number" placeholder="Car Number" value="{{ old('car_number') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="brand">Brand</label>
                            <select name="brand" data-placeholder="Choose car brand" class="form-control" id="brand" required>
                                <option></option>
                                <option>Audi</option>
                                <option>BMW</option>
                                <option>Buick</option>
                                <option>Cadillac</option>
                                <option>Chevrolet</option>
                                <option>Chrysler</option>
                                <option>Dodge</option>
                                <option>Ferrari</option>
                                <option>Ford</option>
                                <option>GM</option>
                                <option>GEM</option>
                                <option>GMC</option>
                                <option>Honda</option>
                                <option>Hummer</option>
                                <option>Hyundai</option>
                                <option>Infiniti</option>
                                <option>Isuzu</option>
                                <option>Jaguar</option>
                                <option>Jeep</option>
                                <option>Kia</option>
                                <option>Lamborghini</option>
                                <option>Land Rover</option>
                                <option>Lexus</option>
                                <option>Lincoln</option>
                                <option>Lotus</option>
                                <option>Mazda</option>
                                <option>Mercedes</option>
                                <option>Mercury</option>
                                <option>Mitsubishi</option>
                                <option>Nissan</option>
                                <option>Oldsmobile</option>
                                <option>Peugeot</option>
                                <option>Pontiac</option>
                                <option>Porsche</option>
                                <option>Regal</option>
                                <option>Saab</option>
                                <option>Saturn</option>
                                <option>Subaru</option>
                                <option>Suzuki</option>
                                <option>Toyota</option>
                                <option>Volkswagen</option>
                                <option>Volvo</option>
                            </select>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="brand">Model</label>
                            <input type="text" name="model" class="form-control" id="model" placeholder="Model" value="{{ old('model') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="year">Year</label>
                            <input type="text" name="year" class="form-control" id="year" placeholder="Year" value="{{ old('year') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px; width: 100%;">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
      return data;
  }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
  }

  if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text += ' (finded)';

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
  }


    // Return `null` if the term should not be displayed
    return null;
}

$("#brand").select2({
    matcher: matchCustom
});

</script>

@endsection
