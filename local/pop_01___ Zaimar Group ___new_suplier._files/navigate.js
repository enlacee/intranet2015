function showS(xItem){

var item=eval("_"+xItem);

var imge=eval("document.i"+xItem);

	if (item.style.display!=''){

		imge.src="images/red.gif";

		item.style.display='';}

	else{

		imge.src="images/blue.gif";

		item.style.display='none';}

}



function MovePg(nPg){

xform=document.forms[0];

		xform.Pg.value=nPg;

		xform.submit();

}

//-------------------------------------------------------------//



function addNew(xform){

	xform.action=strPg+"_add.php";

	xform.submit();

}



function SelectAll(xform){

var xSel=xform.chkAll.checked;

	for(i=0;i<(xform.chkID).length;i++){

		xform.chkID[i].checked=xSel;

	}

}



function Delete(xform){

var chkItems="";

	

	if(xform.chkID.checked) chkItems=xform.chkID.value;

	else {

			for(i=0;i<(xform.chkID).length;i++){

			if(xform.chkID[i].checked) chkItems+=xform.chkID[i].value+",";

			}

	}



		if (chkItems!=""){

			if(confirm("Esta seguro de eliminar el registro?")){

			xform.accion.value="delete";

			xform.action=strPg+".php?chkItems="+chkItems;

			xform.submit();

			}

		}



}



function Cambio(xform){

var cambio=0;

cambio=1;

xform.action=strPg+".php?cambio="+cambio;

xform.submit();

}



function Activa(xform){

var cont=0;

var aux=0;

var maximo=0;

	

   	  for(j=0;j<(xform.chkID).length;j++){

			if(xform.chkID[j].checked){

				       aux = parseInt(xform.text_or[j].value);

				       if (aux>=maximo)

				          {

						    maximo=aux;

						   }

		      }

		}

cont=maximo;





if(xform.chkID.checked) {eval("xform.text_or.disabled=false");

	   cont++;	

       xform.text_or.value=cont;}

	else {

   	  for(i=0;i<(xform.chkID).length;i++){

			if(xform.chkID[i].checked){eval("xform.text_or[i].disabled=false");

			   if(xform.text_or[i].value==""){

			   cont++;

			   }

		        if(xform.text_or[i].value==""){ xform.text_or[i].value=cont;}

			   

			   }

		}

	}



  if(xform.chkID.checked==false){ eval("xform.text_or.disabled=true");

     xform.text_or.value="";}

	else {

		for(i=0;i<(xform.chkID).length;i++){

			if(xform.chkID[i].checked==false){eval("xform.text_or[i].disabled=true");

			   xform.text_or[i].value="";	

			}

		}

	}

}