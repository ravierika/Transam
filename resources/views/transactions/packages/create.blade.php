@extends('layouts.dashboardprime')

@section('content')

<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Add Transaction
                <small>Welcome to {{$compn}}</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#fff">3,2,6,5,9,8,7,9,5,1,3,5,7,4,6</div>
                    <small class="col-white">Visitors</small>
                </div>
                <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                    <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#fff">1,3,5,7,4,6,3,2,6,5,9,8,7,9,5</div>
                    <small class="col-white">Bounce Rate</small>
                </div>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/dashboard"><i class="zmdi zmdi-home"></i> {{$compn}}</a></li>
                    <li class="breadcrumb-item active">Add Flight </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Flight</strong> Information <small></small> </h2>

                    </div>
                    <div class="body">


                        <form class="form-horizontal" method="Post" action="{{route('users.store')}}" files="true">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{Auth::user()->companyid}}" name="companyid">
                            <input type="hidden" value="{{Auth::user()->companyinitials}}" name="companyinitials">
                            <input type="hidden" name="userid">
                            <h6 class="mt-4">Client Information</h6>
<div class="row mb-3">
                            <div class="col-sm-6 mb-1">
                                <label class="d-flex align-items-center" for=""><span class="red">*</span> <span>Client Type</span></label>
                                <div class="d-flex align-items-center">
                                    <div class="mr-2 d-flex align-items-center"><input class="mx-1" checked="checked" type="radio" name="clientType" id="clientType1"><label for="clientType1" class="mb-0">Corporate</label></div>
                                    <div class=" d-flex align-items-center"><input class="mx-1"  type="radio" name="clientType" id="clientType2"><label for="clientType2" class="mb-0">Personal</label></div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-1">
                                <label class="d-flex align-items-center" for=""><span class="red">*</span> <span>Client</span></label>
                                <div class="d-flex align-items-center">
                                    <div class="mr-2 d-flex align-items-center"><input value="withFlight" onchange="checkTripType('client1','withFlight','flightTicket')" class="mx-1" type="radio" name="client" id="client1"><label for="client1" class="mb-0">With Flight</label></div>
                                    <div class=" d-flex align-items-center"><input value="withoutFlight" onchange="checkTripType('client2','withFlight','flightTicket')" checked="checked" class="mx-1"  type="radio" name="client" id="client2"><label for="client2" class="mb-0">Without Flight</label></div>
                                </div>
                            </div>


                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="triptype">{{ __('passenger Name') }}<a class = "ml-5" href="javascript:void(0)" data-toggle="modal" , id = "new-customer">Add New Passenger</a> <a class = "ml-5" href="/customers">My Passengers</a></label>
                                    <input id="passenger" name="Client_Name" class="form-control @error('Client_Name') is-invalid @enderror " value="{{ old('Client_Name') }}" required autocomplete="Client_Name" placeholder="Enter Passenger Name">

                                    @error('Client_Name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="flightTicket"> <span class="red ml-3" style="opacity: 0">*</span><span>Upload Ticket</span></label>
                                    <input disabled id="flightTicket" type="file" name="flightTicket"class="form-control" placeholder="Infant Rate"  value="{{ old('flightTicket') }}">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="User"><span class="red ml-3">*</span> <span>User</span></label>
                                    <input id="cust" name="Client_Name" class="form-control @error('Client_Name') is-invalid @enderror " value="{{Auth::user()->name}}" readonly required autocomplete="Client_Name" placeholder="Assign User">

                                    @error('Client_Name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="hotel"><span class="red ml-3">*</span> <span>Hotel Name</span></label>
                                    <input onchange="checkCity()" id="hotel" type="text" name="hotel" class="form-control @error('hotel') is-invalid @enderror" placeholder="Hotel Name" required autocomplete="hotel" value="{{ old('hotel') }}">
                                    @error('hotel')
                                    <span class="invalid-feedback" role="alert" id="hotelError">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="city"><span class="red ml-3">*</span> <span>City Name</span></label>
                                    <input onchange="checkCity()" id="city" type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City Name" required autocomplete="city" value="{{ old('city') }}">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert" id="cityError">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="checkIn"><span class="red ml-3">*</span> <span>Check in Date </span></label>
                                    <input id="checkIn" type="date" name="checkIn" class="form-control @error('checkIn') is-invalid @enderror" placeholder="checkIn" required autocomplete="checkIn" value="{{ old('checkIn') }}">
                                    @error('checkIn')
                                    <span class="invalid-feedback" role="alert" id="checkInError">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="checkOut"><span class="red ml-3">*</span> <span>Check out Date </span></label>
                                    <input id="checkOut" type="date" name="checkOut" class="form-control @error('checkOut') is-invalid @enderror" placeholder="checkOut" required autocomplete="checkOut" value="{{ old('checkOut') }}">
                                    @error('checkOut')
                                    <span class="invalid-feedback" role="alert" id="checkOutError">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="d-flex align-items-center" for="spPerNight"><span class="ml-3"></span> <span>Selling Price per night</span></label>
                                <select name="spPerNight" class="form-control show-tick" value="{{ old('spPerNight') }}">
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                    <option value="triple">Triple</option>
                                    <option value="quadruple">Quadruple</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="d-flex align-items-center" for="room"><span class="ml-3"></span> <span>Number of Rooms</span></label>
                                <select name="room" class="form-control show-tick" value="{{ old('room') }}">
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                    <option value="triple">Triple</option>
                                    <option value="quadruple">Quadruple</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="d-flex align-items-center" for="planType"><span class="ml-3"></span> <span>Plan Type</span></label>
                                <select name="planType" class="form-control show-tick" value="{{ old('planType') }}">
                                    <option value="cp">CP</option>
                                    <option value="map">MAP</option>
                                    <option value="ap">AP</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="totalNight"><span class="red ml-3">*</span> <span>Total Night</span></label>
                                    <input id="totalNight" type="text" name="totalNight"  class="form-control @error('infant') is-invalid @enderror" placeholder="Total Night" readonly required autocomplete="infant" value="{{ old('infant') }}">
                                    @error('infant')
                                    <span class="invalid-feedback" role="alert" id="infantError">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <label class="d-flex align-items-center" for="hotelVouchered"><span class="ml-3"></span> <span>Hotel Vouchered</span></label>
                                <select name="hotelVouchered" onchange="ticketChecked(this.value)" class="form-control show-tick" value="{{ old('hotelVouchered') }}">
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center" for="lastTickDate"><span style="opacity: 1" class=" ml-3"></span> <span>Last date to issue</span></label>
                                    <input readonly="true" id="lastTickDate" type="date" name="lastTickDate" class="form-control" placeholder="lastTickDate" required value="{{ old('lastTickDate') }}">
                                </div>
                            </div>



                            {{-- from accounts point of view --}}










                            </div>
                            <h6>Accounts Section</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="d-flex align-items-center" for="infantRate"> <span class="red ml-3" style="opacity: 1">*</span><span>Bank Name</span></label>
                                        <input id="bankName" type="text" name="bankName"class="form-control" placeholder="Bank Name"  value="{{ old('bankName') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="d-flex align-items-center" for="infantRate"> <span class="red ml-3" style="opacity: 1">*</span><span>Cash</span></label>
                                        <input id="Cash" type="text" name="cash"class="form-control" placeholder="Cash"  value="{{ old('cash') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="d-flex align-items-center" for="infantRate"> <span class="red ml-3" style="opacity: 1">*</span><span>Payment Getway Name</span></label>
                                        <input id="pay_getway" type="text" name="pay_getway"class="form-control" placeholder="Payment Getway Name"  value="{{ old('pay_getway') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            <a href="{{route('users.index')}}" class="btn btn-primary btn-round">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scriptsc')
<script src="{{URL::asset('assets/js/leads.js')}}"></script>
<script src="{{URL::asset('assets/js/custom.js')}}"></script>

@endsection

@endsection
