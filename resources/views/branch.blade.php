@extends('master')

@section('title', 'الفروع')



@section('content')

	<div class="card" ng-controller = "brctrl">
				<div class="card-header">
					<h4 class="card-title">قسم الفروع</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						<ul class="nav nav-tabs nav-justified" id= "myTab">

						<li class="nav-item">
								<a class="nav-link active" id="active-tab" data-toggle="tab" href="#clnlist" aria-controls="active" aria-expanded="true">الفروع</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="link-tab" data-toggle="tab" href="#newPat" aria-controls="link" aria-expanded="false">الفرع : @{{branchname}}</a>
							</li>
							
							
						</ul>
						

						<div class="tab-content px-1 pt-1">
						
	    <div role="tabpanel" class="tab-pane fade active in" id="clnlist" aria-labelledby="active-tab" aria-expanded="true">

	<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة الفروع</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table datatable="ng"  dt-options="vm.dtOptions" class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الفرع</th>
                                <th>الكود</th>
								<th>العنوان</th>
                                <th>مدير الفرع</th>
								<th>الهاتف</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in brns">
                                <th scope="row">@{{$index +1}}</th>
                                <td>@{{da.branchname}}</td>
                                <td>@{{da.br_code}}</td>
                                <td>@{{da.address}}</td>
								<td>@{{da.br_own}}</td>
								<td>@{{da.br_phone}}</td>
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
					<h4 class="card-title" id="basic-layout-form">بيانات الفرع</h4>
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
											
                                            <input type = "text" class = "form-control" placeholder = "ادخل اسم الفرع" ng-model = "branchname">
											
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">الكود</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="ادخل الكود" ng-model = "br_code">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">مدير الفرع</label>
											<input type="text" id="projectinput2" class="form-control" placeholder="مدير الفرع" name="lname" ng-model = "br_own">
										</div>
									</div>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">البريد الألكتروني</label>
											<input type="text" id="projectinput3" class="form-control"  name="email" ng-model = "br_email">
										</div>
									</div>
									
                                    <div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">الهاتف</label>
											<input type="text" id="projectinput3" class="form-control"  name="phone" ng-model = "br_phone">
										</div>
									</div>

                                    <div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">فاكس</label>
											<input type="text" id="projectinput3" class="form-control"  name="fax" ng-model = "br_fax">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">العنوان</label>
											<textarea class = "form-control" ng-model = "br_address"> </textarea>
										</div>
									</div>

									<div class="col-md-6">
    <div class="form-group">
        <label>صورة الفرع</label>
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

<!-- 
ImageScript

-->




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
								<button type="button" onclick="location.reload()" class="btn btn-warning mr-1">
									<i class="icon-cross2"  ></i> الغاء
								</button>
								<button  ng-click="uploadDone()" ng-disabled = "btnstd" class="btn btn-primary">
									<i class="icon-check2" ></i> @{{btnst}}
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
  <script src="angular/controllers/brctrl.js" ></script>  
@endsection