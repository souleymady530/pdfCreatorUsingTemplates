$(".headerRightTextA").on('keyup',function()
	{
		var textHeaderGauche=$(".headerLeftTextA").val()
		, textHeaderDroite=$(".headerRightTextA").val()
		,textCentral=$(".bodyTextA").val()
		,tab=$(".tabCentrale").val();
		
			$.ajax({
            url: 'ajax/trtModelTextSimple.php',
            type: 'POST',
            data: {
					  'textHeaderDroite':textHeaderDroite ,
					  'textHeaderGauche':textHeaderGauche ,
					  'bodyText':textCentral,
					  'tabulation':tab,
					},
            
            success: function (result)
			{
                if(result=="ok")
					$(".iframeA").attr("src",function(){return "pdfGenerer/ModeleTexteSimple1.pdf";})
            },
            error: function (xhr, status, error) {
              alert("une erreur interne est survenu");
            }
          });
	}
	);
	
	
	
	
	
	
	$(".headerLeftTextA").on('keyup',function()
	{
		var textHeaderGauche=$(".headerLeftTextA").val()
		, textHeaderDroite=$(".headerRightTextA").val()
		,textCentral=$(".bodyTextA").val()
		,tab=$(".tabCentrale").val();
		
			$.ajax({
            url: 'ajax/trtModelTextSimple.php',
            type: 'POST',
            data: {
					  'textHeaderDroite':textHeaderDroite ,
					  'textHeaderGauche':textHeaderGauche ,
					  'bodyText':textCentral,
					  'tabulation':tab,
					},
            
            success: function (result)
			{
                if(result=="ok")
					$(".iframeA").attr("src",function(){return "pdfGenerer/ModeleTexteSimple1.pdf";})
            },
            error: function (xhr, status, error) {
              alert("une erreur interne est survenu");
            }
          });
	}
	);
	
	
	
	
	
	$(".bodyTextA").on('keyup',function()
	{
		var textHeaderGauche=$(".headerLeftTextA").val()
		, textHeaderDroite=$(".headerRightTextA").val()
		,textCentral=$(".bodyTextA").val()
		,tab=$(".tabCentrale").val();
		
			$.ajax({
            url: 'ajax/trtModelTextSimple.php',
            type: 'POST',
            data: {
					  'textHeaderDroite':textHeaderDroite ,
					  'textHeaderGauche':textHeaderGauche ,
					  'bodyText':textCentral,
					  'tabulation':tab,
					},
            
            success: function (result)
			{
                if(result=="ok")
					$(".iframeA").attr("src",function(){return "pdfGenerer/ModeleTexteSimple1.pdf";})
            },
            error: function (xhr, status, error) {
              alert("une erreur interne est survenu");
            }
          });
	}
	);
	
	