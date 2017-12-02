@extends('master')

@section('title', 'ادارة الحجز والأستعلام')



@section('content')

<div class="card" ng-controller = "booking">
				<div class="card-header">
					<h4 class="card-title">ادارة الحجز والأستعلام</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
                <ul class="nav nav-tabs nav-justified" id="myTab">


							<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#Emplist" aria-controls="active" aria-expanded="true">الحجز والأستعلام</a>
							</li>

							<li class="nav-item">
								<a class="nav-link " id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">حجز جديد :</a>
							</li>

							
						</ul>

<div class="tab-content px-1 pt-1">
	<div role="tabpanel" class="tab-pane fade active  in" id="Emplist" aria-labelledby="active-tab" aria-expanded="true">
<div class = "card">

<div class= "card-header">
<h4 class = "card-title"> ادارة الحجز والأستعلام </h4>
</div>

<div class = "card-body">
<div class = "card-block">


	<div class="row">
		<div class = "col-md-4">
		
				<div class="form-group">
			    <label for="projectinput1">العيادة</label>
				<select id="projectinput6" name="clinic" ng-model  = "clnid" ng-change="getclnper(clnid)" class="form-control">
                <option ng-repeat = "da in clns" value = "@{{da.id}}"> @{{da.cln_arname}} </option>
				</select>				
				</div>
	</div>
		<div class = "col-md-4">
				<div class="form-group">
			    <label for="projectinput1">الطبيب</label>
				<select id="projectinput6" name="doc" ng-model = "docid" class="form-control">
				<option ng-repeat = "da in docs" value="@{{da.id}}"> @{{da.doc_name}} </option>
				
				</select>				
				</div>
	</div>

	<div class = "col-md-4">
			
		<div class="form-group">
		<label for="issueinput3">التاريخ</label>
		<input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="اختيار التاريخ">
		
		</div>
										
	</div>	
	<div class="col-md-12">
	<button type="button" class="btn btn-primary block ">بحث</button>	

	</div>
	</div>
				
	<div class="col-md-16">
				
                    <table datatable="ng" dt-options = "vm.dtOptions" class="table table-hover mb-0" style="font-size:smaller;">
                        <thead>
                            <tr>
                                <th>م</th>
                                <th>الفترة</th>
                                <th>الموعد</th>
								<th>حالة الزيارة</th>
                                <th>رقم الملف</th>
								<th>المريض</th>
								<th>حالة الحجز</th>
								<th>وقت الدخول</th>
								<th>وقت الخروج</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in perArr">
							
                                <th scope="row" ng-init = "statusda =checkappt(da.perid,da.appt,'st')"> @{{$index +1}} </th>
                                <th>

								<p ng-if = "da.perid !== 'استراحة'"> @{{da.perid}} </p>
								<p ng-if = "da.perid === 'استراحة'" style = "background-color:#f39c12;color:#fff"> @{{da.perid}} </p>
								</th>
                                <th>@{{da.appt}}</th>
                                <th>
								<p  style = "@{{statusda.split('/')[1]}}" >   @{{statusda.split("/")[0]}}  </p>
								</th>
						
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<td>
								 <div class="btn-group mr-1 mb-1" ng-if = "da.perid !== 'استراحة'">
                                        <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> + </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" style="color:orange"> حجز غير مؤكد <i class="icon-paper"></i></a>
                                            <a class="dropdown-item" href="#" style="color:green">حجز مؤكد  <i class="icon-paper"></i> </a>
                                            <a class="dropdown-item" href="#" style = "color : teal;">تأكيد الحجز <i class="icon-circle-check"></i></a>
											<a class="dropdown-item" href="#" style="color:red">الغاء الحجز <i class="icon-circle-cross"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">ملف المريض</a>
                                        </div>
                                    </div>
								
								</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
                
	</div>
<br/>
	<div class="row">
	<button type="button" class="btn btn-info block ">حجز جديد</button>	

