@include('partials.flash_messages.flashMessages')
<div class="card">
    <div class="card-header">
        <h2>Order Information</h2>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Select Customer<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <select name="customer_id" id="customer_id" class="form-control customer_id chosen-select">
                            <option value="" disabled selected>Select Customer</option>
                            @foreach ($customers as $cust)
                                <option value="{{ $cust->id }}"
                                    {{ isset($order->customer_id) && $order->customer_id == $cust->id ? 'selected' : '' }}>
                                    {{ $cust->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Select Service<span class="required-star"> *</span></label>
                    <div class="col-lg-12">
                        <select name="service_id" id="service_id" class="form-control service_id">
                            <option value="" disabled selected>Select Service</option>
                            @foreach ($services as $ser)
                                <option value="{{ $ser->id }}"
                                    {{ isset($order->service_id) && $order->service_id == $ser->id ? 'selected' : '' }}>
                                    {{ $ser->service_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="form-group">
                    <label class="col-lg-12">Order Date<span class="required-star"> *</span></label>
                    <div class="col-lg-12 date_selector ">
                        <div class="input-group date ">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input value="{{ isset($order->order_date) ? $order->order_date : old('order_date') }}"
                                required="required" name="order_date" type="text" class="form-control">
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 order_lef_side">
        <div class="card card-info sender_info">
            <div class="card-header">
                Sender Information
            </div>
            <div class="card-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Origin<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <select name="origin" id="origin" class="form-control origin chosen-select">
                                <option value="" disabled selected>Origin</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ isset($order->origin) && $order->origin == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Sender Name<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->sname) ? $order->orderInfo->sname : old('sname') }}"
                                name="sname" type="text" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Email</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->semail) ? $order->orderInfo->semail : old('semail') }}"
                                name="semail" type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Phone</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->sphone) ? $order->orderInfo->sphone : old('sphone') }}"
                                name="sphone" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Sender Address</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->sender_address) ? $order->orderInfo->sender_address : old('saddress') }}"
                                name="saddress" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-info receiver_info">
            <div class="card-header">
                Receiver Information
            </div>
            <div class="card-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Destination<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <select name="destination" id="origin" class="form-control destination chosen-select">
                                <option value="" disabled selected>Destination</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ isset($order->origin) && $order->origin == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Receiver Name<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->rname) ? $order->orderInfo->rname : old('rname') }}"
                                name="rname" type="text" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Email</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->remail) ? $order->orderInfo->remail : old('remail') }}"
                                name="remail" type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Phone</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->rphone) ? $order->orderInfo->rphone : old('rphone') }}"
                                name="rphone" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Receiver Address</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->receiver_address) ? $order->orderInfo->receiver_address : old('raddress') }}"
                                name="raddress" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 order_right_side">
        <div class="card card-info order_information">
            <div class="card-header">
                Order Information
            </div>
            <div class="card-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Order Description<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->description) ? $order->orderInfo->description : old('description') }}"
                                name="description" type="text" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Order Note</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->order_info) ? $order->orderInfo->order_info : old('order_info') }}"
                                name="order_info" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Collection Amount</label>
                        <div class="col-lg-12">
                            <input value="{{ isset($order->cod_amount) ? $order->cod_amount : old('cod_amount') }}"
                                name="cod_amount" type="number" min="0" required="required" value="0"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Other Comments</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->orderInfo->comments) ? $order->orderInfo->comments : old('comments') }}"
                                name="comments" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                Order charges
            </div>
            <div class="card-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Delivery Charges<span class="required-star"> *</span></label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->delivery_charges) ? $order->delivery_charges : old('delivery_charges') }}"
                                name="delivery_charges" type="number" min="0" value="0"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Fuel Surcharge</label>
                        <div class="col-lg-12">
                            <input
                                value="{{ isset($order->fuel_surcharge) ? $order->fuel_surcharge : old('fuel_surcharge') }}"
                                name="fuel_surcharge" type="number" min="0" value="0"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Sales Tax</label>
                        <div class="col-lg-12">
                            <input value="{{ isset($order->sale_tax) ? $order->sale_tax : old('sale_tax') }}"
                                name="sale_tax" type="number" min="0" value="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="col-lg-12">Net Charges</label>
                        <div class="col-lg-12">
                            <input value="{{ isset($order->net_amount) ? $order->net_amount : old('net_amount') }}"
                                name="net_amount" type="number" min="0" value="0"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
