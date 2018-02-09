	<div class="modal fade text-xs-left" id="default2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel1">بيانات المريض : @{{patname}}</h4>
										  </div>
										  <div class="modal-body">
											<h5>رقم الملف :  <span style = "color:red;"> @{{patFile}} </span> </h5>
											<p>English Name : <span style = "color:red;"> @{{patnameEn}}</span></p>
											<p>رقم التلفون : <span style = "color:red;"> @{{patphone}}</span></p>
											<p>رقم التلفون 2 : <span style = "color:red;"> @{{patphone2}}</span></p>
											<p>فاكس : <span style = "color:red;"> @{{patfax}}</span></p>
											<p>البريد الألكتروني : <span style = "color:red;"> @{{patemail}}</span></p>
											<p>العنوان : <span style = "color:red;"> @{{pataddress}}</span></p>
											<p>الجنسية :<span style = "color:red;"> @{{patnat}}</span></p>
											<p>الحالة الأجتماعية :<span style = "color:red;"> @{{patmetrial}}</span></p>
											<p>الجنس : <span style = "color:red;">@{{patsex}}</span></p>
											<p>نوع البطاقة : <span style = "color:red;">@{{idf_type}}</span></p>
											<p> رقم البطاقة : <span style = "color:red;">@{{idf_num}}</span></p>
											
											<hr>
											<h5>المزيد</h5>
											<p>@{{patmore}}</p>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">الغاء</button>
											
										  </div>
										</div>
									  </div>
									</div>