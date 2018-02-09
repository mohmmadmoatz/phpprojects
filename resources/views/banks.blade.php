@extends('master')

@section('title', 'الخزائن')



@section('content')

	<div class="card" ng-controller = "bankctrl">
				<div class="card-header">
					<h4 class="card-title">قسم الخزائن</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						<ul class="nav nav-tabs nav-justified" id= "myTab">

						<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#clnlist" aria-controls="active" aria-expanded="true">قائمة الخزائن</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">الخزينة : @{{bankname}}</a>
							</li>
							
							
						</ul>
						

						<div class="tab-content px-1 pt-1">
						
	    <div role="tabpanel" class="tab-pane fade active in" id="clnlist" aria-labelledby="active-tab" aria-expanded="true">

	<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة الخزائن</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table datatable="ng"  dt-options="vm.dtOptions" class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الخزينة</th>
                                <th>النوع</th>
								<th>الملاحظات</th>
                                
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in banks">
                                <th scope="row">@{{$index +1}}</th>
                                <td>@{{da.bankname}}</td>
                                <td>@{{da.banktype}}</td>
                                <td>@{{da.bankmore}}</td>
								
								<td>
								<button type="button" ng-click="edit(da.id)"  onclick="$('#myTab li:eq(1) a').tab('show')" class="btn btn-primary">تعديل</button>
								<button type="button" ng-click = "delete(da.id)" class="btn btn-danger ">حذف</button>
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
					<h4 class="card-title" id="basic-layout-form">بيانات الخزينة</h4>
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
								
								
								<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">الخزينة</label>
											
                                            <input type = "text" class = "form-control" placeholder = "اسم الخزينة" ng-model = "bankname">
											
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">نوعها</label>
											
											<select class= "form-control" ng-model = "banktype">
											<option>عامة</option>
											<option>فرعية</option>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput2">الملاحظات</label>
										<textarea class = "form-control" ng-model = "bankmore"> </textarea>
											</div>
									</div>
								
								
							
									

								
							
								
								
								</div>
								
								
								
								
								
								
									

							<div class="form-actions">
								<button type="button" onclick="location.reload()" class="btn btn-warning mr-1">
									<i class="icon-cross2"  ></i> الغاء
								</button>
								<button  ng-click="Add()"  class="btn btn-primary">
									<i class="icon-check2" ></i> حفظ
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
 
@endsection
@section("script")
  <script src="angular/controllers/bankctrl.js" ></script>  
@endsection