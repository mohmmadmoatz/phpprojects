@extends('master')

@section('title', 'شاشة الطبيب')



@section('content')
<div  ng-controller = "booking"> 
<div class="card" ng-init="putinfoDoc({{Auth::user()->userid}})">
		@include('patinfo')
				<div class="card-header">
					<h4 class="card-title">شاشة الطبيب</h4>
				</div>
	<div class="card-body">
				
			


				<div class="card-block">

	<ul class="nav nav-tabs nav-justified" id="myTab">


							<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#Emplist" aria-controls="active" aria-expanded="true">قائمة الأنتضار <i class="icon-clock-o"></i> </a>
							</li>

							<li class="nav-item">
								<a class="nav-link " id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false" ng-show="patopened">المريض : @{{opatname}}</a>
							</li>

							
			</ul>
			
	  <div class="tab-content px-1 pt-1">
	<div role="tabpanel" class="tab-pane fade active  in" id="Emplist" aria-labelledby="active-tab" aria-expanded="true">
	
	<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة الأنتضار</h4>
				</div>
	<div class="card-body">
				



				<div class="card-block">

				<div class="row">
				
				<h4 align = "center" >  قائمة الأنتضار  <span class="bg-success" style="color:#fff"> @{{todaydate}} </span> </h4> 
			
		<div class = "col-md-6">
		
			<div class="form-group">
			    <label for="projectinput1">العيادة</label>
				<input type="text" id="projectinput6" name="clinic" ng-model  = "clnname" class="form-control">
                				
				</div>

		</div>

		<div class = "col-md-6"> 

			 <div class="form-group">

			     <label for="projectinput1">الطبيب</label>
				<input type text  name="doc" ng-model = "doctorname" class="form-control">
				 
				
			 			
			</div>
		</div>


			<div class="col-md-6">
			
			<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button">قفل استقبال المزيد من الزيارات <i class="icon-lock"> </i></button>
	
			</div>

			<div class="col-md-6">
			
			<button class="btn btn-info btn-min-width mr-1 mb-1 btn-block" type="button" ng-click = "getbooking4doctor()" >تحديث <i class="icon-refresh"> </i></button>
	
			</div>
			
		
				
				</div>
			
			
				
				  <div class="table-responsive">
                    <table datatable="ng" dt-options = "vm.dtOptions" class="table table-striped mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الساعة</th>
                                <th>اسم المريض</th>
								<th>رقم الملف</th>
                   				<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in perBooked" >
                                <th scope="row">@{{$index +1}}</th>
                                <td>@{{da.hour}}</td>
                                <td>@{{getPatinfo(da.pat_id,'name')}}</td>
                                <td>@{{getPatinfo(da.pat_id,'file')}}</td>
								<td>
								<button type="button" class="btn btn-primary" ng-click = "openpat(da)" onclick="$('#myTab li:eq(1) a').tab('show')"  >دخول <i class="icon-arrow-left"> </i> </button>
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#default2" ng-click="fillPatInfo(da.pat_id)">التفاصيل <i class="icon-info"> </i></button>
								<button type="button" class="btn btn-success" ng-click = "openpatvist(da)">الزيارات <i class = "icon-history" ></i></button>
								</td>
                            </tr>
                          
                           </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>

<div  ng-show="patdiv"  class="card" >
				<div class="card-header">
					<h5 class="card-title" style = "color:#DA4453;" >زيارات المريض :  @{{patsel}}</h5>
				</div>
				
				<div class="card-body">
				
				<div class="card-block">
				<h1 align = "center"> لايوجد بيانات </h1>
			</div>
			
		</div>
				
