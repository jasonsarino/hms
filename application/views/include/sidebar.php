<?php
$admin = "";
$configuration = "";
$profile = "";
$patient = "";
$appointmentTab = "";
$opd = "";
$ipd = "";
$billing = "";
$reports = "";
$doctor = "";
$user_mgnmt = "";
$ipd_doctor = "";
$emr = "";
$opd_emr = "";
$ipd_emr = "";
$patient_visited_report = "";
$nurse_module = "";
$nurse_medication = "";
$nurse_room_transfer = "";
$nurse_patientHistory = "";
$nurse_discharge_summary = "";
$nurse_bed_side = "";
$inpatient_report = "";
$receipt_mod = "";
$company_information = "";
$surgical_package = "";
$declared_receipt_mod = "";
$declared_receipt_mod = "";
$nurse_diagnosis = "";

$opd_reports = "";
$opd_diagnosis_reports = "";
$opd_medication_reports = "";
$nurse_progress_note = "";

$pos_mod = "";
$OR_history_mod = "";
$editprofile_mod = "";
$change_pwd_mod = "";
$daily_reports_mod = "";
$patient_list_report_mod = "";
$opd_doctor = "";
$add_user = "";
$user_index = "";
$room_m = "";
$nurse_vital_sign = "";
$outpatient_report = "";
$discharged_patient_report = "";
$surgical_costing = "";

$ipd_registration = "";
$ipd_master = "";

$roles_mod = "";
$pages_mod = "";
$user_mod = "";
$myprofile_mod = "";
$editprofile_mod = "";
$designation_mod = "";
$department_mod = "";
$subtree_room = "";
$sub_room_category_mod = "";
$sub_room_master_mod = "";
$sub_room_bed_mod = "";
$addNew_patient_mode = "";
$patient_master_mode = "";
$appointmentList = "";
$appointmentAdd = "";
$opd_registration = "";
$opd_master = "";
$param_mod = "";
$backup = "";
$group_name_mod = "";
$particular_bill_mod = "";
$diagnosis_mod = "";
$insurance_company_mod = "";
$complain_mod = "";
$med_cat_mod = "";
$medicine = "";
$drug_mod = "";
$bill_history_mod = "";
$room_enquiry = "";
$nurse_intake_output = "";

$appAdd = "";

if($this->session->userdata('module') == "room_category"){$sub_room_category_mod = "class='active'";}   
if($this->session->userdata('module') == "room_master"){$sub_room_master_mod = "class='active'";}   
if($this->session->userdata('module') == "room_bed_master"){$sub_room_bed_mod = "class='active'";}  
if($this->session->userdata('module') == "room_enquiry"){$room_enquiry = "class='active'";} 


if($this->session->userdata('tab') == "admin"){$admin = "active"; }
if($this->session->userdata('tab') == "nurse_module"){$nurse_module = "active"; }
if($this->session->userdata('tab') == "configuration"){$configuration = "active"; }
if($this->session->userdata('tab') == "profile"){$profile = "active"; }
if($this->session->userdata('tab') == "patient"){$patient = "active"; }
if($this->session->userdata('tab') == "doctor"){$doctor = "active"; }
if($this->session->userdata('tab') == "emr"){$emr = "active"; }
if($this->session->userdata('tab') == "billing"){$billing = "active"; }
if($this->session->userdata('tab') == "user_mgnmt"){$user_mgnmt = "active"; }
if($this->session->userdata('tab') == "reports"){$reports = "active"; }
if($this->session->userdata('tab') == "room_m"){$room_m = "active"; }
if($this->session->userdata('tab') == "appointment"){$appointmentTab = "active"; }

//OPD

//NURSE
if($this->session->userdata('module') == "nurse_medication"){$nurse_medication = "class='active'";} 
if($this->session->userdata('module') == "nurse_intake_output"){$nurse_intake_output = "class='active'";}   
if($this->session->userdata('module') == "nurse_progress_note"){$nurse_progress_note = "class='active'";}   
if($this->session->userdata('module') == "nurse_vital_sign"){$nurse_vital_sign = "class='active'";} 
if($this->session->userdata('module') == "nurse_room_transfer"){$nurse_room_transfer = "class='active'";}
if($this->session->userdata('module') == "nurse_patientHistory"){$nurse_patientHistory = "class='active'";} 
if($this->session->userdata('module') == "nurse_discharge_summary"){$nurse_discharge_summary = "class='active'";}   
if($this->session->userdata('module') == "nurse_bed_side"){$nurse_bed_side = "class='active'"; }
if($this->session->userdata('module') == "nurse_diagnosis"){$nurse_diagnosis = "class='active'"; }

