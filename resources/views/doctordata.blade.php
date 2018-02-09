@extends('master')

@section('title', 'بيانات الأطباء')



@section('content')

	<div class="card" ng-controller = "doctrl">
				<div class="card-header">
					<h4 class="card-title">قسم الأطباء</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						<ul class="nav nav-tabs nav-justified" id = "myTab">

						<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#clnlist" aria-controls="active" aria-expanded="true">قائمة الأطباء</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">الطبيب : @{{doc_name}}</a>
							</li>
							
							
						</ul>
						

				<div class="tab-content px-1 pt-1">
						
	    <div role="tabpanel" class="tab-pane fade active in" id="clnlist" aria-labelledby="active-tab" aria-expanded="true">

	<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة الأطباء</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table datatable="ng" dt-options = "vm.dtOptions" dt-ColumnDefs = "vm.dtColumnDefs" class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الطبيب</th>
                                <th>العيادة</th>
								<th>الراتب</th>
                                <th>الهاتف</th>
								
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  ng-repeat = "da in docs">
                                <th scope="row">@{{$index + 1}}</th>
                                <td>@{{da.doc_name}}</td>
                                <td>@{{get_clnname(da.doc_clinic)}}</td>
                                <td>@{{da.doc_salary}}</td>
								<td>@{{da.doc_phone}}</td>
							
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
					<h4 class="card-title" id="basic-layout-form">بيانات الطبيب</h4>
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
											<label for="projectinput1">الأسم</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="اسم الطبيب" name="doc_name" ng-model ="doc_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">الهاتف</label>
											<input type="text" id="projectinput2" class="form-control" placeholder="" name="phone1" ng-model="doc_phone">
										</div>
									</div>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">الراتب</label>
											<input type="text" id="projectinput3" class="form-control"  name="salary" ng-model = "doc_salary" >
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput3">البريد الألكتروني</label>
											<input type = "email" class = "form-control" name = "email" ng-model = "doc_email">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput3">كلمة المرور</label>
											<input type = "password" class = "form-control" name = "password" ng-model = "password">
										</div>
									</div

                                    	<div class="col-md-12">
										<div class="form-group">
										<label for="projectinput3">العيادة</label>
                                        <select class = "form-control" ng-model = "doc_clinic">
                                        <option ng-repeat = "da in clns" value = "@{{da.id}}"> @{{da.cln_arname}} </option>
                                        </select>
										</div>
									</div>

                                    
									</div>
							

								
								<div class="row">
								
								<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">العنوان</label>
									<textarea type="text"  class="form-control"  ng-model = "doc_address"></textarea>

								</div>
								</div>
								
								<div class="col-md-12">
								
                                <div class="form-group">
									<label for="companyName">المؤهلات</label>
									<textarea type="text"  class="form-control"  ng-model = "doc_mohlat"></textarea>

								</div>

								</div>
									
<div class="col-md-6">
    <div class="form-group">
        <label>صورة الطبيب</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file">
                    اختيار <input type="file" id="imgInp" name="file" onchange="angular.element(this).scope().uploadavtar(this.files)">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img align = "center" class="img-thumbnail"  ng-src = "@{{imgSrc}}" id='img-upload'  />
    </div>
</div> 

								<div class="col-md-6">
    <div class="form-group">
        <label>صورة المؤهل</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file">
                    اختيار <input type="file" id="imgInp1" name="file1" onchange="angular.element(this).scope().uploadavtar2(this.files)">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img align = "center" class="img-thumbnail"  ng-src = "@{{imgSrc1}}" id='img-upload1'  />
    </div>
</div>
		<style>
			.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
	margin-top: 3px;
    width: 70%;
}
			</style>

								</div>
                                </div>
								
								
								
								
								
								
									

							<div class="form-actions">
								<button type="button" onclick = "location.reload()" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> الغاء
								</button>
								<button ng-click = "uploadDone()"  class="btn btn-primary">
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
 
@endsection
@section('script')

<script src="angular/controllers/doctrl.js" ></script>  

@endsection