</div>	
	<br/>
	<div class="row">
	
		
		
		
		<div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">0</h3>
                            <span>مواعيد متاحة</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ei-calendar pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
		<div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="teal">0</h3>
                            <span>حجوزات مؤكدة</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ei-calendar teal font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="deep-orange">0</h3>
                            <span>حجز غير مؤكد</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ei-calendar deep-orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="cyan">0</h3>
                            <span>خروج من العيادة</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ei-calendar cyan font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="red">0</h3>
                            <span>في الأنتضار</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ei-calendar red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
		<div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">0</h3>
                            <span>داخل العيادة</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ei-calendar pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    </div>
		
		
		</div>
		
	
				
				</div>
				
				
		    </div>
			
			</div>
			
			<div role="tabpanel" class="tab-pane fade in" id="newPat" aria-labelledby="link-tab" aria-expanded="false">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">حجز جديد</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						
						
					
						
							
				<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">فاتورة المريض</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						
						<form class="form">
							<div class="form-body">
								
								<div class="row">
							
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">رقم الفاتورة</label>
											<input type="text" id="projectinput1" class="form-control" readonly = "readonly" ng-model="apptid" name="fname">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput2">التاريخ</label>
											<input type="date" id="projectinput2" class="form-control" placeholder="" ng-model = 'date1' name="lname">
										</div>
									</div>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">المريض</label>
											<select  class="form-control"  name="email" ng-model = "pat_id">
											<option ng-repeat = "da in pats"  value = "@{{da.id}}"> @{{da.ar_fname}}  @{{da.ar_lname}}   </option>
											</select>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">العيادة</label>
											<select id="projectinput6" name="budget" ng-model = "cln_id" class="form-control">
												<option ng-repeat = "da in clns" value = "@{{da.id}}"> @{{da.cln_arname}}  </option>
											</select>
										</div>
									</div>
									
										<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">الطبيب</label>
											<select id="projectinput6" name="budget" ng-model = "doc_id" class="form-control">
											<option ng-repeat = "da in docs" value="@{{da.id}}"> @{{da.doc_name}} </option>
											</select>
										</div>
									</div>
									
									</div>
							

								<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الفاتورة</h4>
								<div class="row">
								
								<div class="col-md-4">
								<div class="form-group">
									<label for="companyName">الصنف</label>
									<input type="text" id="companyName" class="form-control" placeholder="اختيار الصنف" name="company">
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group">
									<label for="companyName">الكمية</label>
									<input type="text" id="companyName" class="form-control" placeholder="1" name="company">
								</div>
								</div>
									
								<div class="col-md-8">
								
								
								<button type="button" class="btn btn-info btn-min-width mr-1 mb-1 btn-block">+</button>
								
								
								</div>
								
								<div class ="col-md-12">
						<table class="table table-hover mb-0" style="font-size:smaller;">
                        <thead>
                            <tr>
                                <th>م</th>
                                <th>الصنف</th>
                                <th>الكمية</th>
								<th>السعر</th>
                                <th>الأجمالي</th>
								<th></th>
                            </tr>
                        </thead>
						<tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>كشف جديد</td>
                                <td>1</td>
                                <td>100</td>
								<td>100</td>
								<td></td>
								
					 </tbody>
                    </table>
								</div>
								
								</div>
								
								<h4 class="form-section"><i class="icon-clipboard4"></i> التفاصيل</h4>
								
								<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">اجمالي الفاتورة</label>
									<input type="text" ng-model ="inv_total" ng-change = "net_price=inv_total;inv_discountvalue = inv_total * inv_discountnsba / 100;net_price = inv_total - inv_discountvalue"  id="companyName" class="form-control" placeholder="0" name="company">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">خصم %</label>
									<input type="number" ng-model = "inv_discountnsba" ng-change = "inv_discountvalue = inv_total * inv_discountnsba / 100;net_price = inv_total - inv_discountvalue"  id="companyName" class="form-control" name="company">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">خصم </label>
									<input type="number" ng-model = "inv_discountvalue" ng-change = "net_price = inv_total - inv_discountvalue" id="companyName" class="form-control" name="company">
								</div>
								</div>
								
								<div class="col-md-12">
								<div class="form-group">
								<label for="companyName">الصافي </label>
									<input type="number" ng-model = "net_price"  readonly id="companyName" class="form-control" name="company">
								</div>
								</div>
								
								
								
								</div>
								
								
								
								
								
								
									

							<div class="form-actions">
								<button type="button" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> الغاء
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> حفظ
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
								
							
							</div>
							
					
							
			
				</div>
			</div>
			</div>
			
			
            </div>
            </div>
            </div>
            </div>	
				
				
@endsection
@section('script')
  <script src="angular/controllers/booking.js?39" ></script>  
@endsection