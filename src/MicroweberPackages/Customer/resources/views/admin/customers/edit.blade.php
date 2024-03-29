@extends('customer::admin.layout')

@section('icon')
    <i class="mdi mdi-account-edit module-icon-svg-fill"></i>
@endsection

@if (isset($customer) && $customer)
    {{--@section('title', 'Edit customer')--}}
    @section('title', 'Client information')
@else
    {{--@section('title', 'Add new customer')--}}
    @section('title', 'Client information')
@endif

@section('content')

    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br/>
            @endforeach
        </div><br/>
    @endif

    <form method="post" action="@if($customer){{route('admin.customers.update', $customer->id)}}@else{{route('admin.customers.store')}}@endif">
        @if($customer)
            @method('PUT')
        @endif
        @csrf
        <div class=" col-xxl-10 col-md-11 col-12 px-md-0 px-2 mx-auto">
           <div class="row align-items-center flex-wrap">

               <div class="col-md-6 col-12">
                   <div class="card mb-5 ">
                       <div class="card-body">
                           <div class="row">
                               <div class="">
                                   <h3 class="main-pages-title"><?php _e("Client card"); ?></h3>

                                   @if($customer AND isset($customer->first_name))

                                       <div>
                                           <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Full Name"); ?>:</label>
                                           <span class="ml-2 mb-1">{{$customer->first_name}} {{$customer->last_name}}</span>
                                       </div>

                                       <div>
                                           <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Email"); ?>:</label>
                                           <span class="ml-2 mb-1">{{$customer->email}}</span>
                                       </div>

                                       <div>
                                           <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Phone"); ?>:</label>
                                           <span class="ml-2 mb-1">{{$customer->phone}}</span>
                                       </div>
                                   @else
                                       <div class="text-center">
                                           <span class="d-block"><i class="mdi mdi-account text-muted" style="opacity: 0.5; font-size: 50px;"></i></span>
                                           <span class="d-block mb-1"><?php _e("No information"); ?></span>
                                       </div>
                                   @endif

                               </div>
                           </div>
                       </div>
                   </div>

               </div>

               <div class="col-md-6 col-12">
                    <div class="card mb-5 ">
                   <div class="card-body">
                       <div class="row">
                           <div class="">
                               <label class=" mb-3 main-pages-title"><?php _e("Client information"); ?></label>

                               {{--<div class="form-group">--}}
                               {{--<label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Display Name"); ?>:</label>--}}
                               {{--<input type="text" class="form-control" value="@if($customer){{$customer->name}}@endif" required="required" name="name"/>--}}
                               {{--</div>--}}

                               <div class="form-group">
                                   <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("First Name"); ?>:</label>
                                   <input type="text" class="form-control" value="@if($customer){{$customer->first_name}}@endif" required="required" name="first_name"/>
                               </div>

                               <div class="form-group">
                                   <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Last Name"); ?>:</label>
                                   <input type="text" class="form-control" value="@if($customer){{$customer->last_name}}@endif" required="required" name="last_name"/>
                               </div>

                               <div class="form-group">
                                   <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Email"); ?>:</label>
                                   <input type="email" class="form-control" value="@if($customer){{$customer->email}}@endif" required="required" name="email"/>
                               </div>

                               <div class="form-group">
                                   <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Phone"); ?>:</label>
                                   <input type="text" class="form-control" value="@if($customer){{$customer->phone}}@endif" required="required" name="phone"/>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
                </div>
           </div>

          <div class="row align-items-center flex-wrap">

              <div class="col-md-6 col-12">

                <div class="card mb-5">
                  <div class="card-body">
                      <div class="row">
                          <div class="">
                              <h3 class="main-pages-title"><?php _e("Shipping card"); ?></h3>

                              @if(isset($customer->addresses[0]) AND isset($customer->addresses[0]->name))
                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Address"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[0]->address_street_1}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("City"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[0]->city}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("ZIP Code"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[0]->zip}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("State"); ?>:</label>
                                      <span class="mb-1">  {{$customer->addresses[0]->state}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Country"); ?>:</label>
                                      @if(isset($customer->addresses[0]) AND isset($customer->addresses[0]->country )  AND isset($customer->addresses[0]->country->name ))
                                          <span class="mb-1">{{$customer->addresses[0]->country->name}}</span>
                                      @endif                                </div>

                                  {{--<span class="d-block mb-1">{{$customer->addresses[0]->address_street_1}}</span>--}}

                              @else
                                  <div class="text-center">
                                      <span class="d-block"><i class="mdi mdi-truck text-muted" style="opacity: 0.5; font-size: 50px;"></i></span>
                                      <span class="d-block mb-1"><?php _e("No information"); ?></span>
                                  </div>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
              </div>

              <div class="col-md-6 col-12">

                <div class="card mb-5">
                  <div class="card-body">
                      <div class="row">
                          <div class="">
                              <label class="main-pages-title"><?php _e("Shipping Address"); ?></label>

                              <div class="form-group d-none">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Address Name"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[0])){{$customer->addresses[0]->name}}@endif" name="addresses[0][name]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Address"); ?>:</label>
                                  <textarea class="form-control" placeholder="Street 1" name="addresses[0][address_street_1]">@if(isset($customer->addresses[0])){{$customer->addresses[0]->address_street_1}}@endif</textarea>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("City"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[0])){{$customer->addresses[0]->city}}@endif" name="addresses[0][city]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("ZIP Code"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[0])){{$customer->addresses[0]->zip}}@endif" name="addresses[0][zip]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("State"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[0])){{$customer->addresses[0]->state}}@endif" name="addresses[0][state]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label d-block"><?php _e("Country"); ?>:</label>
                                  <select class="form-select" data-live-search="true" data-width="100%" data-size="5" name="addresses[0][country_id]">
                                      @foreach($countries as $country)
                                          <option @if(isset($customer->addresses[0]) && $customer->addresses[0]->country_id == $country->id)selected="selected" @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                              </div>

                              <input type="hidden" class="form-control" value="shipping" name="addresses[0][type]"/>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>

          <div class="row align-items-center flex-wrap">
              <div class="col-md-6 col-12">
                <div class="card mb-5">
                  <div class="card-body">
                      <div class="row">
                          <div class="">
                              <h3 class="main-pages-title"><?php _e("Company card"); ?></h3>
                              @if(isset($customer->addresses[1]) AND isset($customer->addresses[1]->company_name))
                                  <span class="d-block"><i class="mdi mdi-office-building text-muted mdi-30px"></i></span>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Company Name"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->company_name}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Company ID"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->company_id}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("VAT Number"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->company_vat}}</span>
                                  </div>

                                  <div class="">
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("VAT Registered"); ?>:</label>
                                      <span class="ml-2 mb-1">
                                    @if ( $customer->addresses[1]->company_vat_registered  == "1")
                                                  <?= _e("Yes"); ?>
                                          @else
                                                  <?= _e("No"); ?>
                                          @endif
                                </span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Address"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->address_street_1}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("City"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->city}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("ZIP Code"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->zip}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("State"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[0]->state}}</span>
                                  </div>

                                  <div>
                                      <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Country"); ?>:</label>
                                      <span class="mb-1">{{$customer->addresses[1]->country->name}}</span>
                                  </div>

                              @else
                                  <div class="text-center">
                                      <span class="d-block"><i class="mdi mdi-office-building text-muted" style="opacity: 0.5; font-size: 50px;"></i></span>
                                      <span class="d-block mb-1"><?php _e("No information"); ?></span>
                                  </div>
                              @endif

                          </div>
                      </div>
                  </div>
              </div>
              </div>


              <div class="col-md-6 col-12">
                <div class="card mb-5">
                  <div class="card-body">
                      <div class="row">
                          <div class="">
                              <label class="main-pages-title"><?php _e("Billing Address"); ?></label>

                              <div class="form-group d-none">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Address Name"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->name}}@endif" name="addresses[1][name]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Company Name"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->company_name}}@endif" name="addresses[1][company_name]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Company ID"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->company_id}}@endif" name="addresses[1][company_id]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("VAT number"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->company_vat}}@endif" name="addresses[1][company_vat]"/>
                              </div>

                              <div class="form-group">
                                  <div class="custom-control custom-switch">
                                      <input type="checkbox"
                                             class="form-check-input"
                                             id="company_vat_registered"
                                             value="1"
                                             @if(isset($customer->addresses[1]) && $customer->addresses[1]->company_vat_registered == '1') checked="checked" @endif
                                             name="addresses[1][company_vat_registered]">
                                      <label class="custom-control-label" for="company_vat_registered"><?php _e("VAT Registered"); ?></label>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("Address"); ?>:</label>
                                  <textarea class="form-control" placeholder="Street 1" name="addresses[1][address_street_1]">@if(isset($customer->addresses[1])){{$customer->addresses[1]->address_street_1}}@endif</textarea>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("City"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->city}}@endif" name="addresses[1][city]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("ZIP Code"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->zip}}@endif" name="addresses[1][zip]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label font-weight-bold mt-3 mb-1"><?php _e("State"); ?>:</label>
                                  <input type="text" class="form-control" value="@if(isset($customer->addresses[1])){{$customer->addresses[1]->state}}@endif" name="addresses[1][state]"/>
                              </div>

                              <div class="form-group">
                                  <label class="form-label d-block"><?php _e("Country"); ?>:</label>
                                  <select class="form-select" data-live-search="true" data-width="100%" data-size="5" name="addresses[1][country_id]">
                                      @foreach($countries as $country)
                                          <option @if(isset($customer->addresses[1]) && $customer->addresses[1]->country_id == $country->id)selected="selected" @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                              </div>

                              <input type="hidden" class="form-control" value="company" name="addresses[1][type]"/>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>


            <div class="d-flex justify-content-between aling-items-center">
                <div>
                    <a href="#" class="btn btn-outline-danger"><?php _e("Delete"); ?></a>
                </div>
                <div>
                    <button type="submit" class="btn btn-dark"><?php _e("Save"); ?></button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('order_content')
    <div class="card  bg-azure-lt mb-3">
        <div class="card-header">
            <h5>
                <i class="mdi mdi-shopping text-primary mr-3"></i> <strong><?php _e("Client orders"); ?></strong>
            </h5>
        </div>
        <div class=" ">
            @if (!empty($customer) && $customer->orders()->count() > 0)
                @foreach ($customer->orders()->get() as $order)
                    <div class="card  mb-2 card-collapse" data-bs-toggle="collapse" data-bs-target="#order-item-{{ $order->id }}">
                        <div class="card-header no-border">
                            <h5><strong>Order #{{ $order->id }}</strong></h5>
                            <div>
                                <a href="{{ route('admin.order.show',$order->id) }}" class="btn btn-outline-primary btn-sm"><?php _e("Preview"); ?></a>
                                <a href="{{ route('admin.order.show',$order->id) }}" class="btn btn-primary btn-sm"><?php _e("Go to order"); ?></a>
                            </div>
                        </div>

                        <div class="card-body py-0">
                            <div class="collapse" id="order-item-{{ $order->id }}">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter" id="order-information-table">
                                        <thead>
                                        <tr>
                                            <th><?php _e("Image"); ?></th>
                                            <th><?php _e("Product"); ?></th>
                                            <th><?php _e("SKU"); ?></th>
                                            <th><?php _e("Price"); ?></th>
                                            <th><?php _e("Qty"); ?></th>
                                            <th><?php _e("Total"); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $carts = $order->cart()->get();
                                        foreach ($carts as $cart):
                                        $product = \MicroweberPackages\Product\Models\Product::where('id', $cart['rel_id'])->first();
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo $product->thumbnail(); ?>"/>
                                            </td>
                                            <td><?php echo $product->title; ?></td>
                                            <td><?php echo $product->sku; ?></td>
                                            <td><?php echo currency_format($product->price); ?></td>
                                            <td>
                                                <?php
                                                $qty = (int) $cart->qty;
                                                echo $qty;
                                                ?>
                                            </td>
                                            <?php
                                            $productPrice = (float) $cart->price;
                                            ?>
                                            <td><?php echo currency_format($productPrice * $qty); ?></td>
                                        </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <?php _e("No orders found for this customer"); ?>.
            @endif
        </div>
    </div>
@endsection
