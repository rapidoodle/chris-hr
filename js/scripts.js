// * Start Bootstrap - Simple Sidebar v6.0.3 (https://startbootstrap.com/template/simple-sidebar)
// * Copyright 2013-2021 Start Bootstrap
// * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {
    //loading script
    $('body').IncipitInit({
        icon : "solid-snake",
        note : true,
        noteCustom: "Please wait..",
        logo : false,
        logoSrc :'img/logo_sm.png',
        material: false,
        quote: false
    });


    activeLink = $("div#sidebar a.active").attr("href");
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    //employee list datatables
    $('#table-employees').DataTable( {
        "order": [[ 0, "desc" ]],
        bLengthChange: false,
        bFilter: false,
        responsive: true
    });

    //employee list TR link
    $('#table-employees').on('click', 'tbody > tr', function ()
    {
        var link = $(this).attr("data-link");
        // 'this' refers to the current <tr>
        window.open(link);
    });

    //set active tab onload
    $("div#sidebar a[href='"+localStorage.getItem('activeLink')+"']").addClass("active");

    //set active link onclick
    $("div#sidebar a.list-group-item").click(function(){
        var clickedLink = $(this).attr("href");
        setActiveLink($(this), clickedLink);

    });

    //employee details previous and next
    var sections = $("div#forms-controller section");
    $("div#forms-controller section").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $("#next-step").click(function(){
        $.Incipit('show');
        var activePos = $("div#forms-controller section:visible").attr("data-position");
        var formObj = new Object;
        var eID = $("#EmployeeID").val();
        var table = $("div#forms-controller section:visible").attr("data-table");

        //save record each step
        var form = '#form-employee-'+activePos;

        //send the formobject to the backend
        updateEmployee(table, form, eID);

        //this is for the few employee details in educational details section
        if(activePos == 2){
            console.log("Heas");
            updateEmployee("Employees", $("#form-employee-2half"), eID, false);
        }

        return false;
    });

    $("#previous-step").click(function(){

        $.Incipit('show');
        $("#next-step").attr("disabled", false);

        if ($("div#forms-controller section:visible").prev().length != 0)
            $("div#forms-controller section:visible").prev().show().next().hide();
        else {
            $("div#forms-controller section:visible").hide();
            $("div#forms-controller section:last").show();
        }

        if(!$("div#forms-controller section:visible").prev().attr("data-position")){
            $(this).attr("disabled", true);
        }else{
            
        }

        //hide the loading screen
        $.Incipit('hide');


        return false;
    });
    //end of employee details previous and next

    //add employment history
    $("#add-emphistory").click(function(){
        var html = '<tr>'+
                        '<td>'+
                            '<input type="text" name="EmployerName[]" class="form-control">'+
                            '<input type="hidden" name="EmployeeEmploymentHistoryID[]" class="form-control">'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" name="EmployerAddress[]" class="form-control">'+
                        '</td>'+
                        '<td><input type="text" name="Position[]" class="form-control"></td>'+
                        '<td><input type="date" name="EmploymentFrom[]" class="form-control"></td>'+
                        '<td><input type="date" name="EmploymentTo[]" class="form-control"></td>'+
                        '<td>'+
                            '<input type="text" name="Salary[]" class="form-control">'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" name="ReasonForLeaving[]" class="form-control">'+
                        '</td>'+
                    '</tr>';

        $("#tbl-emphistory").append(html);
    });




    //supporting methods
    function setActiveLink(e, link){
        localStorage.setItem('activeLink', link);
        $("div#sidebar a.list-group-item").removeClass("active");
        e.addClass("active");
    }

    function updateEmployee(table, form, eID, next = true){

                if(next){
                    //set previous and next buttons behavior
                    $("#previous-step").attr("disabled", false);

                    if ($("div#forms-controller section:visible").next().length != 0)
                        $("div#forms-controller section:visible").next().show().prev().hide();
                    else {
                        $("div#forms-controller section:visible").hide();
                        $("div#forms-controller section:first").show();
                        $("div#forms-controller section:first").show();
                    }

                    if(!$("div#forms-controller section:visible").next().attr("data-position")){
                        $(this).attr("disabled", true);
                    }else{
                        $(this).attr("disabled", false);
                    }

                    //hide the loading screen
                    $.Incipit('hide');
                }
        //send the formobject to the backend
        // $.ajax({url: "core/save-employee.php",
        //     type: "POST",
        //     dataType: 'json',
        //     data: $(form).serialize()+"&submit=update&table="+table+"&eID="+eID,
        //     success: function(result){

        //         if(next){
        //             //set previous and next buttons behavior
        //             $("#previous-step").attr("disabled", false);

        //             if ($("div#forms-controller section:visible").next().length != 0)
        //                 $("div#forms-controller section:visible").next().show().prev().hide();
        //             else {
        //                 $("div#forms-controller section:visible").hide();
        //                 $("div#forms-controller section:first").show();
        //                 $("div#forms-controller section:first").show();
        //             }

        //             if(!$("div#forms-controller section:visible").next().attr("data-position")){
        //                 $(this).attr("disabled", true);
        //             }else{
        //                 $(this).attr("disabled", false);
        //             }

        //             //hide the loading screen
        //             $.Incipit('hide');
        //         }
        // }});        
    }
});
