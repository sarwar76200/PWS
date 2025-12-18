/*----------------------------------------
    This is for Brand Name auto complete box
-----------------------------------------*/

$(document).ready(function(){

    /* Autocomplete Textbox */

    $("#brand1").keyup(function(){   //this is normal code         
    var Medicine = $(this).val();
    if(Medicine != ''){
        $.ajax({
            url: "loadMedicine.php",
            method: "POST",
            data: {Drugs : Medicine},
            success: function(data){
            console.log(data);
            $("#MedicineList").fadeIn("fast").html(data);
            }
        }); 
    }else{
        $("#MedicineList").fadeOut();
        $("#tableData").html("");
    }


    
    // this code for when click search box and show suggestion and click outside of the box hide suggestion
    
    // $(document).on('click','#brand1',function(){  
    // var Medicine = $(this).val();

    // $.ajax({
    //     url: "loadMedicine.php",
    //     method: "POST",
    //     data: { Drugs: Medicine},
    //     success: function(data){
    //     console.log(data);
    //     $("#MedicineList").fadeIn("fast").html(data);
    //     }
    // }); 





    $(document).on('click','',function(){
        $("#MedicineList").fadeOut("fast");
        $("#tableData").html("");
    });

});


// Autocomplete List Click Code
$(document).on('click','#MedicineList li',function(){
$('#brand1').val($(this).text());
$("#MedicineList").fadeOut();
});

});
// });



/*-------------------
    This is for Dose auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#dose1',function(){ 
    var Dose = $(this).val();
    $.ajax({
        url: "loadDose.php",
        method: "POST",
        data: { dose: Dose},
        success: function(data){
        console.log(data);
        $("#DoseList").fadeIn("fast").html(data);
        }
    }); 

$(document).on('click','',function(){
    $("#DoseList").fadeOut("fast");
    $("#tableData").html("");
    });

});
// Autocomplete List Click Code
$(document).on('click','#DoseList li',function(){
$('#dose1').val($(this).text());
$("#DoseList").fadeOut();
});
});




/*-------------------
    This is for instruction auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#instruction1',function(){ 
    var Instruction = $(this).val();
    $.ajax({
        url: "loadInstruction.php",
        method: "POST",
        data: { instruction11: Instruction},
        success: function(data){
        console.log(data);
        $("#InstructionList").fadeIn("fast").html(data);
        }
    }); 

$(document).on('click','',function(){
    $("#InstructionList").fadeOut("fast");
    $("#tableData").html("");
    });

});
// Autocomplete List Click Code
$(document).on('click','#InstructionList li',function(){
$('#instruction1').val($(this).text());
$("#InstructionList").fadeOut();
});
});



/*-------------------
    This is for Duration auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#duration1',function(){ 
    var Duration = $(this).val();
    $.ajax({
        url: "loadDuration.php",
        method: "POST",
        data: { duration11: Duration},
        success: function(data){
        console.log(data);
        $("#DurationList").fadeIn("fast").html(data);
        }
    }); 

$(document).on('click','',function(){
    $("#DurationList").fadeOut("fast");
    $("#tableData").html("");
    });

});
// Autocomplete List Click Code
$(document).on('click','#DurationList li',function(){
$('#duration1').val($(this).text());
$("#DurationList").fadeOut();
});
});











/*----------------------------------------
    This is for Brand Name 2 auto complete box
-----------------------------------------*/

$(document).ready(function(){
    /* Autocomplete Textbox */
        $("#brand2").keyup(function(){   //this is normal code         
        var Medicine = $(this).val();
        if(Medicine != ''){
            $.ajax({
                url: "loadMedicine.php",
                method: "POST",
                data: {Drugs : Medicine},
                success: function(data){
                console.log(data);
                $("#MedicineList2").fadeIn("fast").html(data);
                }
            }); 
        }else{
            $("#MedicineList2").fadeOut();
            $("#tableData").html("");
        }

        $(document).on('click','',function(){
            $("#MedicineList2").fadeOut("fast");
            $("#tableData").html("");
        });
    });

    // Autocomplete List Click Code
    $(document).on('click','#MedicineList2 li',function(){
        $('#brand2').val($(this).text());
        $("#MedicineList2").fadeOut();
    });

});


