var app = angular.module('hosjs',['datatables','datatables.buttons']).run(function(DTDefaultOptions){
        // Display 25 items per page by default
        DTDefaultOptions.setDisplayLength(20);
        
    
    

    });

    app.controller('Main',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
    
   

    })        