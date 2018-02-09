app.controller('booking',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder, $interval) {
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
            "next":       "<",
            "previous":   ">"
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

        
                  






                     $scope.putinfo = function (id) {
                         $scope.userid = id

                         $http.get('api/emps/show/'+$scope.userid)
                         .success(function(respone){
                            $scope.userdata= respone;
                            $scope.clinicid = $scope.userdata.clinic

                            $scope.bankid = $scope.userdata.bankid
                            console.log($scope.bankid)
                            $scope.getbankname($scope.bankid)
                                 var d  =  new Date();
                                 var mm =  parseInt(d.getMonth()) + 1 
                                 $scope.todaydate = d.getFullYear() + '-' + mm + '-' + d.getDate();
                                 $scope.datesel = $scope.todaydate

                                 $scope.refresh()
                                 //$scope.getDoctorByid()
                         })
   
                       

                     } 

                     $scope.putinfoDoc = function (id) {
                        $scope.userid = id

                        $http.get('api/doctor/show/'+$scope.userid)
                        .success(function(respone){
                           $scope.userdata= respone;
                           $scope.clinicid = $scope.userdata.doc_clinic
                           $scope.clnid = $scope.clinicid
                           $scope.doctorname = $scope.userdata.doc_name
                           $scope.doc_id = $scope.userdata.id
                           console.log($scope.doc_id) 
                                var d  =  new Date();
                                var mm =  parseInt(d.getMonth()) + 1 
                                $scope.todaydate = d.getFullYear() + '-' + mm + '-' + d.getDate();
                                $scope.datesel = $scope.todaydate

                                $scope.refresh()

                        })
  
                      

                    }


           $scope.getbankname =  function (id) {

            $http.get('api/bank/show/'+id)
            .success(function(respone){
                $scope.bankname = respone.bankname
                
            })
           }     

$scope.refresh =  function() {
    $http.get('api/cln/byid/'+$scope.clinicid)
    .success(function(respone){
        $scope.clns= respone;
        $scope.branch = respone[0]['br_id']
        $scope.clnname = respone[0]['cln_arname']
        $scope.getbooking4doctor()
    })
}

// Cln Per Ctrl 


$scope.perArr = [];
$scope.perBooked = []

$scope.checkappt  =  function (item) { 
var status = 'متاح'
var pat = ''


for (let index = 0; index < $scope.perBooked.length; index++) {
    const element = $scope.perBooked[index];

    if (element.perid === item.perid && element.hour.trim() === item.appt.trim()) {
        status = element.status
        item.status = status + "/background-color:#8e44ad;color:#fff;padding:3px"
        item.pat_id = element.pat_id
        item.patfnum = $scope.getPatinfo(element.pat_id,'file') + "/background-color:#8e44ad;color:#fff;padding:3px"
        item.patname = $scope.getPatinfo(element.pat_id,'name') + "/background-color:#8e44ad;color:#fff;padding:3px"
        item.apptstatus = element.apptstatus + "/background-color:#8e44ad;color:#fff;padding:3px"
        item.bookid = element.id
    }

}
$scope.getTotalAvaliable()
}

$scope.getPatinfo = function (id,what) {

var fnum = ''
var patname = '' 

for (let index = 0; index < $scope.pats.length; index++) {
    const element = $scope.pats[index];
    
    if (element.id = id) {
        fnum = element.Fnum
        patname = element.ar_fname + ' ' + element.ar_lname
    }

    if (what ==='name') {
        return patname
    }else{
        return fnum

    }

}

}

$scope.getDocname = function (id) {

    for (let index = 0; index < $scope.docs.length; index++) {
        const element = $scope.docs[index];
        
        if (element.id == id) {
            return element.doc_name;
            break;
        }
    }

}




$scope.getDoctors  = function (id) {
    $http.get('api/doctor/bycln/'+id)
    .success(function(respone){
        $scope.docs= respone;
        $scope.getclninfo(id)
    })
}

$scope.getDoctorByid  = function (id) {
    $http.get('api/doctor/show/'+id)
    .success(function(respone){
        $scope.docs= respone;
      //  $scope.getclninfo(id)
    })
}

$scope.getclninfo = function (id) {
$scope.kshf_value = 0
$scope.cln_refday =0
$scope.cln_refvalue = 0

for (let index = 0; index < $scope.clns.length; index++) {
    const element = $scope.clns[index];
  
    if ( id == element.id) {
        console.log(id,element.id)
        $scope.kshf_value = element.cln_kshfvalue
        $scope.cln_refday = element.cln_refdays
        $scope.cln_refvalue = element.cln_refvale
        break;
    }
}

}


$scope.getPats  = function () {
    $http.get('api/pats')
    .success(function(respone){
        $scope.pats= respone;
    })
}


$scope.getPats();
$scope.getclnper = function(id) {
$scope.perArr = [];
    $http.get('api/clnper/' + id ).success(function (data){
        
                $scope.clnsper =  data;
            var count = 0
            for (let index = 0; index <  $scope.clnsper.length; index++) {
                count +=1
                const element =  $scope.clnsper[index];
                 var timeFirst =  new Date(element.per_from);
                 var timeEnd = new Date(element.per_to);

                 $scope.Pertime(timeFirst.toTimeString("HH:MM"),element.kshf_per,$scope.getdiff(timeFirst,timeEnd),element.id)
                if (count !== $scope.clnsper.length) {

                 $scope.perArr.push({perid : 'استراحة' , appt : '--'})

                }
                 
            }

            

        })

}



$scope.Pertime = function (ftime,per,svh,perid) { 
    var svhinmnt = svh.split(":")[0] * 60 + parseInt(svh.split(":")[1]) 
    var numofper = svhinmnt / per
    var hourstart =  parseInt(ftime.split(":")[0])
    var minutestart =  parseInt(ftime.split(":")[1])
    
    var counter = 0

    $scope.perArr.push({perid : 'الفترة ' + perid , appt : h24to12h(hourstart + ":" + minutestart) ,status :'متاح',patname:'' , patfnum :'', apptstatus : '' , bookid : '',pat_id:''})    

    for (var index = 1; index < numofper; index++) {
        
    var result = ""
      minutestart += parseInt(per)
      if (minutestart===60){
          minutestart=0
          hourstart +=1
      }
      
      if (hourstart === 24){
      hourstart = 0
      }
      
      result = hourstart + ":" + minutestart

      $scope.perArr.push({perid : 'الفترة ' + perid , appt : h24to12h(result),status:'متاح',patname : '', patfnum : '' , apptstatus : '' , bookid : '',pat_id:''})    
    }
      
    }
    
    function h24to12h(hour) {
    var hh = hour.split(":")[0]
    var mm = hour.split(":")[1]
    var ampm = ""
    if (hh > 12){
    ampm = " م "
    }else{
    ampm = "ص  "
    }
      
    var hh12 = hh % 12 || 12
    if (hh12 < 10) {
        hh12 = "0" + hh12
    }
    if (mm < 10) {
        mm = "0" + mm
    }
    var result = ""
    result = hh12 + ":" + mm + " " + ampm
      return result
    }
    

    $scope.getdiffDay = function (date1a,date2a) {
        var date1 = new Date(date1a);
        var date2 = new Date(date2a);
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
        return diffDays;
    }

$scope.getdiff = function (h1,h2) {

    var timeStart = new Date(h1).getTime();
    var timeEnd = new Date(h2).getTime();
    var hourDiff = timeEnd - timeStart; //in ms
    var secDiff = hourDiff / 1000; //in s
    var minDiff = hourDiff / 60 / 1000; //in minutes
    var hDiff = hourDiff / 3600 / 1000; //in hours
    var humanReadable = {};
    humanReadable.hours = Math.floor(hDiff);
    humanReadable.minutes = minDiff - 60 * humanReadable.hours;
    return humanReadable.hours + ":" + humanReadable.minutes

}

$scope.edit = function (id) {
    $http.get('api/appt/show/' + id).success(function(data){
        $scope.hour = data.hour
        $scope.date1 = data.date1
        $scope.status = data.status
        $scope.apptstatus = data.apptstatus
        $scope.pat_id = data.pat_id
        $scope.cln_id = data.cln_id
        $scope.doc_id = data.doc_id
        $scope.srvs = angular.fromJson(data.srvs)
        $scope.inv_total = data.inv_total
        $scope.inv_discountnsba = data.inv_discountnsba
        $scope.inv_discountvalue = data.inv_discountvalue
        $scope.net_price = data.net_price
        $scope.apptid = id
    })
}

$scope.newappt = function (st,item) {
    $scope.restfirst()
    $scope.anewappt = true
    $scope.hour = item.appt
    $scope.perid = item.perid
    $scope.status = st
    $scope.date1 = $scope.datesel
    $scope.cln_id  = $scope.clnid
    $scope.doc_id = $scope.docid
    
}
$scope.checkpatbooking = function (patid){
    // Here we`ll check if the pat have ref or not 
    // if there ref then add refvalue not >> add kshf value
    $scope.srvs = []
    var dateNow = new Date()
    var mnt = 0
    mnt = parseInt(dateNow.getMonth())  + parseInt(1)

    var dateToday = dateNow.getFullYear() + '-' + mnt + '-' + dateNow.getDate()

    $http.get('api/apptbypat/' + $scope.clnid + '/' + $scope.docid  +'/' + patid).success(function(data){
        $scope.tmppatappt = data
        if ($scope.tmppatappt.length !== 0) {
            var difday = ($scope.getdiffDay(data[0]['date1'],dateToday))

            if (difday <= $scope.cln_refday) {
                $scope.srvs.push({svname : 'مراجعة',svqty : 1,snfprice:$scope.cln_refvalue,snftotal : $scope.cln_refvalue * 1})
            }else{
                $scope.srvs.push({svname : 'كشف جديد',svqty : 1,snfprice:$scope.kshf_value,snftotal : $scope.kshf_value * 1})
                
            }
        }else{
            $scope.srvs.push({svname : 'كشف جديد',svqty : 1,snfprice:$scope.kshf_value,snftotal : $scope.kshf_value * 1})
            
        }
        
        $scope.gettotalprice()
    })


   

}


$scope.add = function() {
    
    $scope.loading = true;
    var apiUrl = ""
    if ($scope.apptid) {
        apiUrl = "api/appt/" + $scope.apptid;
    }else{
        apiUrl = "api/appt"
    }
  

    $http.post(apiUrl, {
    hour: $scope.hour,
    date1: $scope.date1,
    status : 'كشف جديد',
    apptstatus : $scope.status,
    pat_id : $scope.pat_id,
    cln_id : $scope.cln_id,
    doc_id : $scope.doc_id,
    perid : $scope.perid,
    srvs : angular.toJson($scope.srvs),
    inv_total : $scope.inv_total,
    inv_discountnsba : $scope.inv_discountnsba,
    inv_discountvalue : $scope.inv_discountvalue,
    net_price :$scope.net_price,
    bankid : $scope.bankid,
    branch : $scope.branch,
    user_created :  $scope.userid
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
         
         $scope.hour = ''
         $scope.date1 = ''
         $scope.status = ''
         $scope.apptstatus = ''
         $scope.pat_id = ''
         $scope.cln_id = ''
         $scope.doc_id = ''
         $scope.srvs = []
         $scope.inv_total = ''
         $scope.inv_discountnsba = ''
         $scope.inv_discountvalue = ''
         $scope.net_price = ''
         $scope.anewappt = false
         $scope.getbooking()
         $('#myTab li:eq(0) a').tab('show')
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
    
    

    $scope.srvs = [];
    $scope.dcsvs= []

    $scope.addsv = function () {
      
        $scope.dcsvs.push({sv_group : $scope.sv_group,sv_name : $scope.sv_name,sv_price:$scope.sv_price,sv_qty : $scope.sv_qty})
        $scope.sv_group = ''
        $scope.sv_name = ''
        $scope.sv_price = ''
        $scope.sv_qty = ''
        $scope.gettotaldocinv()
       
    }

    $scope.gettotaldocinv = function()
    {
        var totalprice = 0
        for (let index = 0; index < $scope.dcsvs.length; index++) {
            const element = $scope.dcsvs[index];
            totalprice += element.sv_price * element.sv_qty
        }
        $scope.totalinvPrice = totalprice
        $scope.discount_dc = 0
        $scope.dc_netprice = totalprice
    }

    $scope.deletesv = function (item) {
      
        var index = ($scope.dcsvs.indexOf(item))
        $scope.dcsvs.splice(index)
        $scope.gettotaldocinv()
    }


    $scope.addsnf =  function () {
       

        $scope.srvs.push({svname : $scope.snftmp,svqty : $scope.snfqty,snfprice:100,snftotal : 100 * $scope.snfqty})

       $scope.gettotalprice()
    }

    $scope.gettotalprice =  function () {
        var totalprice = 0;
        for (let index = 0; index < $scope.srvs.length; index++) {
            const element = $scope.srvs[index];
            totalprice += element.snftotal;
            console.log(totalprice)
        }
        $scope.inv_discountnsba = 0
        $scope.inv_discountvalue = 0
        $scope.inv_total = totalprice;
        $scope.net_price = totalprice
    }

    $scope.deletesnf = function (item) {
        var index = $scope.srvs.indexOf(item)   
        $scope.srvs.splice(index)
    }

    $scope.getbooking = function () {
        var d = new Date($scope.datesel)
        var mnt = 0
        mnt = parseInt(d.getMonth())  + parseInt(1) 

        $http.get('api/appt/' + $scope.clnid + '/' + $scope.docid + '/' + d.getFullYear() + '-' + mnt + '-' + d.getDate()).success(function(data){
        $scope.perBooked = data
        $scope.getclnper($scope.clnid);
        $scope.getNofty()
      
        })
    }

    $scope.getbooking4doctor  = function () {
        var d = new Date($scope.todaydate)
        var mnt = 0
        mnt = parseInt(d.getMonth())  + parseInt(1) 

        $http.get('api/appt/' + $scope.clnid + '/' + $scope.userid + '/' + d.getFullYear() + '-' + mnt + '-' + d.getDate()).success(function(data){
        $scope.perBooked = data
        console.log($scope.perBooked)
        })
    }

$scope.fillPatInfo = function (patid) {

    for (let index = 0; index < $scope.pats.length; index++) {

        const item = $scope.pats[index];
        console.log(item.id,patid)
        if (item.id == patid) {
            console.log('tre',item.Fnum)
            $scope.patFile = item.Fnum
            $scope.patnameEn = item.en_fname + ' ' + item.en_lname
            $scope.patphone = item.phone1
            $scope.pathone2 = item.phone2
            $scope.patfax = item.fax
            $scope.patemail = item.email
            $scope.pataddress = item.address
            $scope.patnat = item.nat
            $scope.patmetrial = item.metrial_st
            $scope.patsex = item.gendre
            $scope.idf_type = item.idf_type
            $scope.idf_num = item.idf_num
            $scope.patmore = item.more
            $scope.patname = item.ar_fname + ' ' + item.ar_lname
            console.log($scope.patFile)
            break
        }

    }



}

    $scope.getTotalAvaliable = function () {
    var totalav = 0
    var totalbooked = 0
    var totalout = 0
    var totalin = 0

     for (let index = 0; index < $scope.perArr.length; index++) {
         const element = $scope.perArr[index];
         
         if (element.status === 'متاح'){
             totalav += 1

         }else if (element.apptstatus){

             if (element.apptstatus.includes("حجز")){
                totalbooked +=1
             }

             if (element.apptstatus.includes("خارج")){
                totalout +=1
             }
           
             if (element.apptstatus.includes("داخل")){
                totalin +=1
             }

           }  

        }
      
           
         
           
     
     
     $scope.avacount = totalav
     $scope.bookedCount = totalbooked
     $scope.outConut = totalout  
     $scope.inCount = totalin
    }

    $scope.restfirst = function () {
        $scope.hour = ''
        $scope.date1 = ''
        $scope.status = ''
        $scope.apptstatus = ''
        $scope.pat_id = ''
        $scope.cln_id = ''
        $scope.doc_id = ''
        $scope.srvs = []
        $scope.inv_total = ''
        $scope.inv_discountnsba = ''
        $scope.inv_discountvalue = ''
        $scope.net_price = ''
        $scope.anewappt = false
    }
    $scope.deletebooked =  function (id) {

            $http.delete('api/appt/'+id).success(function(data, status, headers, config) {
        
                    $scope.getbooking();
        
        
                });
 

    }
    
    $scope.openpatvist = function (item) {
        $scope.patdiv = true
        
        $scope.patsel = $scope.getPatinfo(item.pat_id,'name')
       
    }
    
    $scope.openpat = function (item) {
        $scope.patopened = true
        $scope.opatname = $scope.getPatinfo(item.pat_id,'name')
        $scope.patfile = $scope.getPatinfo(item.pat_id,'funm')
        $scope.pat_id = item.pat_id
        $scope.apptid = item.id
        var d = new Date(); // for now
     var hh = d.getHours(); // => 9
     var mm = d.getMinutes(); // =>  30
     var ss = d.getSeconds(); // => 51
     $scope.enterat = hh + ':' + mm + ':' + ss

     $http.get('api/apptChangeST/' + item.id + '/داخل العيادة/' + $scope.todaydate + ' ' + $scope.enterat + '/IN').success(function(data){
        
        })

    }

    $scope.endVist = function () {



        var apiUrl = ""
        if ($scope.apptid) {
            apiUrl = "api/Pvist/" + $scope.apptid;
        }else{
            apiUrl = "api/Pvist"
        }
      
    
        $http.post(apiUrl, {
        pat_id: $scope.pat_id,
        invoice_items : angular.toJson($scope.dcsvs),
        Total :     $scope.totalinvPrice,
        net_price : $scope.dc_netprice,
        cln_id : $scope.clnid,
        doc_id : $scope.doc_id
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
             
             var d = new Date(); // for now
             var hh = d.getHours(); // => 9
             var mm = d.getMinutes(); // =>  30
             var ss = d.getSeconds(); // => 51
             $scope.outat = hh + ':' + mm + ':' + ss


     $http.get('api/apptChangeST/' + $scope.apptid + '/خارج العيادة/' + $scope.todaydate + ' ' + $scope.outat + '/OUT').success(function(data){
        
        })

             $scope.pat_id = ""
             $scope.dcsvs = []
             $scope.totalinvPrice = 0
             $scope.dc_netprice = 0
             $('#myTab li:eq(0) a').tab('show')

        }).error(function (error) {
            swal({
                title: "خطأ",
                text: "لم تتم العملية يرجى مراجعة البيانات",
                type: "error",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "موافق"
                }, 
                function(){ 
                
             });
        });

        


    }

    $scope.getNofty = function () {


        $http.get('api/Pvist/cln=' + $scope.clnid).success(function(data){
            $scope.nofties = data
            })

        $interval(function() {
            $http.get('api/Pvist/cln=' + $scope.clnid).success(function(data){
                $scope.nofties = data
                })
        }
          
            , 15000);  

      

    }

    $scope.refreshNofty =  function () {
        $http.get('api/Pvist/cln=' + $scope.clnid).success(function(data){
            $scope.nofties = data
            })
    }

    $scope.sdatatoanother = function (item) 
    {
        $scope.pay_doc = $scope.getDocname(item.doc_id)
        $scope.pay_pat = $scope.getPatinfo(item.pat_id,'name')
        $scope.pay_patid = item.pat_id
        $scope.paySrvs = angular.fromJson(item.invoice_items)
        $scope.pay_netprice = item.net_price
        $scope.invQid = item.id 
        $scope.paycln = item.cln_id  
        $scope.paydocid = item.doc_id
    }

    $scope.addMoney = function () {
      
        $http.post('api/money', {
            kind:'قبض',
            invid : $scope.invQid,
            price : $scope.pay_netprice,
            net_price : $scope.pay_netprice,
            user_created : $scope.userid,
            pat_id : $scope.pay_patid,
            branch : $scope.branch,
            cln_id : $scope.paycln,
            doc_id : $scope.paydocid,
            bankid : $scope.bankid
            
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
                 
                 $scope.updatePatVistInv()
                 
            
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


    }

    $scope.updatePatVistInv = function () 
    {
        
        $http.get('api/Pvist/updatest=' + $scope.invQid).success(function(data){
            
            $scope.refreshNofty()

            })


    }

//End cTrl
})


