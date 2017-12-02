@extends('master')

@section('title', 'قسم المرضى')



@section('content')

	<div class="card" ng-controller="patcontroller">
				<div class="card-header">
					<h4 class="card-title">قسم المرضى</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						<ul class="nav nav-tabs nav-justified" id = "myTab">
							<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#patlist" aria-controls="active" aria-expanded="true">قائمة المرضى</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">المريض : @{{ar_fname}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#vists" aria-controls="link" aria-expanded="false">زيارات ومراجعات</a>
							</li>
							
						</ul>
						
						<div class="tab-content px-1 pt-1">
						
<div role="tabpanel" class="tab-pane fade active in" id="patlist" aria-labelledby="active-tab" aria-expanded="true">

<div class="card" >
				<div class="card-header">
					<h4 class="card-title">قائمة المرضى</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table datatable="ng"  dt-options="vm.dtOptions" dt-instance="vm.dtInstance" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الأسم</th>
                                <th>Name</th>
                                <th>الجنسية</th>
								<th>الهاتف</th>
								<th aria-hidden="true"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in patlist">
                                <th scope="row">1</th>
                                <td>@{{da.ar_fname}}  @{{da.ar_lname}}</td>
                                <td>@{{da.en_fname}}  @{{da.en_lname}}</td>
                                <td>@{{da.nat}} </td>
								<td>@{{da.phone1}}</td>
								<td>
								<button type="button"  class="btn btn-primary" ng-click = "editpat(da.id)" onclick="$('#myTab li:eq(1) a').tab('show')">تعديل</button>
								<button type="button" ng-click="deletePat(da.id)" class="btn btn-danger ">حذف</button>
								</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>
</div>
						
							<div role="tabpanel" class="tab-pane fade  in" id="newPat" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
							
								<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">البيانات الشخصية</h4>
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
						
						<form class="form" name = "patForm" >
							<div class="form-body">
								
								<div class="row">
								<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">رقم الملف</label>
											<input type="text" id="projectinput1" class="form-control"  placeholder="يتم توليده تلقائي"  readonly name="Fnum" ng-model = "Fnum" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">الأسم الأول</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="الأسم الاول" name="ar_fname" ng-model = "ar_fname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">اسم العائلة</label>
											<input type="text" id="projectinput2" class="form-control" placeholder="اسم العائلة" name="ar_lname" ng-model = "ar_lname">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Last name</label>
											<input type="text" id="projectinput3" class="form-control" placeholder="Last Name" name="en_lname" ng-model = "en_lname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">First name</label>
											<input type="text" id="projectinput4" class="form-control" placeholder="First Name " name="en_fname" ng-model = "en_fname">
										</div>
									</div>
								</div>

								<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الاتصال</h4>
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">هاتف</label>
									<input type="text" id="companyName" class="form-control" placeholder="هاتف" name="phone1" ng-model = "phone1">
								</div>
								</div>
									
									<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">جوال</label>
									<input type="text" id="companyName" class="form-control" placeholder="جوال" name="phone2" ng-model = "phone2">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">فاكس</label>
									<input type="text" id="companyName" class="form-control" placeholder="فاكس" name="fax" ng-model = "fax">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">البريد الألكتروني</label>
									<input type="email" id="companyName" class="form-control" placeholder="البريد الألكتروني" name="email" ng-model = "email">
								</div>
								</div>
								
								<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">العنوان</label>
									<textarea type="text" id="companyName" class="form-control" placeholder="العنوان" name="address" ng-model = "address"></textarea>
								</div>
								</div>
								
								
								<div class="row">
								</div>
								<h4 class="form-section"><i class="icon-clipboard4"></i> المزيد</h4>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">الجنسية</label>
											<select id="projectinput5" name="nat" class="form-control" ng-model = "nat">
												<option value="none" selected="" disabled="">الجنسية</option>
												<option >سعودي-SA</option>
												
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">الحالة الأجتماعية</label>
											<select id="projectinput6" name="metrial_st" ng-model = "metrial_st" class="form-control">
												<option >اعزب</option>
												<option >متزوج</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput6">نوع</label>
											<select id="projectinput6" name="gendre" ng-model  = "gendre" class="form-control">
												<option >ذكر</option>
												<option>انثى</option>
											</select>
										</div>
									</div>
								
								<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">نوع الهوية</label>
											<select id="projectinput6" name="idf_type" ng-model = "idf_type" class="form-control">
												<option >بطاقة وطنية</option>
												<option >...</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">رقمها</label>
									<input type="number" id="companyName" class="form-control" placeholder="0" name="idf_num" ng-model = "idf_num">
								</div>
								</div>

								

								<div class="form-group">
									<label for="projectinput8">ملاحضات</label>
									<textarea id="projectinput8" rows="5" class="form-control" name="more" ng-model = "more" placeholder=""></textarea>
								</div>
							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-warning mr-1" onclick = "location.reload()">
									<i class="icon-cross2"></i> الغاء
								</button>
								<button ng-click = "addPat()" class="btn btn-primary">
									<i class="icon-check2"></i> حفظ
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
								
							
							</div>
							
							<div class="tab-pane fade" id="vists" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
								<p>زيارات ومراجعات</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
 
@endsection

@section('script')
  <script src="angular/controllers/patcontroller.js" ></script>  
@endsection