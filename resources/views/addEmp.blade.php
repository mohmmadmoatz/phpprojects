@extends('master')

@section('title', 'قسم الموظفين')



@section('content')

	<div class="card" ng-controller = "empctrl">
				<div class="card-header">
					<h4 class="card-title">قسم الموظفين</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						<ul class="nav nav-tabs nav-justified" id="myTab">


							<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#Emplist" aria-controls="active" aria-expanded="true">قائمة الموظفين</a>
							</li>

							<li class="nav-item">
								<a class="nav-link " id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">الموظف : @{{ar_fullname}}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#vists" aria-controls="link" aria-expanded="false">مستندات الموظف</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#vists" aria-controls="link" aria-expanded="false">رسائل الرسائل القصيرة المرسلة</a>
							</li>
						</ul>
						
						<div class="tab-content px-1 pt-1">
						
	<div role="tabpanel" class="tab-pane fade active  in" id="Emplist" aria-labelledby="active-tab" aria-expanded="true">
	<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة الموظفين</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table datatable="ng"   dt-options="vm.dtOptions" dt-instance="vm.dtInstance" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الباركود</th>
                                <th>الأسم</th>
                                <th>Name</th>
								<th>التلفون</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in Emps" >
                                <th scope="row">1</th>
                                <td style = "background-color:#967ADC;color:white;">@{{da.barcode}}</td>
                                <td>@{{da.ar_fullname}}</td>
                                <td>@{{da.en_fullname}}</td>
								<td>@{{da.phone}}</td>
								<td>
								<button type="button" ng-click="editEmp(da.id)" onclick="$('#myTab li:eq(1) a').tab('show')" class="btn btn-primary ">تعديل</button>
								<button type="button" ng-click = "deleteEmp(da.id)" class="btn btn-danger ">حذف</button>
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
						
						<form class="form">
							<div class="form-body">
								
								<div class="row">
								<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">رقم الباركود</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="يتم توليده تلقائي" name="barcode" ng-model = "barcode">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">الأسم الكامل</label>
											<input type="text" id="projectinput2" class="form-control" placeholder="الأسم" name="lname" ng-model = "ar_fullname">
										</div>
									</div>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Full name</label>
											<input type="text" id="projectinput3" class="form-control"  name="fname"  ng-model ="en_fullname">
										</div>
									</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput6">نوع</label>
											<select id="projectinput6" name="budget" class="form-control" ng-model = "gendre">
												<option >ذكر</option>
												<option >انثى</option>
											</select>
										</div>
									</div>

								<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الاتصال</h4>
								<div class="row">
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">هاتف</label>
									<input type="text" id="companyName" class="form-control" placeholder="هاتف" name="phone" ng-model = "phone" >
								</div>
								</div>
									
								
								
								
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">البريد الألكتروني</label>
									<input type="text" id="companyName" class="form-control" placeholder="البريد الألكتروني" name="email" ng-model = "email">
								</div>
								</div>
								
							
									
								
							
								
								
								
								</div>
								
								
								
								<h4 class="form-section"><i class="icon-clipboard4"></i> المزيد</h4>
								
								
									

									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput6">العيادة</label>
											<select id="projectinput6" name="budget" class="form-control" ng-model = "clinic" >
												<option value  = "all"> جميع العيادات </option>
												<option ng-repeat = "da in clns" value = "@{{da.id}}" >@{{da.cln_arname}}</option>
											
											</select>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput6">المؤهلات</label>
											<textarea class = "form-control" ng-model = "mohlat"></textarea>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput6">كلمة المرور</label>
											<input type = "password" class = "form-control" ng-model = "password">
										</div>
									</div>
									
								
									
								<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">نوع الهوية</label>
											<select id="ad" name="da" class="form-control" ng-model = "idf_type">
												<option >بطاقة وطنية</option>
												<option >...</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">رقمها</label>
									<input type="text" id="ad" class="form-control" placeholder="0" name="company" ng-model = "idf_num">
								</div>
								</div>

								<div class = "col-md-12">
										<div class="form-group">
												<label for="companyName">الخزينة</label>
												<select class="form-control" ng-model="bankid">
													<option ng-repeat ="da in banks" value="@{{da.id}}">@{{da.bankname}}</option>
												</select>
											</div>
								</div>

								<div class="form-group">
									<label for="projectinput8">ملاحضات</label>
									<textarea id="da" rows="5" class="form-control" name="comment" placeholder="" ng-model = "more"></textarea>
								</div>

							</div>

							<div class="form-actions">
								<button type="button" onclick="location.reload()" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> الغاء
								</button>
								<button ng-click = "addEmp()" class="btn btn-primary">
									<i class="icon-check2"></i> حفظ
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
								
							
							</div>
							
							<div class="tab-pane fade" id="vists" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
								<p>قريبا</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
 
@endsection
@section('script')
  <script src="angular/controllers/empctrl.js" ></script>  
@endsection
