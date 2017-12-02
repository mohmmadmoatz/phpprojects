app.controller('empctrl',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
    var lang = {
        "decimal":        "",
        "emptyTable":     "لايوجد بيانات",
        "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ entries",
        "loadingRecords": "Loading...",
        "processing":     "Processing...",
        "search":         "بحث عام : ",
        "zeroRecords":    "لايوجد بيانات",
        "paginate": {
            "first":      "<|",
            "last":       "|>",
            "next":       ">>",
            "previous":   "<<"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
    
    $scope.vm = {};
	$scope.vm.dtInstance = {};   
	$scope.vm.dtColumnDefs = [DTColumnDefBuilder.newColumnDef(2).notSortable()];
	$scope.vm.dtOptions = DTOptionsBuilder.newOptions()
					  .withOption('paging', true)
					  .withOption('searching', true)
					  .withOption('info', false)
					  .withOption('dom', 'Bfrtip')
					  .withButtons([])
                      .withOption('language',lang)     
    
$http.get('api/emps')
.success(function(respone){
    $scope.Emps= respone;
})

$scope.refresh = function() {
    $http.get('api/emps')
    .success(function(respone){
        $scope.Emps= respone;
    })
}

$scope.editEmp = function (id) {

    $http.get('api/emps/show/' + id).success(function(data){
        console.log(data)
        $scope.barcode = data['barcode'];
        $scope.ar_fullname = data.ar_fullname;
        $scope.en_fullname = data.en_fullname;
        $scope.gendre = data.gendre
        $scope.phone = data.phone
        $scope.email = data.email
        $scope.clinic = data.clinic
        $scope.mohlat = data.mohlat
        $scope.idf_type = data.idf_type
        $scope.idf_num = data.idf_num
        $scope.more = data.more
        $scope.empid = id;

    })

}

$scope.addEmp = function() {
$scope.loading = true;
var apiUrl = ""

if ($scope.empid) {
    apiUrl = "api/emps/" + $scope.empid;
}else{
    apiUrl = "api/emps"
}

$http.post(apiUrl, {
barcode: $scope.barcode,
ar_fullname: $scope.ar_fullname,
en_fullname : $scope.en_fullname,
gendre : $scope.gendre,
phone : $scope.phone,
email  :   $scope.email,
clinic : $scope.clinic,
mohlat : $scope.mohlat,
idf_type : $scope.idf_type,
idf_num : $scope.idf_num,
more :$scope.more,

}).success(function(data, status, headers, config) {

    
    swal({
        title: "تم !",
        text: "تمت العملية بنجاح ",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "موافق"
        }, 
        function(){ 
        
     });

     $timeout(function () {
        location.reload();
    }, 1000);

}).error(function (error) {
    swal({
        title: "خطأ",
        text: "لم تتم الأضافة يرجى مراجعة البيانات",
        type: "error",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "موافق"
        }, 
        function(){ 
        
     });
});
};

$scope.deleteEmp = function(id) {
    $http.delete('api/emps/'+id).success(function(data, status, headers, config) {

            $scope.refresh();


        });
}

})


