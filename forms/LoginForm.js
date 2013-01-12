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
function B(m)
{
	with(m)
	{
		if(A(T1,"Enter user name")==false)
		{
			T1.focus();
			return false;
		}
		else if(A(T2,"Enter Password")==false)
		{
			T2.focus();
			return false;
		}
	}
}