//APPOINTMENT PATIENT
if($this->session->userdata('module') == "add_appointment"){$appointmentList = "class='active'";}
if($this->session->userdata('module') == "add_appointment"){$appointmentAdd = "class='active'";}

//PATIENT MANAGEMENT
if($this->session->userdata('module') == "add_new_patient"){$addNew_patient_mode = "class='active'";}   
if($this->session->userdata('module') == "patient_master"){$patient_master_mode = "class='active'";}    
if($this->session->userdata('module') == "bill_history"){$bill_history_mod = "class='active'";} 
if($this->session->userdata('module') == "OR_history"){$OR_history_mod = "class='active'";} 

//DOCTOR
if($this->session->userdata('module') == "opd_doctor"){$opd_doctor = "class='active'";} 
if($this->session->userdata('module') == "ipd_doctor"){$ipd_doctor = "class='active'";} 

//EMR 
if($this->session->userdata('module') == "opd_emr"){$opd_emr = "class='active'";}   
if($this->session->userdata('module') == "ipd_emr"){$ipd_emr = "class='active'";}   

//USER
if($this->session->userdata('module') == "add_user"){$add_user = "class='active'";} 
if($this->session->userdata('module') == "user_index"){$user_index = "class='active'";} 

//SUBTAB
if($this->session->userdata('subtab') == "room_mangement"){$subtree_room = "active";}   
if($this->session->userdata('subtab') == "opd"){$opd = "active"; }
if($this->session->userdata('subtab') == "ipd"){$ipd = "active"; }
if($this->session->userdata('subtab') == "medicine_master"){$medicine = "active"; }
if($this->session->userdata('subtab') == "opd_reports"){$opd_reports = "active"; }

//SUBMODULE
if($this->session->userdata('submodule') == "opd_registration"){$opd_registration = "class='active'";}
if($this->session->userdata('submodule') == "opd_master"){$opd_master = "class='active'";}
if($this->session->userdata('submodule') == "medicine_category"){$med_cat_mod = "class='active'";}
if($this->session->userdata('submodule') == "drug_master"){$drug_mod = "class='active'";}
if($this->session->userdata('submodule') == "ipd_registration"){$ipd_registration = "class='active'";}
if($this->session->userdata('submodule') == "ipd_master"){$ipd_master = "class='active'";}
if($this->session->userdata('submodule') == "opd_diagnosis_reports"){$opd_diagnosis_reports = "class='active'";}

//BILLING
if($this->session->userdata('pos') == "user"){$pos_mod = "class='active'";} 
if($this->session->userdata('module') == "receipt_lists"){$receipt_mod = "class='active'";}     
if($this->session->userdata('module') == "surgical_costing"){$surgical_costing = "class='active'";}     

//ADMIN MODULE
if($this->session->userdata('module') == "user"){$user_mod = "class='active'";} 
if($this->session->userdata('module') == "designation"){$designation_mod = "class='active'";}   
if($this->session->userdata('module') == "department"){$department_mod = "class='active'";} 
if($this->session->userdata('module') == "group_name"){$group_name_mod = "class='active'";} 
if($this->session->userdata('module') == "particular_bill"){$particular_bill_mod = "class='active'";}   
if($this->session->userdata('module') == "complain"){$complain_mod = "class='active'";} 
if($this->session->userdata('module') == "diagnosis"){$diagnosis_mod = "class='active'";}   
if($this->session->userdata('module') == "insurance_company"){$insurance_company_mod = "class='active'";}
if($this->session->userdata('module') == "company_information"){$company_information = "class='active'";}
if($this->session->userdata('module') == "surgical_package"){$surgical_package = "class='active'";} 
if($this->session->userdata('module') == "backup_database"){$backup = "class='active'";}    
if($this->session->userdata('module') == "declared_receipt"){$declared_receipt_mod = "class='active'";} 

