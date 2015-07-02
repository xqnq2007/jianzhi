



function Click(){ 
	//alert('版权所有(C)2001 XXX工作室'); 
	window.event.returnValue=false; 
	} 
document.oncontextmenu=Click;

function noMenuTwo() 
{ 
if(event.button == 2) 
{ 
//alert('禁止右键菜单!'); 
return false; 
} 
} 
document.onmousedown = noMenuTwo;
