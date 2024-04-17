
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($branch->name) ? $branch->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Description</label>
    <div class="col-lg-10"> 
        <input value="{{ isset($branch->description) ? $branch->description:'' }}" name="description" type="text" class="form-control">
    </div>
</div>