//REPORTS
if($this->session->userdata('module') == "daily_reports"){$daily_reports_mod = "class='active'";}   
if($this->session->userdata('module') == "patient_list_report"){$patient_list_report_mod = "class='active'";}   
if($this->session->userdata('module') == "patient_visited_report"){$patient_visited_report = "class='active'";} 
if($this->session->userdata('module') == "outpatient_report"){$outpatient_report = "class='active'";}
if($this->session->userdata('module') == "inpatient_report"){$inpatient_report = "class='active'";} 
if($this->session->userdata('module') == "discharged_patient_report"){$discharged_patient_report = "class='active'";}   
if($this->session->userdata('module') == "declared_receipt"){$declared_receipt_mod = "class='active'";} 

//CONFIGURATION MODULE
if($this->session->userdata('module') == "pages"){$pages_mod = "class='active'";}
if($this->session->userdata('module') == "roles"){$roles_mod = "class='active'";}   


//MY PROFILE MODULE
if($this->session->userdata('module') == "myprofile"){$myprofile_mod = "class='active'";}
if($this->session->userdata('module') == "editprofile"){$editprofile_mod = "class='active'";}
if($this->session->userdata('module') == "parameters"){$param_mod = "class='active'";}
if($this->session->userdata('module') == "change_pwd"){$change_pwd_mod = "class='active'";}
?>


