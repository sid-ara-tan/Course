<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>


<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
            $('#sid>tbody>tr>td:nth-child(1)').each( function(){
                var placeHolder="[";
                var name=$(this).text();
                var res=name.substr(0,name.indexOf(placeHolder));
                alert(res);
            });
    });
</script>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='View Student';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>


    <div class="yp_listings bg-lblack">
								<h3>
									&raquo; Company Listings in Category: <font color="#FF0000" style="text-transform:uppercase">Doctors
</font>
								</h3>
								<table id="sid" width="100%"  border="0" cellspacing="0" cellpadding="0">
									<tr>
    									<th>
																					<font color="#FFFF00">Company Name</font>
																				</th>
    									<th>
																					<font color="#FFFF00">Product/Services</font>
																				</th>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1792">A. B. M.  MASHIUR RAHMAN CHOWDHURY</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <a style="color:#0000FF"  href="../golink.php?path=." target="_blank">Web</a> ] | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1793">A. K. MIAH</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, DTM & H, Ph. D )										/td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1791">A.A.QUORESMI</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1794">ABDUL AZIZ</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (BDS. DO Path, Research Fellow (Tokyo) Cham:)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1795">ABDUL MANNAN</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1796">ABUL HASSAN MAHMUD</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (BDS)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1797">AMIRUL ISLAM</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, DA. )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1798">CAPTAIN (DR.) MD. NURUL AZIM            017520202</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1799">CAPTAIN (DR.) RASHIDA</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, FCPS, FWHO, FRSH, MAMS)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=13263">Care & Cure Dental Clinic</a></strong><br/>
											[ <a style="color:#0000FF" href="../yp/sendmail.php?id=13263" target="_blank">Email</a> ] [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											Doctors										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1800">D. S. ZAMAN (KHOKON)</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (BDS (Dhaka) PGT (Moscow) PGD, (Japan))										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1801">DIL ROSE BANU</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, TB. BAT)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1802">DR. M. E. JAHID</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, DSM, MAMS)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1803">GIASUDDIN AHMED</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, D.C.H. )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1805">KAZI MESBAHUDDIN IABAL</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, DA, FFARCS, FRCA.)										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=17549">KneeOrtho</a></strong><br/>
											[ <a style="color:#0000FF" href="../yp/sendmail.php?id=17549" target="_blank">Email</a> ] [ <a style="color:#0000FF"  href="../golink.php?path=http://www.kneeortho.org/Index.htm" target="_blank">Web</a> ] | Country: <strong>INDIA</strong>
										</td>
										<td width="40%">
											Doctors										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1806">LT. COL. DR REHANA KHANAM</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (CHILD SPECILIST. )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1807">M. A. MOYEED SIDDIQUI (COL)</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, MCPS, FCPS )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1808">M. F. ALI</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, MCPS (PAED), FAMS (AUSTRIA), F.A.A.P (U.S.A.), )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1809">M. QUAMRUL HASSAN</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, FCPS. (PAED), )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=13845">National Institute of Mental Health, Dhaka</a></strong><br/>
											[ <a style="color:#0000FF" href="../yp/sendmail.php?id=13845" target="_blank">Email</a> ] [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											Doctors										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=18473">Om Dental Clinic</a></strong><br/>
											[ <a style="color:#0000FF" href="../yp/sendmail.php?id=18473" target="_blank">Email</a> ] [ <a style="color:#0000FF"  href="../golink.php?path=http://www.omdental.in" target="_blank">Web</a> ] | Country: <strong>INDIA</strong>
										</td>
										<td width="40%">
											Doctors										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1810">PROF, DR. A. R. M. A. AWWAL</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (M. R. C. P, F. R. C.P (London) )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1811">SAIFUL QUDDUS</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, DTCD )										</td>
									</tr>
									  									<tr id="yplists">
										<td width="60%">
											<strong><a href="../yp/coinfo.php?id=1812">SUMSUL AREPIN</a></strong><br/>
											[ <font color="#999999">Email</font> ]  [ <font color="#999999">Web</font> ]  | Country: <strong>Bangladesh</strong>
										</td>
										<td width="40%">
											DOCTORS (MBBS, FCPS )										</td>
									</tr>
								</table>
							</div>



<?php $this->load->view('admin/template/footer');?>