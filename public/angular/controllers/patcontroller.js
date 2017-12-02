app.controller('patcontroller',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
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
    
$http.get('api/pats')
.success(function(respone){
    $scope.patlist= respone;
})

$scope.refresh = function() {
    $http.get('api/pats')
    .success(function(respone){
        $scope.patlist= respone;
    })
}

$scope.editpat = function (id) {

    $http.get('api/pats/show/' + id).success(function(data){
        console.log(data)
        $scope.Fnum = data['Fnum'];
        $scope.ar_fname = data.ar_fname;
        $scope.ar_lname = data.ar_lname;
        $scope.en_fname = data.en_fname
        $scope.en_lname = data.en_lname
        $scope.phone1 = data.phone1
        $scope.phone2 = data.phone2
        $scope.fax = data.fax
        $scope.email = data.email
        $scope.nat = data.nat
        $scope.address = data.address
        $scope.metrial_st = data.metrial_st
        $scope.gendre = data.gendre
        $scope.idf_type = data.idf_type
        $scope.idf_num = data.idf_num
        $scope.more = data.more
        $scope.patid = id;

    })

}

$scope.addPat = function() {
$scope.loading = true;
var apiUrl = ""

if ($scope.patid) {
    apiUrl = "api/pats/" + $scope.patid;
}else{
    apiUrl = "api/pats"
}

$http.post(apiUrl, {
Fnum: $scope.Fnum,
ar_fname: $scope.ar_fname,
ar_lname : $scope.ar_lname,
en_fname : $scope.en_fname,
en_lname : $scope.en_lname,
phone1  :   $scope.phone1,
phone2 : $scope.phone2,
fax : $scope.fax,
email : $scope.email,
nat : $scope.nat,
address :$scope.address,
metrial_st : $scope.metrial_st,
gendre      : $scope.gendre,
idf_type : $scope.idf_type ,
idf_num : $scope.idf_num ,
more : $scope.more
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

$scope.deletePat = function(id) {
    $http.delete('api/pats/'+id).success(function(data, status, headers, config) {

            $scope.refresh();


        });
}

})