<!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php if($userInfo->picture == ""){?>
                                <img src="<?php echo base_url()?>public/user_picture/no_avatar.gif" class="img-circle" alt="User Image" />
                            <?php }else{?>
                                <img src="<?php echo base_url()?>public/user_picture/<?php echo $userInfo->picture;?>" class="img-circle" alt="User Image" />
                            <?php }?>
                            
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $userInfo->firstname;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Control No"/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
                         <li>
                            <a href="<?php echo base_url()?>app/dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>     
                        
                        <!--START OF POS-->
                        
                        <?php if($hasAccesstoBilling){?>
                        <li class="treeview <?php echo $billing;?>">
                            <a href="#">
                                <i class="fa fa-credit-card"></i> <span>Billing</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoPOS){?><li><a href="<?php echo base_url()?>app/pos/" target="_blank"><i class="fa fa-angle-double-right"></i>POS</a></li><?php }?>
                                <?php if($hasAccesstoBilling){?><li <?php echo $bill_history_mod;?>><a href="<?php echo base_url()?>app/billing_history"><i class="fa fa-angle-double-right"></i>Billing List</a></li> <?php }?>
                                <?php if($hasAccesstoSurgical){?><li <?php echo $surgical_costing?>><a href="<?php echo base_url()?>app/surgical_costing"><i class="fa fa-angle-double-right"></i>Surgical Quotation Costing</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        
                        <!--START OF Appointment-->
                        <?php if($hasAccesstoAppointment){?>
                        <li class="treeview <?php echo $appointmentTab;?>">
                            <a href="#">
                                <i class="fa fa fa-male"></i> <span>Patient Appointment</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoAddAppointment){?><li <?php echo $appointmentAdd;?>><a href="<?php echo base_url()?>app/appointment/addAppointmentList"><i class="fa fa-angle-double-right"></i>Add New Appointment</a></li> <?php }?>
                                <?php if($hasAccesstoAppointment){?><li <?php echo $appointmentList;?>><a href="<?php echo base_url()?>app/appointment/index"><i class="fa fa-angle-double-right"></i>Manage Appointment</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--END OF Appointment-->
                    
                    
                        <!--START OF Patient Management-->
                        <?php if($hasAccesstoPatient){?>
                        <li class="treeview <?php echo $patient;?>">
                            <a href="#">
                                <i class="fa fa fa-wheelchair"></i> <span>Patient Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoAddPatient){?><li <?php echo $addNew_patient_mode;?>><a href="<?php echo base_url()?>app/patient/addPatient"><i class="fa fa-angle-double-right"></i>Add New Patient</a></li> <?php }?>
                                <?php if($hasAccesstoPatient){?><li <?php echo $patient_master_mode;?>><a href="<?php echo base_url()?>app/patient/index"><i class="fa fa-angle-double-right"></i>Patient Master</a></li><?php }?>
                                <?php if($hasAccesstoOPDRegistration == TRUE && $hasAccesstoOPDEnquiry == TRUE){?>
                                <li class="treeview <?php echo $opd;?>">
                                    <a href="#">
                                    <i class="fa fa-angle-double-right"></i><span>OPD</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if($hasAccesstoOPDRegistration){?><li <?php echo $opd_registration;?>><a href="<?php echo base_url()?>app/opd/registration"><i class="fa fa-angle-double-right"></i>OPD Registration</a></li><?php }?> 
                                        <?php if($hasAccesstoOPDEnquiry){?><li <?php echo $opd_master;?>><a href="<?php echo base_url()?>app/opd/index"><i class="fa fa-angle-double-right"></i>Out-Patient Enquiry</a></li> <?php }?>
                                    </ul>
                                </li>
                                <?php }?>
                                <?php if($hasAccesstoIPDRegistration == TRUE && $hasAccesstoIPDEnquiry == TRUE){?>
                                <li class="treeview <?php echo $ipd;?>">
                                    <a href="#">
                                    <i class="fa fa-angle-double-right"></i><span>IPD</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if($hasAccesstoIPDRegistration){?><li <?php echo $ipd_registration;?>><a href="<?php echo base_url()?>app/ipd/registration"><i class="fa fa-angle-double-right"></i>Admit Patient</a></li> <?php }?>
                                        <?php if($hasAccesstoIPDEnquiry){?><li <?php echo $ipd_master;?>><a href="<?php echo base_url()?>app/ipd/index"><i class="fa fa-angle-double-right"></i>In-Patient Enquiry</a></li> <?php }?>
                                    </ul>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php }?>



                        
                        <!--START OF Ward-->
                        <?php if($hasAccesstoRooms){?>
                        <li class="treeview <?php echo $room_m;?>">
                            <a href="#">
                                <i class="fa fa-hospital-o"></i> <span> Room Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoRoomsEnquiry){?><li <?php echo $room_enquiry;?>><a href="<?php echo base_url()?>app/room_enquiry">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Room Enquiry</a></li><?php }?>
                                <?php if($hasAccesstoRooms){?><li <?php echo $sub_room_category_mod;?>><a href="<?php echo base_url()?>app/room_category">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Room Category</a></li><?php }?>
                                <?php if($hasAccesstoRooms){?><li <?php echo $sub_room_master_mod;?>><a href="<?php echo base_url()?>app/room_master">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Room Master</a></li><?php }?>
                                <?php if($hasAccesstoRooms){?><li <?php echo $sub_room_bed_mod;?>><a href="<?php echo base_url()?>app/room_bed">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Room Bed Master</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--START OF Ward-->
                        
                        <!--START OF Nurse Module-->
                        <?php if($hasAccesstoNurse){?>
                        <li class="treeview <?php echo $nurse_module;?>">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span> Nurse Module</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <!--<li <?php echo $nurse_diagnosis;?>><a href="<?php echo base_url()?>app/nurse_module/diagnosis">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Diagnosis</a></li>-->
                                <?php if($hasAccesstoNurseMedication){?><li <?php echo $nurse_medication;?>><a href="<?php echo base_url()?>app/nurse_module/medication">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Patient Medication</a></li><?php }?>
                                <?php if($hasAccesstoNurseInOutTake){?><li <?php echo $nurse_intake_output;?>><a href="<?php echo base_url()?>app/nurse_module/intake_output">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Intake/Output Record</a></li><?php }?>
                                <?php if($hasAccesstoNurseProgressNote){?><li <?php echo $nurse_progress_note;?>><a href="<?php echo base_url()?>app/nurse_module/nurse_progress_note">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Nurse Progress Note</a></li><?php }?>
                                <?php if($hasAccesstoNurseVitalSign){?><li <?php echo $nurse_vital_sign;?>><a href="<?php echo base_url()?>app/nurse_module/vitalSign">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Vital Sign</a></li><?php }?>
                                <?php if($hasAccesstoNurseBedSide){?><li <?php echo $nurse_bed_side?>><a href="<?php echo base_url()?>app/nurse_module/bed_side_procedure">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Bed Side Procedure</a></li><?php }?>
                                <?php if($hasAccesstoNurseIPRoomTransfer){?><li <?php echo $nurse_room_transfer?>><a href="<?php echo base_url()?>app/nurse_module/room_transfer">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>IP Room Transfer</a></li><?php }?>
                                <?php if($hasAccesstoNursePatientHistory){?><li <?php echo $nurse_patientHistory?>><a href="<?php echo base_url()?>app/nurse_module/patientHistory">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Patient History</a></li><?php }?>
                                <?php if($hasAccesstoNurseDischarge){?><li <?php echo $nurse_discharge_summary?>><a href="<?php echo base_url()?>app/nurse_module/discharge_summary">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Discharge Summary</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--START OF Nurse Module-->
                        
                        <!--START OF Doctor-->
                        <?php if($hasAccesstoDoctor){?>
                        <li class="treeview <?php echo $doctor;?>" style="display: <?php echo ($this->session->userdata('user_role') == 1) ? "none" : "block";?>">
                            <a href="#">
                                <i class="fa fa-user-md"></i> <span> Doctor Module</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoDoctorOPD){?><li <?php echo $opd_doctor;?>><a href="<?php echo base_url()?>app/doctor/opd"><i class="fa fa-angle-double-right"></i>Out-Patient</a></li><?php }?> 
                                <?php if($hasAccesstoDoctorIPD){?><li <?php echo $ipd_doctor;?>><a href="<?php echo base_url()?>app/doctor/ipd"><i class="fa fa-angle-double-right"></i>In-Patient</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--END OF Doctor-->
                        
                        <?php if($hasAccesstoEMR){?>
                        <li class="treeview <?php echo $emr;?>">
                            <a href="#">
                                <i class="fa fa-book"></i> <span> EMR Sheet</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoEMROPD){?><li <?php echo $opd_emr;?>><a href="<?php echo base_url()?>app/emr/opd"><i class="fa fa-angle-double-right"></i>Out-Patient EMR</a></li> <?php }?>
                                <?php if($hasAccesstoEMRIPD){?><li <?php echo $ipd_emr;?>><a href="<?php echo base_url()?>app/emr/ipd"><i class="fa fa-angle-double-right"></i>In-Patient EMR</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--END OF Consultant-->
                        
                        
                        <!--START OF User Management-->
                        <?php if($hasAccesstoUsers){?>
                        <li class="treeview <?php echo $user_mgnmt;?>">
                            <a href="#">
                                <i class="fa fa-group "></i> <span>User Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoAddUsers){?><li <?php echo $add_user;?>><a href="<?php echo base_url()?>app/user/add"><i class="fa fa-angle-double-right"></i>Add New User</a></li><?php }?>
                                <?php if($hasAccesstoUsers){?><li <?php echo $user_index;?>><a href="<?php echo base_url()?>app/user"><i class="fa fa-angle-double-right"></i>User Masterlist</a></li> <?php }?>
                                <?php if($hasAccesstoUsers){?><li <?php echo $roles_mod;?>><a href="<?php echo base_url()?>app/roles"><i class="fa fa-angle-double-right"></i>User Roles</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--END OF User Management-->
                        
                        <?php if($hasAccesstoAdmin){?>
                       <li class="treeview <?php echo $admin;?>">
                            <a href="#">
                                <i class="fa fa-gear"></i> <span>Administrator</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoAdminCompanyInfo){?><li <?php echo $company_information;?>><a href="<?php echo base_url()?>app/company_information"><i class="fa fa-angle-double-right"></i>Company Information</a></li> <?php }?>
                                <?php if($hasAccesstoAdminDepartment){?><li <?php echo $department_mod;?>><a href="<?php echo base_url()?>app/department"><i class="fa fa-angle-double-right"></i>Department Master</a></li> <?php }?>
                                <?php if($hasAccesstoAdminDesignation){?><li <?php echo $designation_mod;?>><a href="<?php echo base_url()?>app/designation"><i class="fa fa-angle-double-right"></i>Designation Master</a></li>  <?php }?> 
                                <?php if($hasAccesstoAdminBillGroupName){?><li <?php echo $group_name_mod;?>><a href="<?php echo base_url()?>app/bill_group_name"><i class="fa fa-angle-double-right"></i>Bill Group Name Master</a></li> <?php }?>
                                <?php if($hasAccesstoAdminParticularBill){?><li <?php echo $particular_bill_mod;?>><a href="<?php echo base_url()?>app/particular_bill"><i class="fa fa-angle-double-right"></i>Particular Bill Master</a></li> <?php }?>
                                <?php if($hasAccesstoAdminComplain){?><li <?php echo $complain_mod;?>><a href="<?php echo base_url()?>app/complain"><i class="fa fa-angle-double-right"></i>Complain Master</a></li><?php }?>
                                <?php if($hasAccesstoAdminDiagnosis){?><li <?php echo $diagnosis_mod;?>><a href="<?php echo base_url()?>app/diagnosis"><i class="fa fa-angle-double-right"></i>Diagnosis Master</a></li><?php }?>
                                <?php if($hasAccesstoAdminSurgicalPack){?><li <?php echo $surgical_package;?>><a href="<?php echo base_url()?>app/surgical_package"><i class="fa fa-angle-double-right"></i>Surgical Package</a></li><?php }?>
                                <?php if($hasAccesstoAdminInsuranceCompany){?><li <?php echo $insurance_company_mod;?>><a href="<?php echo base_url()?>app/insurance_company"><i class="fa fa-angle-double-right"></i>Insurance Company</a></li><?php }?>
                                
                                <?php if($hasAccesstoAdminMedicineCategory == TRUE && $hasAccesstoAdminDrugName == TRUE){?>
                                <li class="treeview <?php echo $medicine;?>">
                                    <a href="#">
                                    <i class="fa fa-angle-double-right"></i><span>Medicine Mgmt</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php if($hasAccesstoAdminMedicineCategory){?><li <?php echo $med_cat_mod;?>><a href="<?php echo base_url()?>app/medicine_category">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Category Master</a></li><?php }?>
                                        <?php if($hasAccesstoAdminDrugName){?><li <?php echo $drug_mod;?>><a href="<?php echo base_url()?>app/drug_name">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>Drug Name Master</a></li><?php }?>
                                    </ul>
                                </li>
                                <?php }?>
                                
                                <?php if($hasAccesstoAdminAckReceipt){?><li <?php echo $declared_receipt_mod;?>><a href="<?php echo base_url()?>app/declared_receipt"><i class="fa fa-angle-double-right"></i>Acknowledge Receipt</a></li><?php }?>
                                <?php if($hasAccesstoAdminParameters){?><li <?php echo $param_mod;?>><a href="<?php echo base_url()?>app/parameters"><i class="fa fa-angle-double-right"></i>System Parameters</a></li><?php }?>
                                <?php if($hasAccesstoAdminBackup){?><li <?php echo $backup;?>><a href="<?php echo base_url()?>app/backup"><i class="fa fa-angle-double-right"></i>Backup Database</a></li><?php }?>
                                <?php if($hasAccesstoAdminPages){?><li <?php echo $pages_mod;?>><a href="<?php echo base_url()?>app/pages"><i class="fa fa-angle-double-right"></i>System Pages</a></li> <?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        
                        
                        
                        
                        <!--START OF Billing Module-->
                        <?php if($hasAccesstoReport){?>
                        <li class="treeview <?php echo $reports;?>">
                            <a href="#">
                                <i class="fa fa-print"></i> <span> Reports Generation</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($hasAccesstoReportPatient){?><li <?php echo $patient_list_report_mod;?>><a href="<?php echo base_url()?>app/reports/patient_list"><i class="fa fa-angle-double-right"></i>Patient Masterlist Report</a></li><?php }?>
                                <?php if($hasAccesstoReportIndividualPatient){?><li <?php echo $patient_visited_report;?>><a href="<?php echo base_url()?>app/reports/patient_visited"><i class="fa fa-angle-double-right"></i>Individual Patient Report</a></li><?php }?>
                                <?php if($hasAccesstoReportOPD){?><li <?php echo $outpatient_report;?>><a href="<?php echo base_url()?>app/reports/outpatient"><i class="fa fa-angle-double-right"></i>Out Patient Report</a></li><?php }?>
                                <?php if($hasAccesstoReportAdmitted){?><li <?php echo $inpatient_report;?>><a href="<?php echo base_url()?>app/reports/inpatient"><i class="fa fa-angle-double-right"></i>Admitted Patient Report</a></li><?php }?>
                                <?php if($hasAccesstoReportDischarge){?><li <?php echo $discharged_patient_report?>><a href="<?php echo base_url()?>app/reports/discharged_patient"><i class="fa fa-angle-double-right"></i>Discharged Patient Report</a></li><?php }?>
                                <?php if($hasAccesstoReportDailySales){?><li <?php echo $daily_reports_mod;?>><a href="<?php echo base_url()?>app/reports/daily_sales"><i class="fa fa-angle-double-right"></i>Daily Sales Report</a></li><?php }?>
                                <?php if($hasAccesstoReportDoctorsFee){?><li <?php echo $daily_reports_mod;?>><a href="<?php echo base_url()?>app/reports/doctorFeeReport"><i class="fa fa-angle-double-right"></i>Doctor's Fee Report</a></li><?php }?>
                                <?php if($hasAccesstoReportAR){?><li <?php echo $declared_receipt_mod;?>><a href="<?php echo base_url()?>app/reports/declared_receipt"><i class="fa fa-angle-double-right"></i>Acknowledge Receipt Report</a></li><?php }?>
                            </ul>
                        </li>
                        <?php }?>
                        <!--END OF Billing Module-->
                        
                        <!--START OF USER PROFILE-->
                        <li class="treeview <?php echo $profile;?>">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>User Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php echo $myprofile_mod;?>><a href="<?php echo base_url()?>myprofile"><i class="fa fa-angle-double-right"></i>My Profile</a></li>
                                <li <?php echo $editprofile_mod;?>><a href="<?php echo base_url()?>myprofile/editprofile"><i class="fa fa-angle-double-right"></i>Edit Profile</a></li>
                                <!-- <li <?php echo $change_pwd_mod;?>><a href="<?php echo base_url()?>myprofile/changepwd"><i class="fa fa-angle-double-right"></i>Change Password</a></li> -->
                                <li><a href="<?php echo base_url()?>login/logout"><i class="fa fa-angle-double-right"></i>Logout</a></li>
                            </ul>
                        </li>
                        <!--END OF USER PROFILE-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            

            
            
  
<style type="text/css">
#footerLO {
    background-color: #1f1c1c; 
    height:35px; 
    color: #f8d756;
    bottom: 0;
    position: fixed;
    bottom: 0;
    width: 100%;
    padding:10px;
    margin-bottom: 0px;
    z-index: 99999;
}

.linkFooter{
    color: #f8d756 !important;
}

.linkFooter:hover{
    color: #f8d756 !important;
    text-decoration: underline !important;
}



</style>
            
            
                            <!-- Modal -->
<script language="javascript">
function showInvoice(patient_id)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
    document.getElementById("showInvoice").innerHTML=xmlhttp.responseText;
    }
  }
  var supp;

xmlhttp.open("GET","<?php echo base_url();?>app/billing/getItem/"+patient_id,true);
xmlhttp.send();

}
</script>


<form method="post">

<div class="modal fade" id="posPatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Search Patient</h4>
            </div>
            <div class="modal-body">
            
            <div class="form-group" id="credit">
                <label for="exampleInputEmail1">Patient Name</label>
                <select name="patient" id="patient" class="form-control input-sm" style="width:250px;" onChange="showInvoice(this.value);">
                    <option value="">- Select Patient -</option>
                    <?php foreach($patientListRows as $patientListRows){?>
                    <option value="<?php echo $patientListRows->patient_no?>"><?php echo $patientListRows->name?></option>
                    <?php }?>
                </select>
            </div>
            
            <div class="form-group" id="credit">
                <label for="exampleInputEmail1">Invoice No.</label>
                <span id="showInvoice">
                <select name="invoice" id="invoice" class="form-control input-sm" style="width: 250px;" required>
                    <option value="">- Invoice No. -</option>
                </select>
                </span>
           </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Continue</button>
            </div>
           
        </div>
        <!-- /.modal-content -->
    </div>
 </div>
 </form>
    <!-- /.modal-dialog -->


