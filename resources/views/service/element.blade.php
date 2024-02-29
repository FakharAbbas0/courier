
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($service->service_type) ? $service->service_type:'' }}" required="required" name="service_type" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Description</label>
    <div class="col-lg-10"> 
        <input value="{{ isset($service->description) ? $service->description:'' }}" name="description" type="text" class="form-control">
    </div>
</div>
