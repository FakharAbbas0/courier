
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($city->name) ? $city->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">Zone</label>
    <div class="col-lg-10">
        <select name="zone_id" id="zone" class="form-control zone chosen-select">
            <option value="" disabled selected>Select zone</option>
            @foreach ($zones as $zone)
            <option value="{{$zone->id}}" {{isset($city->zone_id) && $city->zone_id == $zone->id ?
                "selected" : ""}} >{{$zone->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">Tax</label>
    <div class="col-lg-10">

        <input value="{{ isset($city->tax) ? $city->tax:'' }}" name="tax" type="number" class="form-control">
    </div>
</div>
