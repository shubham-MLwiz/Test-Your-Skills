function A(ele,msg)
{
	if(ele.value==null || ele.value=="")
	{
		alert(msg);
		return false;
	}
	else
	{
		return true;
	}
}
function IsAlpha(ele,msg) //only alphabets
{
	var sText=ele.value;
	
   	var flag=true;
   	var ch;

 
   	for (i = 0; i < sText.length; i++) 
        { 
      	ch = sText.charAt(i); 
      	if(!(ch>='a' && ch<='z' || ch>='A'&& ch<='Z' || ch==' '))
		{
			flag=false;
			break;
		}
   	}
   	if(flag==false)
	{
		alert(msg);
	}
	return flag;
}
function IsNumeric(ele,msg) //Only numeric
{
	var sText=ele.value;
	
   	var f=true;
   	var ch;

 
   	for (i = 0; i < sText.length; i++) 
    { 
      	ch = sText.charAt(i); 
      	if(!(ch>='0' && ch<='9'))
		{
			f=false;
			break;
		}
   	}
   	if(f==false)
	{
		alert(msg);
	}
	return f;
}
function CheckRange(ele,msg,min,max)
{
	with(ele)
	{
		if(value<min || value>max)
		{
			alert(msg);
			return false;
		}
		else
		{
			return true;
		}
	}
}
function MatchPassword(ele1,ele2,msg)
{
	if(ele1.value!=ele2.value)
	{
		alert(msg)
		return false;
	}
	else
	{
		return true;
	}
}
function isValidDate(ele,msg)  //date format mm/dd/yyyy
{ 
	var sText=ele.value;
	
	var reDate = /(?:0[1-9]|[12][0-9]|3[01])\/(?:0[1-9]|1[0-2])\/(?:19|20\d{2})/; 
    if(reDate.test(sText))
	{
		return true; 
	}
	alert(msg);
	return false;
}
function checkEmail(ele,msg) //mail-address validation
{
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(ele.value))
	{
		return true;
	}
	alert(msg);
	return false;
}
function CheckStatus(ele,msg)
{
    if(){}
}
function B(m)
{
	with(m)
	{
		if(A(T1,"Enter user name")==false)
		{
			T1.focus();
			return false;
		}
		else if(IsAlpha(T1,"Enter only alphabets in name")==false)
		{
			T1.focus();
			return false;
		} 
		else if(A(T2,"Enter Branch")==false)
		{
			T2.focus();
			return false;
		}
		else if(IsAlpha(T2,"Enter only alphabets in branch")==false)
		{
			T2.focus();
			return false;
		}
		/*else if(A(T3,"Enter YOAD")==false)
		{
			T3.focus();
			return false;
		}
		else if(IsNumeric(T3,"Enter only digits")==false)
		{
			T3.focus();
			return false;
		}
		else if(CheckRange(T3,"Enter from 2000 to 2010",2000,2010)==false)
		{
			T3.focus();
			return false;
		}*/
		else if(A(T4,"Enter Status")==false)
		{
			T4.focus();
			return false;
		}
                else if(CheckStatus(T4,"Status field should be 0 or 1")==false)
                {   
                    T4.focus();
                    return false;
                }
		else if(A(T5,"Enter password")==false)
		{
			T5.focus();
			return false;
		}
		else if(A(T6,"Enter Confirm password")==false)
		{
			T6.focus();
			return false;
		}
		else if(MatchPassword(T5,T6,"Password not matched")==false)
		{
			T5.value="";
			T6.value="";
			T5.focus();
			return false;
		}
		else if(A(T7,"Enter Email")==false)
		{
			T7.focus();
			return false;
		}
		else if(checkEmail(T7,"Invalid email ID")==false)
		{
			T7.focus();
			return false;
		}
	}
}