@extends('master')

@section('title', 'قسم العيادات')



@section('content')

	<div class="card" ng-controller = "clnctrl">
				<div class="card-header">
					<h4 class="card-title">قسم العيادات</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						<ul class="nav nav-tabs nav-justified" id = "myTab">

						<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#clnlist" aria-controls="active" aria-expanded="true">العيادات</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">العيادة :</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#vists" aria-controls="link" aria-expanded="false">فترات العمل للعيادة</a>
							</li>
							
						</ul>
						

						<div class="tab-content px-1 pt-1">
						
	    <div role="tabpanel" class="tab-pane fade active in" id="clnlist" aria-labelledby="active-tab" aria-expanded="true">

	<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة العيادات</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table datatable="ng" dt-options = "vm.dtOptions" dt-ColumnDefs = "vm.dtColumnDefs" class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الفرع</th>
                                <th>اسم العيادة</th>
								<th>Clinic name</th>
                                <th>نوعها</th>
								<th>الهاتف</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in clns" >
                                <th scope="row">@{{$index +1}}</th>
                                <td>@{{get_brname(da.br_id)}}</td>
                                <td>@{{da.cln_arname}}</td>
                                <td>@{{da.cln_enname}}</td>
								<td>@{{da.cln_type}}</td>
								<td>@{{da.cln_phone}}</td>
								<td>
								<button type="button" ng-click="edit(da.id)" onclick="$('#myTab li:eq(1) a').tab('show')" class="btn btn-primary  ">تعديل</button>
								<button type="button" ng-click="delete(da.id)" class="btn btn-danger ">حذف</button>
								</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>	

		</div>


							<div role="tabpanel" class="tab-pane fade  in" id="newPat" aria-labelledby="link-tab" aria-expanded="false">
							
								<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">بيانات العيادة</h4>
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
											<label for="projectinput1">اسم الفرع</label>
											<select id="projectinput6" name="budget" ng-model = "br_id" class="form-control">
											<option ng-repeat = "da in brns" value= "@{{da.id}}"> @{{da.branchname}} </option>	
											</select>
											
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">الكود</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="ادخل الكود" name="cln_code" ng-model ="cln_code">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">اسم العيادة</label>
											<input type="text" id="projectinput2" class="form-control" placeholder="اسم العيادة" name="lname" ng-model="cln_arname">
										</div>
									</div>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Clinic name</label>
											<input type="text" id="projectinput3" class="form-control"  name="clnname" ng-model = "cln_enname" >
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput3">نوعها</label>
											<select id="projectinput6" name="budget" ng-model = "cln_type" class="form-control">
												<option>...</option>
											</select>
										</div>
									</div>
									
									</div>
							

								<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الاتصال</h4>
								<div class="row">
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">هاتف</label>
									<input type="text" id="companyName" class="form-control" placeholder="هاتف" name="phone1" ng-model = "cln_phone">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">هاتف 2</label>
									<input type="text" id="companyName" class="form-control" placeholder="هاتف 2" name="phone2" ng-model = "cln_phone2">
								</div>
								</div>
									
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">جوال</label>
									<input type="text" id="companyName" class="form-control" placeholder="جوال" name="phone3" ng-model = "cln_phone3">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">جوال 2</label>
									<input type="text" id="companyName" class="form-control" placeholder="جوال 2" name="phone4" ng-model = "cln_phone4">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">فاكس</label>
									<input type="text" id="companyName" class="form-control" placeholder="قاكس" name="fax" ng-model = "cln_fax">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">فاكس 2</label>
									<input type="text" id="companyName" class="form-control" placeholder="فاكس 2" name="fax2" ng-model = "cln_fax2">
								</div>
								</div>
								
								<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">البريد الألكتروني</label>
									<input type="text" id="companyName" class="form-control" placeholder="البريد الألكتروني" name="email" ng-model = "cln_email">
								</div>
								</div>
								
								</div>
								
								<h4 class="form-section"><i class="icon-clipboard4"></i> المزيد</h4>
								
								<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">قيمة الكشف</label>
									<input type="text" id="companyName" class="form-control" placeholder="0" name="kshfvalue" ng-model = "cln_kshfvalue">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">قيمة المراجعة</label>
									<input type="text" id="companyName" class="form-control" name="company" ng-model = "cln_refvale">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">عدد ايام المراجعة</label>
									<input type="text" id="companyName" class="form-control" name="company" ng-model = "cln_refdays">
								</div>
								</div>
								
							
								
								
								</div>
								
								
								
								
								
								
									

							<div class="form-actions">
								<button type="button" onclick = "location.reload()" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> الغاء
								</button>
								<button ng-click = "add()"  class="btn btn-primary">
									<i class="icon-check2"></i> حفظ
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
								
							
							</div>
							
							<div class="tab-pane fade" id="vists" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
								<div class="card">
				<div class="card-header">
					<h4 class="card-title">فترات عمل العيادة</h4>
				</div>
				<div class="card-body">
				
					<div class="card-block">
					<div class="row">
					<div class = "col-md-12"> 
					 <div class="form-group">
					  <label for="projectinput1">العيادة</label>
					  <select type="text" id="projectinput1" class="form-control" ng-model = "cln_id" ng-change="getclnper(cln_id)" name="fname">
					<option ng-repeat = "da in clns" value = "@{{da.id}}" > @{{da.cln_arname}}</option>
					</select>
					</div>
					</div>
	
					<div class="col-md-4">
					  <div class="form-group">
					  <label for="projectinput1">من الساعة</label>
					  <input type="time" id="projectinput1" class="form-control" placeholder="HH:mm" ng-model = "per_from" >
					</div>
				</div>
				
				<div class="col-md-4">
					  <div class="form-group">
					  <label for="projectinput1">حتى</label>
					  <input type="time" id="projectinput1" class="form-control" placeholder="مثال : 10:00 PM" ng-model="per_to">
					</div>
				</div>
				
					<div class="col-md-4">
					  <div class="form-group">
					  <label for="projectinput1">مدة الكشف</label>
					  <input type="text" id="projectinput1" class="form-control" placeholder="0" ng-model="kshf_per">
					</div>
				</div>
					
				<div class = "col-md-12">
				<button type="button" class="btn mb-1 btn-success btn-lg btn-block" ng-click="addper()" ng-disabled = "!cln_id">اضف الفترة</button>
				</div>
				
				
				
				</div>
				<h4 class="form-section"><i class="icon-table"></i> جدول الفترات</h4>
				
					  <div class="table-responsive">
                    <table class="table table-hover mb-0" style="">
                        <thead>
                            <tr>
                                <th>رقم الفترة</th>
                                <th>من الساعة</th>
                                <th>حتى الساعة</th>
								<th>ساعات العمل</th>
                                <th>مدة الكشف</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in clnsper" >
                                <th scope="row">@{{da.id}}</th>
                                <td>@{{da.per_from | date: 'HH:mm' }}</td>
                                <td>@{{da.per_to | date: 'HH:mm' }}</td>
                                <td>@{{getdiff(da.per_from,da.per_to)}}</td>
								<td>@{{da.kshf_per}} دقيقة</td>
								
								<td>
								<button type="button" class="btn btn-primary" ng-click = "editper(da.id)" >تعديل</button>
								<button type="button" class="btn btn-danger" ng-click = "deleteper(da.id)">حذف</button>
								</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
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

<script src="angular/controllers/clnctrl.js" ></script>  

@endsection