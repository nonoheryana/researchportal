<?PHP

class CompletionCheckAdminRequest extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layout',$data);
		}
	function load_php()
				{
				$ProjectID = $_POST['ProjectSelected'];
				$this->load->model('project_model');
				session_start();
				echo'
					<FORM METHOD=POST ACTION="#">
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Approve and Forward To Chairman')
						{
						$this->project_model->projectCompletionAdminResponse('Approve',$ProjectID);
						$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "admin_approve_completion");
						header("Location: /rp/completion_admin");
						} 
					else if ($_POST['RequestType'] == 'Check Deliverables') 
						{
						
						$array = $this->project_model->getDirectoryList('/upload');
						echo $array;
						//$this->project_model->insertComment($_SESSION['username'], $_SESSION['usertype'], $ProjectID, addslashes(trim($_POST['comment'])), "admin_reject_completion");
						//header("Location: /rp/completion_admin");
						}
					echo "\n\n";
					//echo $msg;
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
	}
?>