<?php

class printfileext extends CI_Controller 
{
function index ()
{
			//echo '<p>Value received is '. $this->input->post('Choice1'). '</p>';
				/*session_start();
				$data['myClass']=$this;
				$data['action']=0;

			if($_SESSION['usertype']==1){
				$this->load->view('layout',$data);
			} elseif ($_SESSION['usertype']==2){
				$this->load->view('layoutComm',$data);
			} elseif($_SESSION['usertype']==3){
				$this->load->view('layoutChairman',$data);
			}
			else{
			
			header("location:/rp/login");
			}*/

	session_start();
	$projectID = $_POST['ProjectSelected'];
	$err = '<p style="color:#990000">Sorry, please try again later.</p>';
	//echo 'File is '.$projectID;
	if (!$projectID) 
	{
	// if variable $projectID is NULL or false display the message
	//echo $err;
	} 
	else 
	{			
	$this->load->model('project_model');
					  //pass the projectId of the selected project
					 
					 echo '<FORM name="approveProject" method= POST action="">';

					 $Query= $this->project_model->projectInfo($projectID);
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					
					foreach($Query->result() as $row)
					 {
					 echo '<Table>
					 <TR><TD style="font-weight:bold" align = center colspan=2>INDIAN INSTITUE OF MANAGEMENT CALCUTTA</TD></TR>
					 <TR><TD style="font-weight:bold" align = center colspan=2>Fellow Programme and Research</TD></TR>
					 <TR><TD style="font-weight:bold" align = center colspan=2></TD></TR>
					 <TR><TD align = center colspan=2><u>Inter-office Memo</u></TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left><u>To : </TD><TR></TR><TR></TR>
					 <TD align = left>C.C : </TD></TR><TR></TR><TR></TR>
					 <TR><TD align = left colspan=2>From : </TD></TR><TR></TR><TR></TR>
					 <TR><TD align = left colspan=2>Subject : Research Project Extension by Prof.'.$row->Researcher1.'';
					 if ($row->Researcher2 != '')
						echo ', Prof.'.$row->Researcher2;
					if ($row->Researcher3 != '')
						echo ', Prof.'.$row->Researcher3;
					 
					 echo '</TD></TR>
					<TR><TD align = left colspan=2></TD></TR>
					 
					 <TR><TD align = left colspan=2>Date : '.date("Y-m-d").'</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2>The FPR Chair has approved the extension of the following Research Project proposal submitted by Prof.'.$row->Researcher1.'';
					 if ($row->Researcher2 != '')
						echo ', Prof.'.$row->Researcher2;
					if ($row->Researcher3 != '')
						echo ', Prof.'.$row->Researcher3;
					 echo '</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2>Title of the Project : '.$row->ProjectTitle.'</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2>Researcher : Prof.'.$row->Researcher1.'';
					 if ($row->Researcher2 != '')
						echo ', Prof.'.$row->Researcher2;
					if ($row->Researcher3 != '')
						echo ', Prof.'.$row->Researcher3;
					echo'</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2>Project Category : '.$row->ProjectCategory.'</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2>Project Grant : '.$row->ProjectGrant.'</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>';
					//$date1 = new DateTime("2007-03-24");
					//$date2 = new DateTime("2009-06-26");
					//$interval = $date1->diff($date2);
					 echo '<TR><TD align = left colspan=2>Extension Time Frame : '.$row->Period.'</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>';
					 $path = "image/chairman";
					$Files = glob($path."*.*");
					foreach ($Files as $File)
					{
						echo '<TR><TD align = left colspan=6><IMG src="'.$File.'" border="0" width ="100" height="100"></TD></TR>';
					}	
					 echo '<TR><TD align = left colspan=2><br></TD></TR>
					 <TR><TD align = left colspan=2>(Prof. Biswatosh Saha)</TD></TR>
					 <TR><TD align = left colspan=2><br></TD></TR>';
					 //<TR><TD align = left colspan=2><u><b>Encl. : </b>Research Proposal of Prof.'.$row->Researcher1.'</u></TD></TR>
					 
					 break;
					 }
					 echo '</tbody> ';
					echo '<TR><TD align = center colspan=2><INPUT TYPE="button" onClick="window.print()" value="  Print  "></TR></Table></TABLE>';

	}
} 	
}	
	
	?>
	