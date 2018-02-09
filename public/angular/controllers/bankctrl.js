app.controller('bankctrl',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
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
    
$http.get('api/bank')
.success(function(respone){
    $scope.banks= respone;
})

$scope.refresh = function() {
    $http.get('api/bank')
    .success(function(respone){
        $scope.banks= respone;
    })
}

$scope.edit = function (id) {

    $http.get('api/bank/show/' + id).success(function(data){
        
       $scope.bankname = data.bankname
       $scope.banktype  = data.banktype
       $scope.bankmore   = data.bankmore
        $scope.bankid = id
    })

}

$scope.Add = function() {
$scope.loading = true;
var apiUrl = ""

if ($scope.empid) {
    apiUrl = "api/bank/" + $scope.empid;
}else{
    apiUrl = "api/bank"
}

$http.post(apiUrl, {
bankname:$scope.bankname,
banktype : $scope.banktype,
bankmore : $scope.bankmore

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

$scope.delete = function(id) {
    $http.delete('api/bank/'+id).success(function(data, status, headers, config) {

            $scope.refresh();


        });
}

})


