app.controller('doctrl',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
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

                      $scope.files = [];   
                      $scope.btnst = "حفظ"
                      $scope.btnstd = false
                      $scope.imgSrc =  "images/up.png"


         $http.get('api/cln')
     .success(function(respone){
     $scope.clns= respone;
        $scope.refresh();


       })
                      


$scope.refresh = function() {
    $http.get('api/doctor')
    .success(function(respone){
        $scope.docs= respone;
    })
}

$scope.get_clnname = function(id) {
    
        var clnname = id
       
    
       
    
        for (let index = 0; index <   $scope.clns.length; index++) {
            const element =   $scope.clns[index];
        
            if (element.id == id) {
                clnname = element.cln_arname
            }
        }
        return clnname
    
    }


var fd = new FormData();
$scope.uploadavtar = function(files) {
    fd.append("file", files[0]);
  }

  $scope.uploadavtar2 = function(files) {
    fd.append("file1", files[0]);
  }

  $scope.uploadDone = function () {
    var apiUrl = ""
    $scope.btnst = "جاري الحفظ ..."
    $scope.btnstd = true;

    if ($scope.doid) {
        apiUrl = "api/doctor/" + $scope.doid;
    }else{
        apiUrl = "api/doctor"
    }

  

    fd.append("doc_name", $scope.doc_name)
    fd.append("doc_phone", $scope.doc_phone)
    fd.append("doc_salary", $scope.doc_salary)
    fd.append("doc_email", $scope.doc_email)
    fd.append("doc_clinic", $scope.doc_clinic)
    fd.append("doc_mohlat", $scope.doc_mohlat)
    fd.append("doc_address", $scope.doc_address)
    fd.append("password", $scope.password)

    $http.post(apiUrl, fd, {
        withCredentials: true,
        headers: {'Content-Type': undefined },
        transformRequest: angular.identity
    }).then(function successCallback(response) {
    swal({
        title: "تم !",
        text: "تمت العملية بنجاح ",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "موافق"
        })
        $timeout(function () {
            location.reload();
        }, 1000);
    }, function errorCallback(response) {
        swal({
            title: "خطأ",
            text: "يوجد خطأ يرجى مراجعة البيانات ",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "موافق"
            })
    });
  }






$scope.edit = function (id) {
    
        $http.get('api/doctor/show/' + id).success(function(data){
            console.log(data)
            $scope.doc_name = data['doc_name'];
            $scope.doc_phone = data.doc_phone;
            $scope.doc_salary = data.doc_salary;
            $scope.doc_email = data.doc_email;
            $scope.doc_clinic = data.doc_clinic
            $scope.doc_mohlat = data.doc_mohlat
            $scope.doc_address = data.doc_address

            if (data.img_doc) {
                $scope.imgSrc =  "images/doctor/"  + data.img_doc
            }else{
                $scope.imgSrc =  "images/up.png"
            }
           
            if (data.img_mohlat) {
                $scope.imgSrc1 =  "images/doctor/"  + data.img_mohlat
            }else{
                $scope.imgSrc1 =  "images/up.png"
            }


            $scope.doid = id;
    
        })
    
    }

$scope.delete = function(id) {
    $http.delete('api/doctor/'+id).success(function(data, status, headers, config) {

            $scope.refresh();


        });
}

})