</div>

		<!-- end tab 1 -->
		
			</div>	
			
			<div role="tabpanel" class="tab-pane fade in" id="newPat" aria-labelledby="link-tab" aria-expanded="false">
			
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">المريض : @{{opatname}}</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				<div class="row">
				
				
				
			<div class="col-md-12">
			
			<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button">الملف : @{{patfile}} </button>
	
			</div>
			
			<div class="col-md-6" >
			
		    <button class="btn btn-primary btn-min-width mr-1 mb-1 btn-block" type="button"  disabled="disabled">وقت الدخول : @{{enterat}} </button>
		
			</div>
		
				
				</div>
				<form class="form">
				<div class= "form-body">
				<h4 class="form-section"><i class="icon-clipboard4"></i> اضافة الأجراءات </h4>
				<div class= "row">
			
				<div class= "col-md-3">
				
				<div class="form-group">
											<label for="projectinput1">المجموعة</label>
											<select ng-model = "sv_group"  class="form-control">
												<option>خدمات عيادة الاسنان</option>
											
											</select>
										</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
											<label for="projectinput1">الخدمة</label>
											<select ng-model = "sv_name" class="form-control">
												<option>حشو عصب</option>
											
											</select>
										</div>
				</div>
				
					<div class= "col-md-2">
				
				<div class="form-group">
											<label for="projectinput1">التكلفة</label>
											<input type = "number" ng-model = "sv_price" class="form-control">
												
										</div>
				</div>
				
					<div class= "col-md-2">
				
				<div class="form-group">
											<label for="projectinput1">عدد</label>
											<input type = "number" ng-model = "sv_qty" id="projectinput6" name="budget" class="form-control">
												
										</div>
				</div>
				<div class = "col-md-2" align="center">
			
				<label for="button">أضف</label>
				<button ng-click = "addsv()" class="btn btn-success btn-min-width mr-1 mb-1" type="button"> +</button>

				
				</div>
				
				</div>
				
				<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الفاتورة</h4>
					</div>
				</form>
				
					
				  <div class="table-responsive">
                    <table class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الخدمة</th>
                                <th>التكلفة</th>
								<th>عدد</th>
                   				<th> الأجمالي </th>
								
								<th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in dcsvs">
                                <th scope="row">@{{$index +1}}</th>
                                <td>@{{da.sv_name}}</td>
                                <td>@{{da.sv_price}}</td>
                                <td>@{{da.sv_qty}}</td>
								<td>@{{da.sv_price * da.sv_qty}}</td>
							
								<td>
								<button type="button" class="btn btn-danger" ng-click = "deletesv(da)">حذف</button>
								</td>
                            </tr>
                          
                           </tbody>
                    </table>
                </div>
			<form class="form">
			<div class="form-body">
			<h4 class="form-section"><i class="icon-clipboard4"></i> ملخص الفاتورة</h4>
			
			<div class= "row">
				<div class= "col-md-4">
				
				<div class="form-group">
				
				<label for="projectinput1">الأجمالي</label>
				<input type = "number" id="projectinput6" readonly = "readonly" ng-model = "totalinvPrice" ng-change = "dc_netprice = totalinvPrice;discount_dc = 0"  class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-4">
				
				<div class="form-group">
				
				<label for="projectinput1">الخصم</label>
				<input type = "number" id="projectinput6" ng-model = "discount_dc"  ng-change = "dc_netprice = totalinvPrice - discount_dc" class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-4">
				
				<div class="form-group">
				
				<label for="projectinput1">صافي الفاتورة</label>
				<input type = "number" id="projectinput6" ng-model = "dc_netprice" class="form-control">
												
				</div>
				</div>
				<div class = "col-md-12">
							<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button" ng-click="endVist()">انهاء الجلسة  <i class="icon-user-check"> </i>  </button>

				</div>
				
				</div>
				</div>
			</form>
			
		</div>
				
				
		</div>
				
				
</div>
			
			</div>
			
			<!-- End Tabs !--> 
						</div>
								</div>
					
							</div>
					
								</div>
					
					
								</div>
					
@endsection
@section('script')
  <script src="angular/controllers/booking.js?39" ></script>  
@endsection