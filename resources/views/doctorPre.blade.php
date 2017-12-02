@extends('master')

@section('title', 'المريض : محسن صديق يوسف')



@section('content')
<div class="card">
				<div class="card-header">
					<h4 class="card-title">المريض : محسن صديق يوسف</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				<div class="row">
				
				
				
			<div class="col-md-12">
			
			<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button">الملف : P-005-1024 </button>
	
			</div>
			
			<div class="col-md-6" >
			
		    <button class="btn btn-primary btn-min-width mr-1 mb-1 btn-block" type="button"  disabled="disabled">وقت الدخول : 05:15 م </button>
		
			</div>
		
				
				</div>
				<form class="form">
				<div class= "form-body">
				<h4 class="form-section"><i class="icon-clipboard4"></i> اضافة الأجراءات </h4>
				<div class= "row">
			
				<div class= "col-md-3">
				
				<div class="form-group">
											<label for="projectinput1">المجموعة</label>
											<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb">خدمات عيادة الاسنان</option>
											
											</select>
										</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
											<label for="projectinput1">الخدمة</label>
											<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb">حشو عصب</option>
											
											</select>
										</div>
				</div>
				
					<div class= "col-md-2">
				
				<div class="form-group">
											<label for="projectinput1">التكلفة</label>
											<input type = "number" id="projectinput6" name="budget" class="form-control">
												
										</div>
				</div>
				
					<div class= "col-md-2">
				
				<div class="form-group">
											<label for="projectinput1">عدد</label>
											<input type = "number" id="projectinput6" name="budget" class="form-control">
												
										</div>
				</div>
				<div class = "col-md-2" align="center">
			
				<label for="button">أضف</label>
				<button  class="btn btn-success btn-min-width mr-1 mb-1" type="button"> +</button>

				
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
								<th> ملاحظات </th>
								<th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>حشو عصب</td>
                                <td>50</td>
                                <td>2</td>
								<td>100</td>
								<td>لايوجد ملاحظات </td>
								<td>
								<button type="button" class="btn btn-danger ">حذف</button>
								
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
				<input type = "number" id="projectinput6" readonly = "readonly" value = 200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-4">
				
				<div class="form-group">
				
				<label for="projectinput1">الخصم</label>
				<input type = "number" id="projectinput6" readonly = "readonly" value="0" class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-4">
				
				<div class="form-group">
				
				<label for="projectinput1">صافي الفاتورة</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				<div class = "col-md-12">
							<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button">انهاء الجلسة  <i class="icon-user-check"> </i>  </button>

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