/*-------------------
    This is for Dose 2 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#dose2',function(){ 
    var Dose = $(this).val();
    $.ajax({
        url: "loadDose.php",
        method: "POST",
        data: { dose: Dose},
        success: function(data){
        console.log(data);
        $("#DoseList2").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#DoseList2").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DoseList2 li',function(){
        $('#dose2').val($(this).text());
        $("#DoseList2").fadeOut();
    });
});



/*-------------------
    This is for instruction 2 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#instruction2',function(){ 
    var Instruction = $(this).val();
    $.ajax({
        url: "loadInstruction.php",
        method: "POST",
        data: { instruction11: Instruction},
        success: function(data){
        console.log(data);
        $("#InstructionList2").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#InstructionList2").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#InstructionList2 li',function(){
        $('#instruction2').val($(this).text());
        $("#InstructionList2").fadeOut();
    });
});



/*-------------------
    This is for Duration 2 auto complete box
-------------------*/
$(document).ready(function(){
    /* Autocomplete Textbox */
    $(document).on('click','#duration2',function(){ 
        var Duration = $(this).val();
        $.ajax({
            url: "loadDuration.php",
            method: "POST",
            data: { duration11: Duration},
            success: function(data){
            console.log(data);
            $("#DurationList2").fadeIn("fast").html(data);
            }
        }); 

        $(document).on('click','',function(){
            $("#DurationList2").fadeOut("fast");
            $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DurationList2 li',function(){
        $('#duration2').val($(this).text());
        $("#DurationList2").fadeOut();
    });
});












/*----------------------------------------
    This is for Brand Name 3 auto complete box
-----------------------------------------*/

$(document).ready(function(){
    /* Autocomplete Textbox */
        $("#brand3").keyup(function(){   //this is normal code         
        var Medicine = $(this).val();
        if(Medicine != ''){
            $.ajax({
                url: "loadMedicine.php",
                method: "POST",
                data: {Drugs : Medicine},
                success: function(data){
                console.log(data);
                $("#MedicineList3").fadeIn("fast").html(data);
                }
            });3
        }else{
            $("#MedicineList3").fadeOut();
            $("#tableData").html("");
        }

        $(document).on('click','',function(){
            $("#MedicineList3").fadeOut("fast");
            $("#tableData").html("");
        });
    });

    // Autocomplete List Click Code
    $(document).on('click','#MedicineList3 li',function(){
        $('#brand3').val($(this).text());
        $("#MedicineList3").fadeOut();
    });

});


/*-------------------
    This is for Dose 3 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#dose3',function(){ 
    var Dose = $(this).val();
    $.ajax({
        url: "loadDose.php",
        method: "POST",
        data: { dose: Dose},
        success: function(data){
        console.log(data);
        $("#DoseList3").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#DoseList3").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DoseList3 li',function(){
        $('#dose3').val($(this).text());
        $("#DoseList3").fadeOut();
    });
});



/*-------------------
    This is for instruction 3 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#instruction3',function(){ 
    var Instruction = $(this).val();
    $.ajax({
        url: "loadInstruction.php",
        method: "POST",
        data: { instruction11: Instruction},
        success: function(data){
        console.log(data);
        $("#InstructionList3").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#InstructionList3").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#InstructionList3 li',function(){
        $('#instruction3').val($(this).text());
        $("#InstructionList3").fadeOut();
    });
});



/*-------------------
    This is for Duration 3 auto complete box
-------------------*/
$(document).ready(function(){
    /* Autocomplete Textbox */
    $(document).on('click','#duration3',function(){ 
        var Duration = $(this).val();
        $.ajax({
            url: "loadDuration.php",
            method: "POST",
            data: { duration11: Duration},
            success: function(data){
            console.log(data);
            $("#DurationList3").fadeIn("fast").html(data);
            }
        }); 

        $(document).on('click','',function(){
            $("#DurationList3").fadeOut("fast");
            $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DurationList3 li',function(){
        $('#duration3').val($(this).text());
        $("#DurationList3").fadeOut();
    });
});












/*----------------------------------------
    This is for Brand Name 4 auto complete box
-----------------------------------------*/

$(document).ready(function(){
    /* Autocomplete Textbox */
        $("#brand4").keyup(function(){   //this is normal code         
        var Medicine = $(this).val();
        if(Medicine != ''){
            $.ajax({
                url: "loadMedicine.php",
                method: "POST",
                data: {Drugs : Medicine},
                success: function(data){
                console.log(data);
                $("#MedicineList4").fadeIn("fast").html(data);
                }
            });3
        }else{
            $("#MedicineList4").fadeOut();
            $("#tableData").html("");
        }

        $(document).on('click','',function(){
            $("#MedicineList4").fadeOut("fast");
            $("#tableData").html("");
        });
    });

    // Autocomplete List Click Code
    $(document).on('click','#MedicineList4 li',function(){
        $('#brand4').val($(this).text());
        $("#MedicineList4").fadeOut();
    });

});


/*-------------------
    This is for Dose 4 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#dose4',function(){ 
    var Dose = $(this).val();
    $.ajax({
        url: "loadDose.php",
        method: "POST",
        data: { dose: Dose},
        success: function(data){
        console.log(data);
        $("#DoseList4").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#DoseList4").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DoseList4 li',function(){
        $('#dose4').val($(this).text());
        $("#DoseList4").fadeOut();
    });
});



/*-------------------
    This is for instruction 4 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#instruction4',function(){ 
    var Instruction = $(this).val();
    $.ajax({
        url: "loadInstruction.php",
        method: "POST",
        data: { instruction11: Instruction},
        success: function(data){
        console.log(data);
        $("#InstructionList4").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#InstructionList4").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#InstructionList4 li',function(){
        $('#instruction4').val($(this).text());
        $("#InstructionList4").fadeOut();
    });
});



/*-------------------
    This is for Duration 4 auto complete box
-------------------*/
$(document).ready(function(){
    /* Autocomplete Textbox */
    $(document).on('click','#duration4',function(){ 
        var Duration = $(this).val();
        $.ajax({
            url: "loadDuration.php",
            method: "POST",
            data: { duration11: Duration},
            success: function(data){
            console.log(data);
            $("#DurationList4").fadeIn("fast").html(data);
            }
        }); 

        $(document).on('click','',function(){
            $("#DurationList4").fadeOut("fast");
            $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DurationList4 li',function(){
        $('#duration4').val($(this).text());
        $("#DurationList4").fadeOut();
    });
});





















/*----------------------------------------
    This is for Brand Name 5 auto complete box
-----------------------------------------*/

$(document).ready(function(){
    /* Autocomplete Textbox */
        $("#brand5").keyup(function(){   //this is normal code         
        var Medicine = $(this).val();
        if(Medicine != ''){
            $.ajax({
                url: "loadMedicine.php",
                method: "POST",
                data: {Drugs : Medicine},
                success: function(data){
                console.log(data);
                $("#MedicineList5").fadeIn("fast").html(data);
                }
            });3
        }else{
            $("#MedicineList5").fadeOut();
            $("#tableData").html("");
        }

        $(document).on('click','',function(){
            $("#MedicineList5").fadeOut("fast");
            $("#tableData").html("");
        });
    });

    // Autocomplete List Click Code
    $(document).on('click','#MedicineList5 li',function(){
        $('#brand5').val($(this).text());
        $("#MedicineList5").fadeOut();
    });

});


/*-------------------
    This is for Dose 5 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#dose5',function(){ 
    var Dose = $(this).val();
    $.ajax({
        url: "loadDose.php",
        method: "POST",
        data: { dose: Dose},
        success: function(data){
        console.log(data);
        $("#DoseList5").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#DoseList5").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DoseList5 li',function(){
        $('#dose5').val($(this).text());
        $("#DoseList5").fadeOut();
    });
});



/*-------------------
    This is for instruction 5 auto complete box
-------------------*/
$(document).ready(function(){
/* Autocomplete Textbox */
$(document).on('click','#instruction5',function(){ 
    var Instruction = $(this).val();
    $.ajax({
        url: "loadInstruction.php",
        method: "POST",
        data: { instruction11: Instruction},
        success: function(data){
        console.log(data);
        $("#InstructionList5").fadeIn("fast").html(data);
        }
    }); 

    $(document).on('click','',function(){
        $("#InstructionList5").fadeOut("fast");
        $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#InstructionList5 li',function(){
        $('#instruction5').val($(this).text());
        $("#InstructionList5").fadeOut();
    });
});



/*-------------------
    This is for Duration 5 auto complete box
-------------------*/
$(document).ready(function(){

    /* Autocomplete Textbox */
    $(document).on('click','#duration5',function(){ 

        var Duration = $(this).val();
        $.ajax({
            url: "loadDuration.php",
            method: "POST",
            data: { duration11: Duration},
            success: function(data){
            console.log(data);
            $("#DurationList5").fadeIn("fast").html(data);
            }
        }); 

        $(document).on('click','',function(){
            $("#DurationList5").fadeOut("fast");
            $("#tableData").html("");
        });
    });
    // Autocomplete List Click Code
    $(document).on('click','#DurationList5 li',function(){
        $('#duration5').val($(this).text());
        $("#DurationList5").fadeOut();
    });


    


    



});


$('#addmore').click(function(){

    // Get last id 
    var lastname_id = $('.mainBarTr input[type=text]:nth-child(1)').last().attr('id');
    var split_id = lastname_id.split('_');

    // New index
    var index = Number(split_id[1]) + 1;
    alert (lastname_id);


    // Create row with input elements
    var html = "<tr><td><input type='text' name='no5' class='no' id='no_"+index+"' value='"+index+"'></td><td><input type='text' name='brand5' class='brand' id='brand"+index+"' placeholder='Medicine.........' autocomplete='off'></td><td><input type='text' name='dose5' class='Dose' id='dose"+index+"' placeholder='Dose.........' autocomplete='off'></td><td><input type='text' name='instruction5' class='Instruction' id='instruction"+index+"' placeholder='Instruction.........' autocomplete='off'></td><td><input type='text' name='duration5' class='Duration' id='duration_"+index+"' placeholder='Duration.........' autocomplete='off'></td></tr>";
    //var html = "<tr class='tr_input'><td><input type='text' class='username' id='username_"+index+"' placeholder='Enter username'></td><td><input type='text' class='name' id='name_"+index+"' ></td><td><input type='text' class='age' id='age_"+index+"' ></td><td><input type='text' class='email' id='email_"+index+"' ></td><td><input type='text' class='salary' id='salary_"+index+"' ></td></tr>";


    // Append data
    $('#table_body').append(html);


});
