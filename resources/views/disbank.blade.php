@extends('master')

@section('title', 'جرد الخزينة')



@section('content')
<div class="card" ng-controller ="moneyctrl">
				<div class="card-header">
					<h4 class="card-title">جرد الخزينة </h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				<div class="row">
				
				
				
			
			
				<div class = "col-md-12">
			
		<div class="form-group">
		<label for="issueinput3">من تاريخ</label>
		<input type="text" id="issueinput3" class="form-control" name="daterange" >
		
		</div>
										
	</div>
			
		
		
		
			<div class="col-md-4" >
			<div class="form-group">
		<label for="issueinput3">نوع المستند</label>
		<select   class="form-control" ng-model  = "kind" name="dateopened">
				<option >الجميع</option>
		<option>قبض</option>
		<option>دفع</option>
		</select>
		</div>
		
			</div>
			
				<div class="col-md-4" >
			<div class="form-group">
		<label for="issueinput3">الفرع</label>
		<select   ng-model = "branch" ng-change = "getclns(branch)" class="form-control" name="dateopened">
		<option>الجميع</option>
			<option ng-repeat = "da in brns" value = "@{{da.id}}"> @{{da.branchname}}</option>
		
		</select>
		</div>
		
			</div>
			
		<div class="col-md-4" >
			<div class="form-group">
		<label for="issueinput3">العيادة</label>
		<select  ng-model="clnid" ng-change = "getdoctros(clnid)" class="form-control" name="dateopened">
		<option >الجميع</option>
		<option ng-repeat = "da in clns" value = "@{{da.id}}" >@{{da.cln_arname}}</option>

		</select>
		</div>
		</div>
		
		<div class="col-md-6" >
			<div class="form-group">
		<label for="issueinput3">الطبيب</label>
		<select  ng-model = "docid" class="form-control" name="dateopened">
		<option>الجميع</option>
		<option ng-repeat = "da in docs" value = "@{{da.id}}">@{{da.doc_name}}</option>
		</select>
		</div>
		</div>
		
		<div class="col-md-6" >
			<div class="form-group">
		<label for="issueinput3">الخزينة</label>
		<select  ng-model = "bankid" class="form-control" name="dateopened">
			<option>الجميع</option>
		<option ng-repeat = "da in banks" value = "@{{da.id}}"> @{{da.bankname}} </option>
		
		</select>
		</div>
		</div>
		
		
				
					<div class = "col-md-12">
							<button class="btn btn-primary btn-min-width mr-1 mb-1 btn-block" ng-click="getresult()" type="button">بحث  <i class="icon-search"> </i>  </button>

				</div>
				
				</div>
				
				
				<form class="form">
				<div class= "form-body">
				<h4 class="form-section"><i class="icon-clipboard4"></i> التفاصيل </h4>
			
				
			
					</div>
				</form>
				
					
				  <div class="table-responsive">
                    <table class="table table-hover mb-0"  datatable="ng" dt-options = "vm.dtOptions" dt-ColumnDefs = "vm.dtColumnDefs" style= "font-size:smaller;">
                        <thead>
                            <tr>
                                <th>#</th>
								<th>التاريخ</th>
								<th>الساعة</th>
                   				<th> الفرع </th>
								<th> المستخدم </th>
								<th> رقم المستند </th>
								<th> نوع المستند </th>
								<th> الحساب </th>
								<th> المبلغ </th>
								<th> الخزينة </th>
								<th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in result">
                                <th scope="row">@{{$index +1}}</th>
                                <td>@{{da.date1}}</td>
                                <td>@{{da.time1}}</td>
                                <td>@{{getbranchname(da.branch)}}</td>
								<td>@{{da.user_created}}</td>
								<td>@{{da.invid}} </td>
								<td>@{{da.kind}} </td>
								<td>@{{getpatname(da.account)}}</td>
								<td>@{{da.net_price}} </td>
								<td>@{{getbankname(da.bankid)}} </td>
								<td>
								<button type="button" class="btn btn-info btn-sm ">التفاصيل</button>
								
								</td>
                            </tr>
                          
                           </tbody>
                    </table>
                </div>
				
				<form class="form">
				<div class= "form-body">
				<h4 class="form-section"><i class="icon-clipboard4"></i> أجماليات الخزائن </h4>
			
				
			
					</div>
				</form>
				
				
				  <div class="table-responsive">
                    <table class="table table-hover mb-0" style= "font-size:smaller;">
                        <thead>
                            <tr>
                                <th>#</th>
								<th>الخزينة</th>
								<th>أجمالي سندات القبض</th>
                   				<th> أجمالي سندات الدفع </th>
								<th> صافي الرصيد </th>
								<th> الرصيد الحالي </th>
								
								<th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>الخزينة 1</td>
                                <td>200</td>
                                <td>0</td>
								<td>200</td>
								<td>200 </td>
								
								
								<td>
								<button type="button" class="btn btn-info btn-sm ">سند دفع</button>
								<button type="button" class="btn btn-info btn-sm ">تحويل نقدية</button>
								</td>
                            </tr>
                          
                           </tbody>
                    </table>
                </div>
				
				
			<form class="form">
			<div class="form-body">
			<h4 class="form-section"><i class="icon-clipboard4"></i> الملخص</h4>
			
			<div class= "row">
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">أجمالي القبض</label>
				<input type = "number" id="projectinput6" readonly = "readonly" value = 200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">أجمالي الدفع</label>
				<input type = "number" id="projectinput6" readonly = "readonly" value="0" class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">صافي الرصيد</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">الرصيد الحالي</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				<div class = "col-md-12">
							<button class="btn btn-success btn-min-width mr-1 mb-1 btn-block" type="button">طباعة  <i class="icon-print"> </i>  </button>

				</div>
				
				</div>
				</div>
			</form>
			
		</div>
				
				
		</div>
				
				
</div>
<!--
<div class="card">
				<div class="card-header">
					<h5 class="card-title" style = "color:#DA4453;" >زيارات المريض : محسن يوسف صديق</h5>
				</div>
				
				<div class="card-body">
				
				<div class="card-block">
				
			</div>
			
		</div>
				
</div>
-->
				
@endsection
@section('script')
<script src="angular/controllers/moneyctrl.js" ></script>  
<script>
		$('input[name="daterange"]').daterangepicker({
			locale: {
				format: 'YYYY-MM-DD',
				"separator": " | ",
				"applyLabel": "اختيار",
				"cancelLabel": "الغاء"
			  }
		});
</script>
@endsection