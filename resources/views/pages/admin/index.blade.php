@extends('layouts.admin.app')

@section('content')
	<!-- Page-Title -->
	@include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

	<div class="row">
		@can('admin-access')
			<div class="col-lg-3">
				<a href="{{ route('admin.partner.index') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box waves-effect waves-light">
								<div class="table-detail">
									<div class="iconbox bg-purple">
										<i class="icon-layers"></i>
									</div>
								</div>

								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Partnership</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">SplashScreen, Promo</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3">
				<a href="{{ route('admin.customer.index') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box">
								<div class="table-detail">
									<div class="iconbox bg-inverse">
										<i class="icon-layers"></i>
									</div>
								</div>


								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Customer</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">Customer, Orders, Info</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3">
				<a href="{{ route('admin.job.index') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box">
								<div class="table-detail">
									<div class="iconbox bg-warning">
										<i class="icon-layers"></i>
									</div>
								</div>

								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Data Master</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">Jobs, Architects, Costs</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3">
				<a href="{{ route('admin.setting.index') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box">
								<div class="table-detail">
									<div class="iconbox bg-purple">
										<i class="icon-layers"></i>
									</div>
								</div>

								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Settings</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">Setting, Status, Cities, Users</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan


		@can('manager-access')
			<div class="col-lg-3">
				<a href="{{ route('admin.customer.index') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box">
								<div class="table-detail">
									<div class="iconbox bg-purple">
										<i class="icon-layers"></i>
									</div>
								</div>


								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Customer</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">Customer</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3">
				<a href="{{ route('admin.order.index') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box waves-effect waves-light">
								<div class="table-detail">
									<div class="iconbox bg-inverse">
										<i class="icon-layers"></i>
									</div>
								</div>

								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Order</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">List of Order</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-3">
				<a href="{{ route('admin.customer.notif') }}">
					<div class="card-box">
						<div class="bar-widget">
							<div class="table-box waves-effect waves-light">
								<div class="table-detail">
									<div class="iconbox bg-warning">
										<i class="icon-layers"></i>
									</div>
								</div>

								<div class="table-detail">
									<h4 class="m-t-0 m-b-5"><b>Broadcast</b></h4>
									<h5 class="text-muted m-b-0 m-t-0">Send Information</h5>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@endcan

	</div>
	<!-- end row Menu-->

	<div class="row">
		<div class="col-md-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title"><b>Sort Chart By :</b></h4>
				<div class="row m-b-30">
					<div class="col-sm-12">					
						<form action="{{ route('home') }}" method="GET" class="form-inline">
							<div class="form-group">
								<input type="text" name="month" class="form-control" id="monthpicker" placeholder="Month">
							</div>
							<div class="form-group">
								<input type="text" name="year" class="form-control" id="yearpicker" placeholder="Year">
							</div>
							<div class="form-group">
								{!! Form::select('city',[''=>' Select City ']+App\Models\City::pluck('city', 'city')->all(), null, ['class' => 'form-control',]) !!}
							</div>
							<button type="submit" class="btn btn-primary waves-effect waves-light m-l-10 btn-md">Search</button>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						{{ Carbon\Carbon::now()->format('F Y') }}
						<h4 class="m-t-0 m-b-30 header-title"><b>Chart by Job</b></h4>
						<div id="category-chart"></div>
					</div>
					
					<div class="col-md-6">
						{{ Carbon\Carbon::now()->format('F Y') }}
						<h4 class="m-t-0 m-b-30 header-title"><b>Chart by Status</b></h4>
						<div id="status-chart"></div>
					</div>
				</div>
			</div>
		</div>
	</row>

	<div class="row">
		
	</div>
	<!-- End row C3-2-->
@endsection

@section('scripts')
	<script type="text/javascript">
        !function($) {
            "use strict";

            var ChartC3 = function() {};

            ChartC3.prototype.init = function () {
                c3.generate({
                    bindto: '#category-chart',
                    data: {
                        json: {!! json_encode($jobChart->original) !!},
                        keys: {
                            x: 'name', // it's possible to specify 'x' when category axis
                            value: ['total'],
                        },
                        types: {
                            total: 'bar',
                        },
                        colors: {
                            data1: '#dcdcdc',
                        },
                    },
                    axis: {
                        x: {
                            type: 'categorized'
                        }
                    }
                });

                //combined chart 2
                c3.generate({
                    bindto: '#status-chart',
                    data: {
                        json: {!! json_encode($statusChart->original) !!},
                        keys: {
                            x: 'name', // it's possible to specify 'x' when category axis
                            value: ['total'],
                        },
                        types: {
                            total: 'bar',
                        },
                        colors: {
                            data1: '#dcdcdc',
                        },
                    },
                    axis: {
                        x: {
                            type: 'categorized'
                        }
                    }
                });
            },
                $.ChartC3 = new ChartC3, $.ChartC3.Constructor = ChartC3

        }(window.jQuery),

            //initializing
            function($) {
                "use strict";
                $.ChartC3.init()
            }(window.jQuery);

	</script>
@endsection
