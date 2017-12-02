@extends('master')

@section('title', 'تعريف الأصناف والخدمات والأجراءات')



@section('content')
<div class="card">
				<div class="card-header">
					<h4 class="card-title">تعريف الأصناف والخدمات والأجراءات </h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				<div class="row">
				
				
				<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">الكود</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="ادخل الكود" name="fname">
										</div>
									</div>
			
			<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">الباركود</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="الباركود" name="fname">
										</div>
									</div>
			
			<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput1">الأسم عربي</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="الأسم عربي" name="fname">
										</div>
									</div>
			
			<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput1">الأسم لاتيني</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="الأسم لاتيني" name="fname">
										</div>
									</div>
			
						<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput1">مجموعة</label>
												<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
											</div>
									</div>	
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">نوع الصنف</label>
												<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
											</div>
									</div>	
			
			
				<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">التصنيف</label>
												<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
											</div>
									</div>	
		
			<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">الشركة المنتجة</label>
												<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
											</div>
									</div>	
		
			<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">الوحدة</label>
												<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
											</div>
									</div>	
		
		<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">الشراء</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="0" name="fname">
										</div>
									</div>
				
				<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">سعر البيع</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="0" name="fname">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput1">النصف جملة</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="0" name="fname">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput1">الجملة</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="0" name="fname">
										</div>
									</div>
									
										<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput1">جملة الجملة</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="0" name="fname">
										</div>
									</div>
				
					<div class = "col-md-12">
							<button class="btn btn-primary btn-min-width mr-1 mb-1 btn-block" type="button">حفظ  <i class="icon-plus"> </i>  </button>

				</div>
				
				</div>
				
				
				<form class="form">
				<div class= "form-body">
				<h4 class="form-section"><i class="icon-clipboard4"></i> القائمة </h4>
			
				
			
					</div>
				</form>
				
					
				  <div class="table-responsive">
                    <table class="table table-hover mb-0" style= "font-size:smaller;">
                        <thead>
                            <tr>
                                <th>#</th>
								<th>باركود</th>
								<th>الكود</th>
                   				<th> اسم الصنف </th>
								<th> سعر الشراء </th>
								<th> بيع مستهلك </th>
								<th> بيع نصف جملة </th>
								<th> بيع جملة </th>
								<th> بيع جملة الجملة </th>
								
								<th>  </th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>0389523</td>
                                <td>123412</td>
                                <td>ازالة الجبر مع التلميع بلجهاز - DEN-9</td>
								<td>340</td>
								<td>450 </td>
								<td>507 </td>
								<td>505  </td>
								<td>550 </td>
								
								<td>
								<button type="button" class="btn btn-danger btn-sm ">حذف</button>
								<button type="button" class="btn btn-info btn-sm ">تعديل</button>
								</td>
								
                            </tr>
                          
                           </tbody>
                    </table>
                </div>
				
			
				
				
				
				
			
			
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