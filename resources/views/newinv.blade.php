@extends('master')

@section('title', 'فاتورة شراء | جديد')



@section('content')
<div class="card">
				<div class="card-header">
					<h4 class="card-title">فاتورة شراء | جديد </h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				<div class="row">
				
				
				
			
			
				<div class = "col-md-6">
			
		<div class="form-group">
		<label for="issueinput3">رقم الفاتورة</label>
		<input type="text" id="issueinput3" class="form-control" name="dateopened" readonly value = "BuyInv-0001">
		
		</div>
										
	</div>
			
		
		<div class = "col-md-6">
			
		<div class="form-group">
		<label for="issueinput3">التاريخ</label>
		<input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="اختيار التاريخ">
		
		</div>
										
	</div>
		
			<div class="col-md-4" >
			<div class="form-group">
		<label for="issueinput3">المورد</label>
		<select   class="form-control" name="dateopened">
		<option>محمد سعيد </option>
		
		</select>
		</div>
		
			</div>
			
				<div class="col-md-4" >
			<div class="form-group">
		<label for="issueinput3">العيادة</label>
		<select   class="form-control" name="dateopened">
		<option> عيادة الأسنان رجال</option>
		
		</select>
		</div>
		
			</div>
			
		<div class="col-md-4" >
			<div class="form-group">
		<label for="issueinput3">الطبيب</label>
		<select   class="form-control" name="dateopened">
		<option> توفيق محسن سعدون </option>
		
		</select>
		</div>
		</div>
		
	
				
				
				
				</div>
				
				
				<form class="form">
				<div class= "form-body">
				<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الفاتورة </h4>
			
				
			
					</div>
				</form>
				
		<div class="col-md-12" >
		<div class="form-group">
		<label for="issueinput3">الصنف</label>
		<select   class="form-control" name="dateopened">
		<option> صنف 1  </option>
		</select>
		<button  class="btn btn-success btn-min-width btn-block" type="button" style = "margin-top:6px;" > +</button>
		</div>
		</div>
		
				
			
		
					
				  <div class="table-responsive">
                    <table class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
								<th>الصنف</th>
								<th>الكمية</th>
                   				<th> السعر </th>
								<th> الأجمالي </th>
								
								<th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>صنف 1</td>
                                <td>2</td>
                                <td>100</td>
								<td>200</td>
								
								<td>
								<button type="button" class="btn btn-danger  ">حذف</button>
								
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
				
				<label for="projectinput1">أجمالي الفاتورة</label>
				<input type = "number" id="projectinput6" readonly = "readonly" value = 200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1"> خصم اضافي قيمة</label>
				<input type = "number" id="projectinput6" readonly = "readonly" value="0" class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">خصم اضافي نسبة %</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">خصم الأصناف</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-3">
				
				<div class="form-group">
				
				<label for="projectinput1">اجمالي الخصم</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				
				<div class= "col-md-9">
				
				<div class="form-group">
				
				<label for="projectinput1">ملاحظات</label>
				<textarea  id="projectinput6"   class="form-control"></textarea>
												
				</div>
				</div>
				
					<div class= "col-md-12">
				
				<div class="form-group">
				
				<label for="projectinput1">الصافي</label>
				<input type = "number" id="projectinput6" readonly = "readonly"  value=200 class="form-control">
												
				</div>
				</div>
				
				<div class = "col-md-4">
				<button class="btn btn-success btn-min-width mr-1 mb-1 btn-block" type="button">حفظ  <i class="icon-save"> </i>  </button>

				</div>
				
				<div class = "col-md-4">
				<button class="btn btn-success btn-min-width mr-1 mb-1 btn-block" type="button">حفظ + سند دقع  <i class="icon-save"> </i>  </button>

				</div>
				
				<div class = "col-md-4">
				<button class="btn btn-success btn-min-width mr-1 mb-1 btn-block" type="button">جفظ + جديد  <i class="icon-save"> </i>  </button>

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