<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%option explicit%>
<!--#include file="../Conn.asp"-->
<!--#include file="../Plus/md5.asp"-->
<!--#include file="../KS_Cls/Kesion.MemberCls.asp"-->
<!--#include file="../KS_Cls/Kesion.Label.CommonCls.asp"-->
<!--#include file="payfunction.asp"-->
<%
'******************************************************************
' Software name:KesionCMS X1.0
' Email: service@kesion.com . Ӫ��QQ:4000080263  Tel:400-008-0263
' Web: http://www.kesion.com http://www.kesion.cn
' Copyright (C) Kesion Network All Rights Reserved.
'******************************************************************
Dim KSCls
Set KSCls = New User_PayOnline
KSCls.Kesion()
Set KSCls = Nothing

Class User_PayOnline
        Private KS,KSUser
		Private Sub Class_Initialize()
		  Set KS=New PublicCls
		  Set KSUser = New UserCls
		End Sub
        Private Sub Class_Terminate()
		 Set KS=Nothing
		 Set KSUser=Nothing
		End Sub
		%>
		<!--#include file="../KS_Cls/UserFunction.asp"-->
		<%
		Public Sub LoadMain()
		IF Cbool(KSUser.UserLoginChecked)=false Then
		  Response.Write "<script>top.location.href='Login';</script>"
		  Exit Sub
		End If
		Call KSUser.Head()
		Call KSUser.InnerLocation("����֧��")
		Response.Write "<div class=""tabs"">"
		Response.Write " <ul class="""">"
		Response.Write " <li class='puton'><a href=""User_PayOnline.asp"">����֧�����</a></li>"
		Response.Write " <li style=""display:none""><a href=""user_recharge.asp"">��ֵ����ֵ</a></li>"
		If Mid(KS.Setting(170),1,1)="1" or Mid(KS.Setting(170),2,1)="1" Then
		Response.Write " <li style=""display:none""><a href=""user_exchange.asp?Action=Point"">�һ�" & KS.Setting(45) & "</a></li>"
		End If
		If Mid(KS.Setting(170),3,1)="1" or Mid(KS.Setting(170),4,1)="1" Then
		Response.Write " <li style=""display:none""><a href=""user_exchange.asp?Action=Edays"">�һ���Ч��</a></li>"
		End If
		If Mid(KS.Setting(170),5,1)="1" Then
		Response.Write " <li style=""display:none""><a href=""user_exchange.asp?Action=Money"">" & KS.Setting(45) & "�һ��˻��ʽ�</a></li>"
		End If
		Response.Write "</ul>"
		Response.Write "</div>"
		Select Case KS.S("Action")
		 Case "PayStep2"
		    Call PayStep2()
		 Case "PayStep3"
		    Call PayStep3()
		 Case "Payonline"
		    Call PayShopOrder()
	     Case Else
		    Call PayOnline()
		End Select
       End Sub
	  
	   
	   Sub PayOnline()
	    %>
	   <script type="text/javascript">
	     function Confirm(v)
		 {
		  $("#paytype").val(v);
		  if (v==1){
		    return(confirm('�˲��������棬ȷ��ʹ�����֧��������'));
		  }
		  if (document.myform.Money.value=="")
		  {
		   alert('��������Ҫ��ֵ�Ľ��!')
		   document.myform.Money.focus();
		   return false;
		  }
		  return true;
		  }
	   </script>
		<FORM name=myform action="User_PayOnline.asp" method="post">
		  <table class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr>
			  <td class="title" colSpan=2 height=25>&nbsp;���߳�ֵ</td>
			</tr>
            <tr class=tdbg>
			  <td align=right width=213>���������</td>
			  <td width="754"><span style="color:#F00;font-size:16px;font-weight:500;font-family:'΢���ź�';"><%=KSUser.UserName%></span></td>
			</tr>
            <tr class=tdbg>
			  <td align=right width=213>��ܰ��ʾ��</td>
			  <td width="754"><span style="color:#F00;font-size:16px;font-weight:700;font-family:'΢���ź�';">������ȷ��������ʼ��֣�����ֺ�30�����ڵ��ˣ����Ϻ���ĩ��ֶ�Сʱ�ڵ��ˡ�</span></td>
			</tr>
            
		
			<tr class=tdbg style="display:none;">
            
			  <!--<td width="213" align=right>�Ʒѷ�ʽ��</td>
			  <td><%if KSUser.ChargeType=1 Then 
		  Response.Write "�۵���</font>�Ʒ��û�"
		  ElseIf KSUser.ChargeType=2 Then
		   Response.Write "��Ч��</font>�Ʒ��û�,����ʱ�䣺" & cdate(KSUser.GetUserInfo("BeginDate"))+KSUser.GetUserInfo("Edays") & ","
		  ElseIf KSUser.ChargeType=3 Then
		   Response.Write "������</font>�Ʒ��û�"
		  End If
		  %>&nbsp;</td>-->
          
		    </tr>
			<tr class=tdbg style="display:none;">
			  <td align=right width=213>�ʽ���</td>
			  <td><input type='hidden' value='<%=KSUser.GetUserInfo("Money")%>' name='Premoney'><%=formatnumber(KSUser.GetUserInfo("Money"),2,-1)%> Ԫ</td>
			</tr>
			<%If KSUser.ChargeType=1 then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=213>����<%=KS.Setting(45)%>��</td>
			  <td><%=KSUser.GetUserInfo("Point")%>&nbsp;<%=KS.Setting(46)%></td>
			</tr>
			<%end if%>
			<%If KSUser.ChargeType=2 then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=213>ʣ��������</td>
			  <td>
			  <%if KSUser.ChargeType=3 Then%>
			  ������
			  <%else%>
			  <%=KSUser.GetEdays%>&nbsp;��
			  <%end if%></td>
			</tr>
		   <%end if%>
			<tr class=tdbg style="display:none;">
			  <td align=right>��ǰ����</td>
			  <td><%=KS.U_G(KSUser.GroupID,"groupname")%></td>
		    </tr>
			<tr>
			  <td class="title" colSpan=2 height=25>&nbsp;ѡ�����߳�ֵ��ʽ</td>
			</tr>

			<tr class=tdbg>
			  <td colspan="2">
			  <%
			   Dim HasCard:HasCard=false
			   Dim RSC,AllowGroupID:Set RSC=Conn.Execute("Select ID,GroupName,Money,AllowGroupID From KS_UserCard Where CardType=1 and DateDiff(" & DataPart_S & ",EndDate," & SqlNowString& ")<0")
			   Do While NOt RSC.Eof 
			      HasCard=true
			      AllowGroupID=RSC("AllowGroupID") : If IsNull(AllowGroupID) Then AllowGroupID=" "
			     If KS.IsNul(AllowGroupID) Or KS.FoundInArr(AllowGroupID,KSUser.GroupID,",")=true Then
			    response.write "&nbsp;&nbsp; <label><input checked name=""UserCardID"" onclick=""$('#m').hide();$('#paybutton').attr('disabled',false);"" type=""radio"" value=""" & rsc("ID") & """/>" & rsc(1) & " (��Ҫ���� <span style='color:red'>" & formatnumber(RSC(2),2,-1) & "</span> Ԫ)</label><br/>"
				End If
			    RSC.MoveNext
			   Loop
			   RSC.Close
			   Set RSC=Nothing
			  %>
			  <%If Mid(KS.Setting(170),6,1)="1" Then%>
			  &nbsp;&nbsp; <label><input <%if HasCard=false Then response.write " checked"%> onClick="$('#m').show();$('#paybutton').attr('disabled',true);" type="radio" value="0" name="UserCardID"> �� �� �� ��</label><br/>
			  <%end if%>
              <span style='margin-left:15px;'>ѡ��ӿ�:</span>
			  <select id='beishu' onchange='caculate($("#shuliang").val())'>
				<option value='1000'>AG</option>
				<option value='1000'>BBIN</option>
				<option value='1200'>MG</option>
				<option value='1200'>DS</option>
				<option value='1200'>HG</option>
				<option value='1800'>PT</option>
				<option value='1100'>NA</option>
                <option value='1200'>ŷ��</option>
                <option value='1200'>�격</option>
			  </select>
				����
			  <input type='text' id='shuliang' value='1' onkeyup='caculate(this.value)' style='width:50px;' />
			  <span id='shuoming' style='color:red'></span>
			  <br>
			 
              <span id='m'<%if HasCard=true Then response.write " style=""display:none"""%>> &nbsp;&nbsp;&nbsp;&nbsp;��������Ҫ��ֵĽ�&nbsp;<input style="text-align:center;line-height:22px" name="Money" id="Money" readonly='readonly' type="text" class="textbox" value="1000" size="10" maxlength="10"> Ԫ</span><span id='tishi' style='margin-left:20px; '></span>
              
              <script>
				function caculate(points){
					if(!points){
						points = 0;
					}
					if(parseFloat(points)<1){
						//$('#shuliang').val(0);
						points = 0;
					}else{
						$('#shuliang').val(parseInt(points));
						points = parseInt(points);
					}

					$('#Money').val(points*$('#beishu').val());
					//$('#tishi').text('�������'+$('#beishu').find("option:selected").text()+'����'+10000*points);
					$('#tishi').text('�������'+10000*points+'Ԫ��Ϸ���');
					$('#shuoming').text($('#beishu').val()+'Ԫ =' + '10000' +$( '#beishu' ).find( "option:selected" ).text()+ '��');
				}
				caculate(1);
			  </script>
			  </td>
		    </tr>
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
		        <Input id="Action" type="hidden" value="PayStep2" name="Action"> 
				<Input class="button" id=Submit type=submit value=" ��������֧�� " onClick="return(Confirm(0))" name=Submit>
				<%if HasCard then%>
				<input type='hidden' name='paytype' id='paytype' value='1'/>
				<Input class="button" id="paybutton" type=submit value=" ʹ�����֧�� " onClick="return(Confirm(1))"  name=Submit>
				<%end if%>
				 </td>
			</tr>
		  </table>
		</FORM>
		<br/><br/>
	   <%
	   End Sub
	   
	   Sub PayStep2()
	    Dim UserCardID:UserCardID=KS.ChkClng(KS.G("UserCardID"))
	   	Dim Money:Money=KS.S("Money")
		Dim Title,PayType,ValidUnit
		PayType=KS.ChkClng(KS.S("PayType"))
		
		If UserCardID<>0 Then
		   Dim RS:Set RS=Conn.Execute("Select Top 1 Money,GroupName,ValidUnit From KS_UserCard Where ID=" & UserCardID)
		   If Not RS.Eof Then
		    Title=RS(1)
		    Money=RS(0)
			ValidUnit=RS(2)
			RS.Close : Set RS=Nothing
		   Else
		    RS.Close : Set RS=Nothing
		    Call KS.AlertHistory("��������",-1)
			Exit Sub 
		   End If
		   '�ж��û���û��ѡ������
		   If PayType=1 Then
		     If KS.ChkClng(ValidUnit)=3 Then
		      Call KS.AlertHistory("�Բ��𣬱���ֵ�����������֧����",-1)
			 End If
		     If round(KSUser.GetUserInfo("money"),2)<round(Money,2) Then
		      Call KS.AlertHistory("�Բ��������ý��㣬����ֵ����Ҫ����" & Money & "Ԫ������ǰ�Ŀ������Ϊ" & Formatnumber(KSUser.GetUserInfo("money"),2,-1,-1) & "Ԫ����ѡ�����߹���֧����",-1)
			  Exit Sub
			 End If
			 Call UpdateByCard(1,UserCardID,KSUser.UserName,KSUser.GetUserInfo("RealName"),KSUser.GetUserInfo("Edays"),KSUser.GetUserInfo("BeginDate"),UserCardID,"")
			 Session(KS.SiteSN&"UserInfo")=empty
			 Response.Write("<script>alert('��ϲ��[" & title & "]����ɹ���');location.href='user_logmoney.asp';</script>")
			 response.End()
		   End If 
		   
		   
		ElseIf Mid(KS.Setting(170),6,1)="0" Then
		  KS.AlertHintScript "�Բ��𣬱�վ�������Ա���ɳ�ֵ��"
		  Exit Sub
		Else
		   Title="Ϊ�Լ����˻���ֵ"
		End If

		If Not IsNumeric(Money) Then
		  Call KS.AlertHistory("�Բ���������ĳ�ֵ����ȷ��",-1)
		  exit sub
		End If
		
		If Money=0 Then
		  Call KS.AlertHistory("�Բ��𣬳�ֵ������Ϊ0.01Ԫ��",-1)
		  exit sub
		End If
		Dim OrderID:OrderID=KS.Setting(72) & Year(Now)&right("0"&Month(Now),2)&right("0"&Day(Now),2)&hour(Now)&minute(Now)&second(Now)
		
		%>
	   <FORM name=myform action="User_PayOnline.asp" method="post">
		  <table id="c1" class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr class=title>
			  <td align=middle colSpan=2 height=22><B> ȷ �� �� ��</B></td>
			</tr>
			<tr class=tdbg>
			  <td align=right width=167>�û�����</td>
			  <td width="505"><%=KSUser.UserName%></td>
			</tr>
			<tr class=tdbg>
			  <td width="167" align=right>֧����ţ�</td>
			  <td><input type='hidden' value='<%=OrderID%>' name='OrderID'><%=OrderID%>&nbsp;</td>
		    </tr>
			<tr class=tdbg>
			  <td align=right width=167>֧����</td>
			  <td><input type='hidden' value='<%=Money%>' name='Money'><%=FormatNumber(Money,2,-1)%> Ԫ</td>
			</tr>
			<%If title<>"" then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=167>֧����;��</td>
			  <td style="color:red">��<%=title%>��</td>
			</tr>
			<%end if%>

			<tr class=tdbg>
			  <td align=right width=167>ѡ������֧��ƽ̨��</td>
			  <td>
			  <%
			   Dim SQL,K,Param
			   If UserCardID<>0 Then
			    Param=" and id in(1,10,6,7,12,13,14)"
			   End IF
			   Set RS=Server.CreateOBject("ADODB.RECORDSET")
			   RS.Open "Select ID,PlatName,Note,IsDefault From KS_PaymentPlat Where IsDisabled=1 " & Param & " Order By OrderID",conn,1,1
			   If Not RS.Eof Then SQL=RS.GetRows(-1)
			   RS.Close:Set RS=Nothing
			   If Not IsArray(SQL) Then
			    Response.Write "<font color='red'>�Բ��𣬱�վ�ݲ���ͨ����֧�����ܣ�</font>"
			   Else
			     For K=0 To Ubound(SQL,2)
				   Response.Write "<input type='radio' value='" & SQL(0,K) & "' name='PaymentPlat'"
				   If SQL(3,K)="1" Then Response.Write " checked"
				   Response.Write ">"& SQL(1,K) & "(" & SQL(2,K) &")<br>"
				 Next
			   End If
			  %>
			  </td>
			</tr>
			
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
		        <Input id=Action type=hidden value="PayStep3" name="Action"> 
		        <Input id=Action type=hidden value="<%=UserCardID%>" name="UserCardID"> 
		        <Input type=hidden value="user" name="PayFrom"> 
				<Input class="button" id="Submit" type="submit" value=" ��һ�� " onclick="return(check());" name="Submit">
				<input class="button" type="button" value=" ��һ�� " onClick="javascript:history.back();"> 
				</td>
			</tr>
		  </table>
		</FORM>
         <script>
		 function check(){
		  var PaymentPlat=$("input[name='PaymentPlat']:checked").val();
		  if (PaymentPlat==undefined){
		   alert('ѡ��֧����ʽ!');
		   return false;
		  }
		 }
		</script>
		<%
	   End Sub
	   
	   
	   '֧���̳Ƕ���
	   Sub PayShopOrder()
	  	 Dim ID:ID=KS.ChkClng(KS.S("ID"))
		 Dim RS:Set RS=Server.CreateObject("ADODB.RECORDSET")
		 RS.Open "Select top 1 OrderID,MoneyTotal,DeliverType,Status,OrderType From KS_Order Where ID="& ID,Conn,1,1
		 If RS.Eof Then
		  rs.close:set rs=nothing
		  KS.Die "<script>alert('������!');history.back();</script>"
		 End If 
		If KS.ChkCLng(KS.Setting(49))=1 Then
		  If RS("Status")=0 Then
		    RS.Close:Set RS=Nothing
		   	KS.Die "<script>alert('�Բ��𣬸ö�����δȷ�ϣ���վ����ֻ�к�̨ȷ�Ϲ��Ķ�����������֧��!');history.back();</script>"
		  End If
		End If
		
		Dim OrderID:OrderID=RS("OrderID")
	   	Dim Money:Money=RS("MoneyTotal")
		Dim DeliverType:DeliverType=RS("DeliverType")
		Dim OrderType:OrderType=RS("OrderType")
		RS.Close
		Dim DeliverName,ProductName
		RS.Open "Select Top 1 TypeName From KS_Delivery Where Typeid=" & DeliverType,conn,1,1
		If Not RS.Eof Then
		 DeliverName=RS(0)
		End IF
		RS.Close
		If OrderType=1 Then
		RS.Open "Select top 10 subject as title From KS_GroupBuy Where ID in(Select proid From KS_OrderItem Where OrderID='" & OrderID& "')",conn,1,1
		Else
		RS.Open "Select top 10 Title From KS_Product Where ID in(Select proid From KS_OrderItem Where OrderID='" & OrderID& "')",conn,1,1
		End If
		If RS.Eof And RS.Bof Then
		 ProductName=OrderID
		Else
			Do While Not RS.Eof
			 if ProductName="" Then
			   ProductName=rs(0)
			 Else
			   ProductName=ProductName&","&rs(0)
			 End If
			 RS.MoveNext
			Loop
		End If
		RS.Close
		
		If Not IsNumeric(Money) Then
		  Call KS.AlertHistory("�Բ��𣬶�������ȷ��",-1)
		  exit sub
		End If
		If Money=0 Then
		  Call KS.AlertHistory("�Բ��𣬶���������Ϊ0.01Ԫ��",-1)
		  exit sub
		End If
		%>
	   <FORM name=myform action="User_PayOnline.asp" method="post">
		  <table id="c1" class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr class=title>
			  <td align=middle colSpan=2 height=22><B> ȷ �� �� ��</B></td>
			</tr>
			<tr class=tdbg>
			  <td align=right width=167>�û�����</td>
			  <td width="505"><%=KSUser.UserName%></td>
			</tr>
			<tr class=tdbg>
			  <td width="167" align=right>��Ʒ���ƣ�</td>
			  <td><input type='hidden' value='<%=ProductName%>' name='ProductName'><%=ProductName%>&nbsp;
			  <input type='hidden' value='<%=DeliverName%>' name='DeliverName'>
			  </td>
		    </tr>
			<tr class=tdbg>
			  <td width="167" align=right>֧����ţ�</td>
			  <td><input type='hidden' value='<%=OrderID%>' name='OrderID'><%=OrderID%>&nbsp;</td>
		    </tr>
			<tr class=tdbg>
			  <td align=right width=167>֧����</td>
			  <td>
			  <%
			   Dim LessPayMoeny:LessPayMoeny=0
			   Dim PArr:Parr=Split(KS.Setting(82)&"||||||||","|")
			  If Parr(0)="1" Then
			  %><input type='hidden' value='<%=Money%>' name='Money'><%=Money%> Ԫ<%
			  ElseIf Parr(0)="2" Then
			   LessPayMoeny=round(Parr(1),2)/100*Money
			   if ks.chkclng(Parr(3))<>0 and Money<ks.chkclng(Parr(3)) then
				  LessPayMoeny=Money
			   end if
			  %>
			  <input type='hidden' value="1" name="zfdj" />
			  <strong>Ԥ��<input type='hidden' value='<%=Parr(1)%>' name='Money'><%=LessPayMoeny%> Ԫ����</strong><%
			  Else %>
			   <input type='hidden' value="1" name="zfdj" />
			   <input type='text' size='8' style="text-align:center;height:21px;line-height:21px" name='money' value='<%=Money%>'/> Ԫ
			 <%
			  End If
			 %>
			  </td>
			</tr>
			
			<tr class=tdbg>
			  <td align=right width=167>ѡ������֧��ƽ̨��</td>
			  <td>
			  <%
			   Dim SQL,K
			   RS.Open "Select ID,PlatName,Note,IsDefault From KS_PaymentPlat Where IsDisabled=1 Order By OrderID",conn,1,1
			   If Not RS.Eof Then SQL=RS.GetRows(-1)
			   RS.Close:Set RS=Nothing
			   If Not IsArray(SQL) Then
			    Response.Write "<font color='red'>�Բ��𣬱�վ�ݲ���ͨ����֧�����ܣ�</font>"
			   Else
			     For K=0 To Ubound(SQL,2)
				   Response.Write "<input type='radio' value='" & SQL(0,K) & "' name='PaymentPlat'"
				   If SQL(3,K)="1" And KS.ChkClng(KS.S("PaymentPlat"))=0 Then Response.Write " checked"
				   iF KS.ChkClng(SQL(0,K))=KS.ChkClng(KS.S("PaymentPlat")) Then Response.Write " checked"
				   Response.Write ">"& SQL(1,K) & "(" & SQL(2,K) &")<br>"
				 Next
			   End If
			  %>
			  </td>
			</tr>
			
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
	            <input type="hidden" name="oid" value="<%=id%>"/>
		        <Input id=Action type=hidden value="PayStep3" name="Action"> 
		        <Input type=hidden value="shop" name="PayFrom"> 
				<Input class="button" id="Submit" type="submit" value=" ��һ�� "  onclick="return(check());" name="Submit"/>
				<input class="button" type="button" value=" ��һ�� " onClick="javascript:history.back();"/> </td>
			</tr>
		  </table>
		</FORM>
        <script>
		 function check(){
		  var PaymentPlat=$("input[name='PaymentPlat']:checked").val();
		  if (PaymentPlat==undefined){
		   alert('ѡ��֧����ʽ!');
		   return false;
		  }
		 }
		</script>
		<%
	   End Sub
	   
	   Sub PayStep3()
	    Dim UserCardID,Title
		UserCardID=KS.ChkClng(KS.S("UserCardID"))
	    Dim Money:Money=KS.S("Money")
		Dim MoneyTotal:MoneyTotal=0
		Dim Oid:Oid=KS.ChkClng(request("oid"))
		if oid<>0 then
		  dim rs:set rs=conn.execute("select top 1 MoneyTotal from ks_order where id=" & oid)
		  if not rs.eof then
		    MoneyTotal=rs(0)
		  end if
		  rs.close:set rs=nothing
		end if
		Dim LessPayMoney:LessPayMoney=0
		If KS.S("zfdj")="1" Then
			Dim PArr:Parr=Split(KS.Setting(82)&"||||||||","|")
			If Parr(0)="1" Then
			ElseIf Parr(0)="2" Then
			 if ks.chkclng(Parr(3))<>0 and MoneyTotal<ks.chkclng(Parr(3)) then
			  money=MoneyTotal
			 end if
			Else 
			 Money=KS.S("Money"): If Not Isnumeric(Parr(2)) Then Parr(2)=0
			 If Not IsNumerIc(Money) Then
				KS.Die "<script>alert('�Բ��𣬶�������ȷ��');history.back();</script>"
			 End If
			 
			 	 If Parr(2)<>0 then  lessPayMoney=round(Parr(2),2)/100*MoneyTotal
				 If Not IsNumerIc(Money) Then  KS.Die "<script>$.dialog.tips('�Բ��𣬶�������ȷ��',1,'error.gif',function(){window.close();});</script>"
				 
				if ks.chkclng(Parr(3))<>0 and round(money,2)<ks.chkclng(Parr(3)) and MoneyTotal>ks.chkclng(Parr(3)) then KS.Die "<script>$.dialog.tips('�Բ���֧����������" & ks.chkclng(Parr(3)) & "Ԫ��',1,'error.gif',function(){window.close();});</script>"
				
				If (LessPayMoney<>0 and Round(Money,2)<round(LessPayMoney,2)) Or Money="0" Then KS.Die "<script>$.dialog.tips('�Բ���֧����������ڶ����ܶ��" & parr(2) & "%,����������" & round(LessPayMoney,2) & "Ԫ��',1,'error.gif',function(){window.close();});</script>"

			End If
		End If
		Dim OrderID:OrderID=KS.S("OrderID")
		Dim ProductName:ProductName=KS.CheckXSS(KS.S("ProductName"))
		Dim PaymentPlat:PaymentPlat=KS.ChkClng(KS.S("PaymentPlat"))
		Dim PayUrl,PayMentField,ReturnUrl,RealPayMoney,RealPayUSDMoney,RateByUser,PayOnlineRate
        Call GetPayMentField(OrderID,PaymentPlat,Money,UserCardID,ProductName,KS.S("PayFrom"),KSUser,PayMentField,PayUrl,ReturnUrl,Title,RealPayMoney,RealPayUSDMoney,RateByUser,PayOnlineRate)
		
		 %>
	   	  <FORM name="myform"  id="myform" action="<%=PayUrl%>" <%if PaymentPlat=11 or PaymentPlat=9 then response.write "method=""get""" else response.write "method=""post"""%>  target="_blank">
		  <table id="c1" class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr class=title>
			  <td align=middle colSpan=2 height=22><B> ȷ �� �� ��</B></td>
			</tr>
			<tr class=tdbg>
			  <td align=right width=167>�û�����</td>
			  <td width="505"><%=KSUser.UserName%></td>
			</tr>
			<tr class=tdbg>
			  <td width="167" align=right>֧����ţ�</td>
			  <td><%=OrderID%>&nbsp;</td>
		    </tr>
			<tr class=tdbg>
			  <td align=right width=167>֧����</td>
			  <td><%=formatnumber(Money,2,-1)%> Ԫ</td>
			</tr>
			<%if title<>"" then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=167 >֧����;��</td>
			  <td style="color:red">��<%=title%>��</td>
			</tr>
			<%end if%>
			<%
			if RateByUser=1 then
			%>
			<tr class=tdbg>
			  <td align=right width=167>�������������ѣ�</td>
			  <td><%=PayOnlineRate%>%</td>
			</tr>
			<%end if%>
			<tr class=tdbg>
			  <td align=right width=167>ʵ��֧����</td>
			  <td>
			  <%=formatnumber(RealPayMoney,2,-1)%></td>
			</tr>
			<%If PaymentPlat=12 Then%>
			<tr class=tdbg>
			  <td align=right width=167>ʵ��֧������</td>
			  <td style="color:#FF6600;font-weight:bold">
			  $<%=formatnumber(RealPayUSDMoney,2,-1)%> USD</td>
			</tr>
			<%End If%>
			<tr class=tdbg style="display:none;">
			  <td colspan=2>�����ȷ��֧������ť�󣬽���������֧�����棬�ڴ�ҳ��ѡ���������п���</td>
		    </tr>
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
			    <%=PayMentField%>
				<%if PaymentPlat=9 then%>
				<Input class="button" id=Submit type=button onClick="$('#myform').submit()" value=" ȷ��֧�� ">
				<%else%>
				<Input class="button" id=Submit type=submit value=" ȷ��֧�� ">
				<%end if%>
				<input class="button" type="button" value=" ��һ�� " onClick="javascript:history.back();"> </td>
			</tr>
		  </table>
		</FORM>
		  
	   <%
	   End Sub
		
End Class
%> 
