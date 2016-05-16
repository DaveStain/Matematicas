$(document).ready(function(){
    var url ="validations.php";
    $("#modificar").hide();    
    $("#nueva").hide();
    $("#Asesores").hide();                          
    $("#E1").hide();
    $("#E2").hide();
    $("#E3").hide();
    $("#E4").hide();
    $("#E5").hide();
	$("#Escuela").change(function () {
       $.ajax({
        url: url,
        type: "get",
        data: {id: this.value},
        success: function(response) {
            var regs = eval(response);            
            if (regs[0]!=null){
                $("#modificar").show(); 
                $("#AsesoresIni").hide();   
                $("#nueva").hide();               
                $("#EquiposIni").hide();   
                $("#end").hide();                
                $("#Asesores").hide();                
                $("#E1").hide();
                $("#E2").hide();
                $("#E3").hide(); 

                $("#Asesor1").val(regs[0]["Nombre"]);
                $("#Asesor2").val(regs[3]["Nombre"]);
                $("#Asesor3").val(regs[6]["Nombre"]);
                $("#Asesor4").val(regs[9]["Nombre"]);
                $("#E1Integrante1").val(regs[0]["Integrante1"]);
                $("#E1Integrante2").val(regs[0]["Integrante2"]);
                $("#E1Integrante3").val(regs[0]["Integrante3"]);
                $("#E2Integrante1").val(regs[1]["Integrante1"]);
                $("#E2Integrante2").val(regs[1]["Integrante2"]);
                $("#E2Integrante3").val(regs[1]["Integrante3"]);
                $("#E3Integrante1").val(regs[2]["Integrante1"]);
                $("#E3Integrante2").val(regs[2]["Integrante2"]);
                $("#E3Integrante3").val(regs[2]["Integrante3"]); 
            }  
            else{              
                $("#modificar").hide(); 
                $("#AsesoresIni").show();                  
                $("#EquiposIni").show();   
                $("#end").show();
                $("#nueva").hide();

                $("#Asesor1").val("");
                $("#Asesor2").val("");
                $("#Asesor3").val("");
                $("#Asesor4").val("");
                $("#E1Integrante1").val("");
                $("#E1Integrante2").val("");
                $("#E1Integrante3").val("");
                $("#E2Integrante1").val("");
                $("#E2Integrante2").val("");
                $("#E2Integrante3").val("");
                $("#E3Integrante1").val("");
                $("#E3Integrante2").val("");
                $("#E3Integrante3").val(""); 
            }       
        }
    });        
    });

    $("#Validar").click(function () {
       $.ajax({
        url: url,
        type: "get",
        data: {pass: $("#Password").val()},
        success: function(response) {
            var regs = eval(response);                   
            if (regs[0]!=null){                
                $("#modificar").hide(); 
                $("#AsesoresIni").hide();                  
                $("#EquiposIni").hide();   
                $("#errorc").html("");
                $("#end").show();                   
                $("#Asesores").show();
                $("#E1").show();
                $("#E2").show();
                $("#E3").show(); 
            }  
            else{
                $("#end").hide();
                $("#Asesores").hide();
                $("#E1").hide();
                $("#E2").hide();
                $("#E3").hide(); 
                $("#errorc").html("<span class='info' style='color:#cc0000'>Error:</span> <span class='info'> Esa contraseña no es correcta.</span>");
            }       
        }
    });        
    });   

    $("#Equipo").change(function () {
       $.ajax({
        url: url,
        type: "get",
        data: {equipo: this.value},
        success: function(response) {
            var regs = eval(response); 
                      
            if (regs[0] != null){   

                $("#Pregunta1").val(regs[0]["Respuesta"]);
                if(regs[0]["Penalizada"] == 1)
                    $("#chck1").attr("checked",true);
                else
                    $("#chck1").attr("checked",false);
                
                $("#Pregunta2").val(regs[1]["Respuesta"]);  
                if(regs[1]["Penalizada"] == 1)
                    $("#chck2").attr("checked",true);
                else
                    $("#chck2").attr("checked",false);                   
                $("#Pregunta3").val(regs[2]["Respuesta"]);
                if(regs[2]["Penalizada"] == 1)
                    $("#chck3").attr("checked",true);
                else
                    $("#chck3").attr("checked",false);
                $("#Pregunta4").val(regs[3]["Respuesta"]); 
                if(regs[3]["Penalizada"] == 1)
                    $("#chck4").attr("checked",true);
                else
                    $("#chck4").attr("checked",false);              
                $("#Pregunta5").val(regs[4]["Respuesta"]);
                if(regs[4]["Penalizada"] == 1)
                    $("#chck5").attr("checked",true);
                else
                    $("#chck5").attr("checked",false);                 
                $("#Pregunta6").val(regs[5]["Respuesta"]); 
                if(regs[5]["Penalizada"] == 1)
                    $("#chck6").attr("checked",true);
                else
                    $("#chck6").attr("checked",false);                
                $("#Pregunta7").val(regs[6]["Respuesta"]); 
                if(regs[6]["Penalizada"] == 1)
                    $("#chck7").attr("checked",true);
                else
                    $("#chck7").attr("checked",false);                
                $("#Pregunta8").val(regs[7]["Respuesta"]);
                if(regs[7]["Penalizada"] == 1)
                    $("#chck8").attr("checked",true);
                else
                    $("#chck8").attr("checked",false);                
                $("#Pregunta9").val(regs[8]["Respuesta"]);
                if(regs[8]["Penalizada"] == 1)
                    $("#chck9").attr("checked",true);
                else
                    $("#chck9").attr("checked",false);                
                $("#Pregunta10").val(regs[9]["Respuesta"]); 
                if(regs[9]["Penalizada"] == 1)
                    $("#chck10").attr("checked",true);
                else
                    $("#chck10").attr("checked",false);               
                $("#Pregunta11").val(regs[10]["Respuesta"]);
                if(regs[10]["Penalizada"] == 1)
                    $("#chck11").attr("checked",true);
                else
                    $("#chck11").attr("checked",false);                 
                $("#Pregunta12").val(regs[11]["Respuesta"]);
                if(regs[11]["Penalizada"] == 1)
                    $("#chck12").attr("checked",true);
                else
                    $("#chck12").attr("checked",false);                 
                $("#Pregunta13").val(regs[12]["Respuesta"]);  
                if(regs[12]["Penalizada"] == 1)
                    $("#chck13").attr("checked",true);
                else
                    $("#chck13").attr("checked",false);               
                $("#Pregunta14").val(regs[13]["Respuesta"]);
                if(regs[13]["Penalizada"] == 1)
                    $("#chck14").attr("checked",true);
                else
                    $("#chck14").attr("checked",false);                 
                $("#Pregunta15").val(regs[14]["Respuesta"]); 
                if(regs[14]["Penalizada"] == 1)
                    $("#chck15").attr("checked",true);
                else
                    $("#chck15").attr("checked",false);                
                $("#Pregunta16").val(regs[15]["Respuesta"]); 
                if(regs[15]["Penalizada"] == 1)
                    $("#chck16").attr("checked",true);
                else
                    $("#chck16").attr("checked",false);                
                $("#Pregunta17").val(regs[16]["Respuesta"]);
                if(regs[16]["Penalizada"] == 1)
                    $("#chck17").attr("checked",true);
                else
                    $("#chck17").attr("checked",false);
                $("#Pregunta18").val(regs[17]["Respuesta"]);
                if(regs[17]["Penalizada"] == 1)
                    $("#chck18").attr("checked",true);
                else
                    $("#chck18").attr("checked",false);                 
                $("#Pregunta19").val(regs[18]["Respuesta"]);
                if(regs[18]["Penalizada"] == 1)
                    $("#chck19").attr("checked",true);
                else
                    $("#chck19").attr("checked",false); 
                $("#Pregunta20").val(regs[19]["Respuesta"]); 
                if(regs[19]["Penalizada"] == 1)
                    $("#chck20").attr("checked",true);
                else
                    $("#chck20").attr("checked",false);                
                $("#Pregunta21").val(regs[20]["Respuesta"]); 
                if(regs[20]["Penalizada"] == 1)
                    $("#chck21").attr("checked",true);
                else
                    $("#chck21").attr("checked",false);
                $("#Pregunta22").val(regs[21]["Respuesta"]); 
                if(regs[21]["Penalizada"] == 1)
                    $("#chck22").attr("checked",true);
                else
                    $("#chck22").attr("checked",false);                
                $("#Pregunta23").val(regs[22]["Respuesta"]); 
                if(regs[22]["Penalizada"] == 1)
                    $("#chck23").attr("checked",true);
                else
                    $("#chck23").attr("checked",false);               
                $("#Pregunta24").val(regs[23]["Respuesta"]);  
                if(regs[23]["Penalizada"] == 1)
                    $("#chck24").attr("checked",true);
                else
                    $("#chck24").attr("checked",false);               
                $("#Pregunta25").val(regs[24]["Respuesta"]);  
                if(regs[24]["Penalizada"] == 1)
                    $("#chck25").attr("checked",true);
                else
                    $("#chck25").attr("checked",false);               
                $("#Pregunta26").val(regs[25]["Respuesta"]);
                if(regs[25]["Penalizada"] == 1)
                    $("#chck26").attr("checked",true);
                else
                    $("#chck26").attr("checked",false);                 
                $("#Pregunta27").val(regs[26]["Respuesta"]);
                if(regs[26]["Penalizada"] == 1)
                    $("#chck27").attr("checked",true);
                else
                    $("#chck27").attr("checked",false);                 
                $("#Pregunta28").val(regs[27]["Respuesta"]);                 
                if(regs[27]["Penalizada"] == 1)
                    $("#chck28").attr("checked",true);
                else
                    $("#chck28").attr("checked",false);                
                $("#Pregunta29").val(regs[28]["Respuesta"]);  
                if(regs[28]["Penalizada"] == 1)
                    $("#chck29").attr("checked",true);
                else
                    $("#chck29").attr("checked",false);               
                $("#Pregunta30").val(regs[29]["Respuesta"]);   
                if(regs[29]["Penalizada"] == 1)
                    $("#chck30").attr("checked",true);
                else
                    $("#chck30").attr("checked",false);             

            }
            else{
                $("#Pregunta1").val("");
                $("#chck1").attr("checked",false);
                $("#Pregunta2").val("");                
                $("#chck2").attr("checked",false);
                $("#Pregunta3").val("");
                $("#chck3").attr("checked",false);
                $("#Pregunta4").val("");
                $("#chck4").attr("checked",false);
                $("#Pregunta5").val("");
                $("#chck5").attr("checked",false);
                $("#Pregunta6").val("");
                $("#chck6").attr("checked",false);
                $("#Pregunta7").val("");
                $("#chck7").attr("checked",false);
                $("#Pregunta8").val("");
                $("#chck8").attr("checked",false);
                $("#Pregunta9").val("");
                $("#chck9").attr("checked",false);
                $("#Pregunta10").val("");
                $("#chck10").attr("checked",false);
                $("#Pregunta11").val(""); 
                $("#chck11").attr("checked",false);
                $("#Pregunta12").val(""); 
                $("#chck12").attr("checked",false);
                $("#Pregunta13").val(""); 
                $("#chck13").attr("checked",false);
                $("#Pregunta14").val(""); 
                $("#chck14").attr("checked",false);
                $("#Pregunta15").val(""); 
                $("#chck15").attr("checked",false);
                $("#Pregunta16").val(""); 
                $("#chck16").attr("checked",false);
                $("#Pregunta17").val(""); 
                $("#chck17").attr("checked",false);
                $("#Pregunta18").val(""); 
                $("#chck18").attr("checked",false);
                $("#Pregunta19").val(""); 
                $("#chck19").attr("checked",false);
                $("#Pregunta20").val(""); 
                $("#chck20").attr("checked",false);
                $("#Pregunta21").val(""); 
                $("#chck21").attr("checked",false);
                $("#Pregunta22").val(""); 
                $("#chck22").attr("checked",false);
                $("#Pregunta23").val(""); 
                $("#chck23").attr("checked",false);
                $("#Pregunta24").val(""); 
                $("#chck24").attr("checked",false);
                $("#Pregunta25").val(""); 
                $("#chck25").attr("checked",false);
                $("#Pregunta26").val(""); 
                $("#chck26").attr("checked",false);
                $("#Pregunta27").val(""); 
                $("#chck27").attr("checked",false);
                $("#Pregunta28").val(""); 
                $("#chck28").attr("checked",false);
                $("#Pregunta29").val(""); 
                $("#chck29").attr("checked",false);
                $("#Pregunta30").val("");  
                $("#chck30").attr("checked",false);
            }        
        }
    });        
    });

   $("#Iniciar").click(function()
    {
        var username=$("#user").val();
        var password=$("#pass1").val();
        var dataString = 'user='+username+'&pass='+password;
    if($.trim(username).length>0 && $.trim(password).length>0)
    {
        $.ajax({
        type: "GET",
        url: "validations.php",
        data: dataString,
        cache: false,
        success: function(data){
            var e = data;
            console.log(data);
            switch(e){
                case "admin": location.href = "index.php?op=menu";
                              break;
                case "error": $('#errorL').html("<span style='color:#cc0000'>Error:</span> La combinación de usuario y contraseña es incorrecta. ");
                              break;
                default: location.href = "index.php?op=respuestas";
                              break;
            }
            
                    
                       
        }
        });

    }
    return false;
    });
    
    $("#regis").bind('click',function() {
        $("#nueva").show();
        $("#end").hide();  
        $("#AsesoresIni").hide();                  
        $("#Asesores").hide();  
        $("#EquiposIni").hide();                  
        $("#E1").hide();
        $("#E2").hide();
        $("#E3").hide();
        $("#E4").hide();
        $("#E5").hide();
    });

    $("#CantAsesores").change(function () {
        var asesores = $("#CantAsesores").val();
        if( asesores > 0){
            $("#Asesores").show();
            $("#Asesor1").hide();
            $("#Asesor2").hide();
            $("#Asesor3").hide();
            $("#Asesor4").hide();
            for(var i=1;i<=asesores;i++){
                $("#Asesor"+i).show();
            }
            
            
        }else{
            $("#Asesores").hide();
        }
    });

	$("#CantEquipo").change(function () {
        var equipos = $("#CantEquipo").val();
        if( equipos > 0){
            for (var i = 1; i <= equipos; i++) {              
               $("#E"+i).show();                 
            }            
        }
        else
        {
            $("#E1").hide();
            $("#E2").hide();
            $("#E3").hide();
            $("#E4").hide();
            $("#E5").hide();
        }
    });
    $('.report').click(function () {
        $.ajax({
        url: url,
        type: "get",
        data: {detalle: this.id},
            success: function(response){
                var res = eval(response);
                if(res != "error"){
                    alert(res);
                }
            }
        });
    });
}); 
