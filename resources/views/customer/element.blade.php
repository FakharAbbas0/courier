@include('partials.flash_messages.flashMessages')
<div class="panel panel-info sender_info">
    <div class="panel-heading">
        General Information
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Name<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <input value="{{ isset($customer->name) ? $customer->name:'' }}" required="required" name="name"
                            type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Email<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <input value="{{ isset($customer->email) ? $customer->email:'' }}" required="required"
                            name="email" type="email" class="form-control">
                    </div>
                </div>
            </div>
            {{-- --}}
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Phone<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <input value="{{ isset($customer->phone) ? $customer->phone:'' }}" required="required"
                            name="phone" type="text" class="form-control">
                    </div>
                </div>
            </div>
            {{-- --}}
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Password<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <input value="" name="password" type="password" class="form-control" {{
                            (class_basename(Route::current()->uri) == 'create')?'required':'' }}>
                    </div>
                </div>
            </div>
            {{-- --}}
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Address<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <input value="{{ isset($customer->address) ? $customer->address:'' }}" name="address"
                            type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-lg-12">City<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <select name="city" id="city" class="form-control city chosen-select">
                                <option value="" disabled selected>Select City</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}" {{isset($customer->city) && $customer->city == $city->id ?
                                    "selected" : ""}} >{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-info sender_info">
    <div class="panel-heading">
        Charges Information
    </div>
    <div class="panel-body">
        <div class="row">
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-lg-12">Sales Tax<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <select name="sale_tax" id="sale_tax" class="form-control sale_tax chosen-select">
                                <option {{isset($customer->sale_tax) && $customer->sale_tax == 1 ?
                                    "selected" : ""}} value="1">Enable</option>
                                <option {{isset($customer->sale_tax) && $customer->sale_tax == 0 ?
                                    "selected" : ""}} value="0">Disable</option> 
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-lg-12">Fuel Surcharge<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <select name="fuel_surcharge" id="fuel_surcharge" class="form-control fuel_surcharge chosen-select">
                                <option {{isset($customer->fuel_surcharge) && $customer->fuel_surcharge == 1 ?
                                    "selected" : ""}} value="1">Enable</option>
                                <option {{isset($customer->fuel_surcharge) && $customer->fuel_surcharge == 0 ?
                                    "selected" : ""}} value="0">Disable</option> 
                            </select>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>